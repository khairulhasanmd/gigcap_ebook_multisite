<?php

namespace App\Services;

use App\Models\Admin\Tag;
use App\Models\Admin\ProductTag;

class ProductEbook {

    public static function getTags($tags) {
        //dd($tags);
        $result = '';
        foreach ($tags as $ptag) {
            if(isset($result)) {
                    $result .= strtolower($ptag->tag->name.' '); 
            } else {
                    $result = strtolower($ptag->tag->name);
            }
        }
        //dd($result);
        return $result;
    }

    public static function menuTags() {
        $tags = Tag::all();
        // $tagName = [];
        // foreach ($tags as $tag) {
        //     $tagName[] = $tag->name;
        // }
        return $tags;
    }
}