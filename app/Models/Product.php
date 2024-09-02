<?php

namespace App\Models\Admin;

use App\Models\Admin\Tag;
use App\Models\Admin\ProductTag;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    protected $fillable = [
        'product_name', 'image', 'product_description', 'pdf_url', 'slug'
    ];

    // public function tag()
    // {
    //     return $this->hasMany(Tag::class);
    // }
    
    public function productTags()
    {
        return $this->hasMany(ProductTag::class);
    }
}
