<?php

namespace App\Models\Admin;

use App\Models\Admin\Product;
use App\Models\Admin\Tag;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $fillable = ['product_id', 'tag_id'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
