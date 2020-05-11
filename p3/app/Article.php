<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public static function findBySlug($slug)
    {
        return self::where('slug', '=', $slug)->first();
    }
}
