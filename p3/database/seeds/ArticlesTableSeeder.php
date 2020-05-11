<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //    # Add a individual book
        $article = new Article();
        $article->slug = 'john-ford-movies';
        $article->title = 'John Ford Movies';
        $article->content = 'John Ford is a famous movie directory who created westerns.';
        $article->save();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $article = new Article();

            $title = $faker->words(rand(3, 6), true);
            $article->title = Str::title($title);
            $article->slug = Str::slug($title, '-');
            $article->content = $faker->paragraphs(1, true);
        
            $article->save();
        }
    }
}
