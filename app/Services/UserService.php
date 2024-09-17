<?php

/**
 * @package UserService
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 06-03-2023
 */

 namespace App\Services;

 use App\Models\{User, Team};
use App\Services\Mail\UserSetPasswordMailService;
use App\Traits\MessageResponseTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Modules\Subscription\Entities\PackageSubscription;
use Modules\Subscription\Services\PackageSubscriptionService;

 class UserService
 {
    use MessageResponseTrait;

    /**
     * Service
     */
    public string|null $service;

    /**
     * Initialize
     *
     * @param string $service
     * @return void
     */
    public function __construct($service = null)
    {
        $this->service = $service;

        if (is_null($service)) {
            $this->service = __('User');
        }
    }

    /**
     * Update user password
     *
     * @param array $data
     * @return array
     */
    public function updatePassword(array $data, int $id): array
    {
        $user = User::find($id);

        if (!$user) {
            $this->notFoundResponse();
        }

        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['raw_password'] = trim($data['password']);
        $data['password'] = \Hash::make(trim($data['password']));

        if (!$user->update($data)) {
            return $this->saveFailResponse();
        }

        if (isset($data['send_mail'])) {
            $user['user_name'] = $user['name'];
            $user['raw_password'] = $data['raw_password'];
            (new UserSetPasswordMailService)->send($user);
        }

        return $this->updateSuccessResponse();
    }

    /**
     * Delete User
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id)
    {
        try {
            DB::beginTransaction();
            $user = User::find($id);

            if (!$user) {
                return $this->notFoundResponse();
            }

            $isAdmin = $user->roles()->where('type', 'admin')->first();

            if ($isAdmin) {
                return ['status' => 'fail', 'message' => __("Admin account can't be deleted.")];
            }

            $isSubscription = PackageSubscription::where(['user_id' => $id, 'status' => 'Active'])->first();

            if ($isSubscription) {
                (new PackageSubscriptionService)->cancel($id);
            }

            $ids = [];
            $parentMembershipCheck = Team::where('parent_id', $id)->get();
            if (!empty($parentMembershipCheck)) {
                foreach ($parentMembershipCheck as $value) {
                    $ids[] = $value->id;
                }
                if (!empty($ids)) {
                    Team::whereIn('id', $ids)->delete();
                }
            }
            $userMembershipCheck = Team::where('user_id', $id)->first();
            if (!empty($userMembershipCheck)) {
                $userMembershipCheck->delete();
            }

            if (!$user->delete()) {
                throw new Exception(__('An error has occurred. Please attempt the action again.'));
            }

            $user->deleteFiles(['thumbnail' => true]);

            DB::commit();
            return $this->deleteSuccessResponse();
        } catch (Exception $e) {
            DB::rollBack();
            return $this->deleteFailResponse();
        }
    }

    /**
     * Delete Team member and User
     *
     * @param int $id
     * @return array
     */
    public function deleteMember(int $id): array
    {

        $notFoundRes = $this->notFoundResponse();
        $team = Team::find($id);
        if (!$team) {
            return $notFoundRes;
        }
        $user = User::find($team->user_id);
        if (!$user) {
            return $notFoundRes;
        }
        $isAdmin = $user->roles()->where('type', 'admin')->first();
        if ($isAdmin) {
            return ['status' => 'fail', 'message' => __("Admin account can't be deleted.")];
        }
        if ($team->delete()) {

            return $this->deleteSuccessResponse();
        }

        return $this->deleteFailResponse();
    }
 }
