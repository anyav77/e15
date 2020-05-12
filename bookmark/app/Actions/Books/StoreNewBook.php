<?php

namespace App\Actions\Books;

use App\Book;

class StoreNewBook
{
    public function __construct($newBookData)
    {
        $newBook = new Book();
        $newBook->slug = $newBookData->slug;
        $newBook->title = $newBookData->title;
        $newBook->author_id = $newBookData->author_id;
        $newBook->published_year = $newBookData->published_year;
        $newBook->cover_url = $newBookData->cover_url;
        $newBook->info_url = $newBookData->info_url;
        $newBook->purchase_url = $newBookData->purchase_url;
        $newBook->description = $newBookData->description;
        $newBook->save();

        $this->rda = ['title' => $newBook->title];
    }
}
