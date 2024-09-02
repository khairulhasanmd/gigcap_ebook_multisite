<?php

namespace App\Models\Admin;

use App\Models\Admin\Product;
use App\Models\Admin\ProductTag;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = 'tags';

    protected $fillable = [
        'name'
    ];

    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }

    public function productTag()
    {
        return $this->hasMany(ProductTag::class);
    }
}
