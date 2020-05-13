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
        // $article = new Article();
        // $article->slug = 'john-ford-movies';
        // $article->title = 'John Ford Movies';
        // $article->content = 'John Ford is a famous movie directory who created westerns.';
        // $article->save();

        $article = new Article();
        $article->slug = 'the-western-movie-a-brief-introduction';
        $article->title = 'THE WESTERN MOVIE: A BRIEF INTRODUCTION';
        $article->content = 'IN 1893, the American historian Frederick Jackson Turner wrote his famous essay in which he declared that the American frontier was now closed. This closure was related to the massacre in 1891 of the Minniconjou Lakota tribe at Wounded Knee by the U.S. 7th Cavalry. There would from henceforward be no more resistance by the Native tribes in “The Wild West” to the expansion of the U.S. federal government.';
        $article->save();

        
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $article = new Article();

            $title = $faker->words(rand(3, 6), true);
            $article->title = Str::title($title);
            $article->slug = Str::slug($title, '-');
            $article->content = $faker->paragraphs(3, true);
        
            $article->save();
        }
    }
}
