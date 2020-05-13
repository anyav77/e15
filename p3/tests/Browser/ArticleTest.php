<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Article;
use App\User;

class ArticleTest extends DuskTestCase
{
    use withFaker;
    use DatabaseMigrations;


    /**
     *
     */
    public function testAddingArticle()
    {
        $this->browse(function (Browser $browser) {
            
            # Let our book factory generate a book for us
            $article = factory(Article::class)->create();
            
            # We'll grab the data from this book to fill in the form
            $data = $article->toArray();

            # And delete it so it won't conflict with what we're about to add
            $article->delete();

            # Create a user to create a new book as
            $user = factory(User::class)->create();
            
            $browser->loginAs($user->id)
                    ->visit('/wiki/create')
                    ->assertSee('New')
                    ->value('@title-input', $data['title'])
                    ->value('@content-input', $data['content'])
                    ->click('@add-button')
                    ->assertSee('has been published');
        });
    }

    /**
     * @group focus
     */
    public function testEditingArticle()
    {
        $this->seed();
        $this->browse(function (Browser $browser) {
            
            # Let our book factory generate a book for us
            $article = factory(Article::class)->create();

            # Create a user to create a new book as
            $user = factory(User::class)->create();
            
            $browser->loginAs($user->id)
                    ->visit('/wiki/' . $article->id .'/'. $article->slug.'/edit')
                    ->click('@update-button')
                    ->assertSee('Your changes were saved.');
        });
    }
    /**
     *
     */
    public function testLoadingArticle()
    {
        $this->seed();
        $this->browse(function (Browser $browser) {
            $article = factory(Article::class)->create();
            
            $user = factory(User::class)->create();
            
            $browser->visit('/wiki/' . $article->id .'/'. $article->slug)
                    ->assertSee($article->title);
        });
    }
}
