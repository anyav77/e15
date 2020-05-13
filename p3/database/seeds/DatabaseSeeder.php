<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ArticleUserTableSeeder::class); # Because this seeder is dependent on Books and Users, it should be invoked last
    }
}
