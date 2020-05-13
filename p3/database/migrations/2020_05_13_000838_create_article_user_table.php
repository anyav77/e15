<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
    
            # `article_id` and `user_id` will be foreign keys, so they have to be unsigned
            #  Note how the field names here correspond to the tables they will connect...
            # `article_id` will reference the `books` table and `user_id` will reference the `users` table.
            $table->bigInteger('article_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
    
            # Make foreign keys
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('user_id')->references('id')->on('users');
    
            # (Optional) Add additional columns for data you want to associate with this relationship
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_user');
    }
}
