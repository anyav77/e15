<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function author()
    {
        # Book belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Author');
    }
    public function users()
    {
        return $this->belongsToMany('App\User')
        ->withTimestamps() # Must be added to have Eloquent update the created_at/updated_at columns in a pibot table
        ->withPivot('notes'); # Must also specify any other fields that should be included when fetching this relationship
    }
    public static function findBySlug($slug)
    {
        return self::where('slug', '=', $slug)->first();
    }
    public function reverseTitle()
    {
        $this->title = strrev($this->title);
        return $this->title;
    }
}
