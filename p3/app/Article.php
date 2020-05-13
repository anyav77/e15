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
    public function users()
    {
        return $this->belongsToMany('App\User')
        ->withTimestamps() # Must be added to have Eloquent update the created_at/updated_at columns in a pibot table
        ->withPivot('notes'); # Must also specify any other fields that should be included when fetching this relationship
    }
}
