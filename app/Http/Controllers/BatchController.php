<?php
/**
 * @package BatchController
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 29-12-2022
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\OpenAI\Entities\{
    UseCase, UseCaseCategory, ChatCategory
};
use Modules\Subscription\Entities\SubscriptionDetails;
use Modules\Subscription\Services\PackageService;
use Modules\MediaManager\Http\Models\ObjectFile;

class BatchController extends Controller
{
    /**
     * Delete batch data
     *
     * @param Request $request
     * @return array $response
     */
    public function destroy(Request $request)
    {
        $response = ['status' => 'failed'];

        if (config('openAI.is_demo')) {
            $response['message'] = __('Batch operation is disabled in demo mode.');

            return $response;
        }

        if (!$this->isValid($request)) {
            $response['message'] = __('Invalid data provided or :x not exist', ['x' => $this->getModelName($request->namespace)]);

            return $response;
        }

        try {
            $model = new $request->namespace;
            $cache = $request->cache ?? null;

            $this->needActionBeforeDelete($request);

            $model->whereIn($request->column, $request->records)->delete();
            ObjectFile::where('object_type', $model->getTable())->whereIn('object_id', $request->records)->delete();
            $model->forgetCache($cache);

            $this->needActionAfterDelete($request);

            return ['status' => 'success', 'message' => __('Batch :x has been successfully deleted.', ['x' => $this->getModelName($request->namespace)])];
        } catch (\Exception $e) {
            $response['message'] = $e->getMessage();

            return $response;
        }
    }

    /**
     * Check validity
     *
     * @param Request $request
     * @return boolean
     */
    private function isValid($request)
    {
        $validate = !Validator::make($request->all(), [
            'records' => 'required',
            'namespace' => 'required',
            'column' => 'required'
        ])->fails();

        return $validate && class_exists($request->namespace);
    }

    /**
     * Get model name
     *
     * @param string $namespace
     * @return string
     */
    private function getModelName($namespace)
    {
        $modelName = explode('\\', $namespace);

        return end($modelName);
    }

    /**
     * Need Extra Action
     *
     * @param Request $request
     * @return void
     */
    private function needAction($request, $position)
    {
        $method = array_search($request->namespace, $this->modelToFunction());

        if ($method && method_exists($this, $position . $method)) {
            $this->{$position . $method}($request);
        }
    }

    /**
     * Need Action before delete
     *
     * @param Request $request
     * @return void
     */
    private function needActionBeforeDelete($request)
    {
        $this->needAction($request, 'beforeDelete');
    }

    /**
     * Need Action after delete
     *
     * @param Request $request
     * @return void
     */
    private function needActionAfterDelete($request)
    {
        $this->needAction($request, 'afterDelete');
    }

    /**
     * Model to Function
     *
     * @return array
     */
    private function modelToFunction()
    {
        return [
            'UseCase' => '\Modules\OpenAI\Entities\UseCase',
            'UseCaseCategory' => '\Modules\OpenAI\Entities\UseCaseCategory',
            'Package' => '\Modules\Subscription\Entities\Package',
            'PackageSubscription' => 'Modules\Subscription\Entities\PackageSubscription',
            'ChatCategory' => '\Modules\OpenAI\Entities\ChatCategory'
        ];
    }

    /**
     * This method called when batch delete perform from useCase data table
     *
     * @param Request $request
     * @return void
     */
    private function beforeDeleteUseCase(Request $request)
    {
        foreach ($request->records as $key => $id) {
            $useCase = UseCase::find($id);

            UseCase::clearFootprints($useCase);
        }
    }

    /**
     * This method called when batch delete perform from useCaseCategory data table
     *
     * @param Request $request
     * @return void
     */
    private function beforeDeleteUseCaseCategory(Request $request)
    {
        foreach ($request->records as $key => $id) {
            $useCaseCategory = UseCaseCategory::find($id);

            $id = UseCaseCategory::where('slug', 'others')->value('id');
            $useCaseCategory->useCases()->update(['use_case_category_id' => $id]);
        }
    }

    /**
     * This method called when batch delete perform from package data table
     *
     * @param Request $request
     * @return void
     */
    private function afterDeletePackage(Request $request)
    {
        foreach ($request->records as $key => $id) {
            (new PackageService)->changeSubscriptionStatus($id);
        }
    }
    
    /**
     * This method called when batch delete perform from package data table
     *
     * @param Request $request
     * @return void
     */
    private function afterDeletePackageSubscription(Request $request)
    {
        foreach ($request->records as $key => $id) {
            SubscriptionDetails::where(['package_subscription_id' => $id, 'status' => 'Active'])
                ->update(['status' => 'Expired']);
        }
    }

    
    /**
     * This method called when batch delete perform from chatCategory datatable
     *
     * @param Request $request
     * @return void
     */
    private function beforeDeleteChatCategory(Request $request)
    {
        foreach ($request->records as $id) {
            $chatCategory = ChatCategory::find($id);

            $id = ChatCategory::where('slug', 'others')->value('id');
            $chatCategory->chatBots()->update(['chat_category_id' => $id]);
        }
    }
}
