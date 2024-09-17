<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class userDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status,
            'picture_url' => $this->fileUrl(),
            'phone' => $this->phone,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'address' => $this->address,
            'created_at' => timeZoneFormatDate($this->created_at),
            'updated_at' => timeZoneFormatDate($this->updated_at),
        ];
    }
}
