<?php

/**
 * @package MessageResponseTrait
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 06-03-2023
 */

namespace App\Traits;

trait MessageResponseTrait
{
    /**
     * Success Status
     */
    private string $successStatus = 'success';

    /**
     * Fail Status
     */
    private string $failStatus = 'fail';

    /**
     * Not found response
     *
     * @return array
     */
    protected function notFoundResponse(): array
    {
        return [
            'status' => $this->failStatus,
            'message' => __(':x does not exist.', ['x' => $this->service])
        ];
    }

    /**
     * Save success response
     *
     * @return array
     */
    protected function saveSuccessResponse(): array
    {
        return [
            'status' => $this->successStatus,
            'message' => __('The :x has been successfully saved.', ['x' => $this->service])
        ];
    }

    /**
     * Save fail response
     *
     * @return array
     */
    protected function saveFailResponse(): array
    {
        return [
            'status' => $this->failStatus,
            'message' => __('Failed to save :x, please try again.', ['x' => $this->service])
        ];
    }

    /**
     * Delete success response
     *
     * @return array
     */
    protected function deleteSuccessResponse(): array
    {
        return [
            'status' => $this->successStatus,
            'message' => __('The :x has been successfully deleted.', ['x' => $this->service])
        ];
    }

    /**
     * Delete fail response
     *
     * @return array
     */
    protected function deleteFailResponse(): array
    {
        return [
            'status' => $this->failStatus,
            'message' => __('Failed to delete :x, please try again.', ['x' => $this->service])
        ];
    }

     /**
     * Update success response
     *
     * @return array
     */
    protected function updateSuccessResponse(): array
    {
        return [
            'status' => $this->successStatus,
            'message' => __('The password has been successfully updated.')
        ];
    }

}
