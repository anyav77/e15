<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Book;

class BookUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Goal: Add three books to user jill@harvard.edu's "list"
        $user = User::where('email', '=', 'jill@harvard.edu')->first();

        $books = [
        'Harry Potter and the Chamber of Secrets',
        'The Great Gatsby',
        'The Bell Jar'
    ];

        foreach ($books as $title) {
            $book = Book::where('title', '=', $title)->first();
            $user->books()->save($book, ['notes' => 'I really enjoyed reading '. $title]);
        }
    }
}
