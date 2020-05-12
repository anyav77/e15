<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('pen_name')->nullable();
            $table->uuid('uid')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('profile_filmmaker')->nullable();
            $table->boolean('profile_instructor')->nullable();
            $table->boolean('profile_student')->nullable();
            $table->boolean('profile_researcher')->nullable();
            $table->boolean('profile_librarian')->nullable();
            $table->boolean('profile_film_enthusiast')->nullable();
            $table->boolean('profile_other')->nullable();
            $table->string('profile_other_entry')->nullable();
            $table->boolean('newsletter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
