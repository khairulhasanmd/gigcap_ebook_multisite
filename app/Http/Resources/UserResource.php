<?php
/**
 * @package UserResource
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 29-05-2021
 */
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $pictureURL  = url("dist/img/avatar.jpg");
        $pictureName = "avatar.jpg";
        if (isset($this->avatarFile->file_name) && !empty($this->avatarFile->file_name) && isExistFile('uploads/user/thumbnail/' . $this->avatarFile->file_name)) {
            $pictureURL  = objectStorage()->url("uploads/user/thumbnail/" . $this->avatarFile->file_name);
            $pictureName = $this->avatarFile->file_name;
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'eamil' => $this->email,
            'status' => $this->status,
            'created_at' => $this->format_created_at,
            'picture_name' => $pictureName,
            'picture_url' => $pictureURL,
        ];
    }
}
