<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::updateOrCreate(
            ['email' => 'artistanya24@yahooo.com', 'first_name' => 'Annya', 'last_name' => 'Zinoveva', 'uid' => 'anyav77'],
            ['password' => Hash::make('helloworld')
        ]
        );

        $user = User::updateOrCreate(
            ['email' => 'jill@harvard.edu', 'first_name' => 'Jill', 'last_name' => 'Harvard', 'uid' => 'hes1'],
            ['password' => Hash::make('helloworld')
        ]
        );
        
        $user = User::updateOrCreate(
            ['email' => 'jamal@harvard.edu', 'first_name' => 'Jamal',  'last_name' => 'Harvard', 'uid' => 'hes2'],
            ['password' => Hash::make('helloworld')
        ]
        );
    }
}
