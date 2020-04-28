<?php

use Illuminate\Database\Seeder;
use App\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Array of author data to add
        $authors = [
            ['F. Scott', 'Fitzgerald', 1896, 'https://en.wikipedia.org/wiki/F._Scott_Fitzgerald'],
            ['Sylvia', 'Plath', 1932, 'https://en.wikipedia.org/wiki/Sylvia_Plath'],
            ['Maya', 'Angelou', 1928, 'https://en.wikipedia.org/wiki/Maya_Angelou'],
            ['J.K.', 'Rowling', 1965, 'https://en.wikipedia.org/wiki/J._K._Rowling'],
            ['Dr.', 'Seuss', 1904, 'https://en.wikipedia.org/wiki/Dr._Seuss'],
        ];
    
        $count = count($authors);
    
        # Loop through each author, adding them to the database
        foreach ($authors as $authorData) {
            $author = new Author();
            
            $author->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $author->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $author->first_name = $authorData[0];
            $author->last_name = $authorData[1];
            $author->birth_year = $authorData[2];
            $author->bio_url = $authorData[3];
            
            $author->save();
            
            $count--;
        }
    }
}
