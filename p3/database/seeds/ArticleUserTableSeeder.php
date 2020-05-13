<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\User;

class ArticleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Goal: Add two articles to user jill@harvard.edu's "list"
        $user = User::where('email', '=', 'jill@harvard.edu')->first();

        $articles = [
            'THE WESTERN MOVIE: A BRIEF INTRODUCTION'
        ];
    
        foreach ($articles as $title) {
            $article = Article::where('title', '=', $title)->first();
            $user->articles()->save($article, ['notes' => $title.' is pending review and feedback from John']);
        }
    }
}
