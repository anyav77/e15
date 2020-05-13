<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class AuthTest extends DuskTestCase
{
    use DatabaseMigrations;
    use withFaker;

    /**
     *
     */
    public function testAuthorizationRequired()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/wiki/create')
                    ->assertPresent('@login-heading');
        });
    }

    /**
     *
     */
    public function testSuccessfulRegistration()
    {
        $this->seed();
        $this->browse(function (Browser $browser) {
            $first_name = $this->faker->firstName;
            $last_name = $this->faker->lastName;
            $uid = $this->faker->userName;
            $browser->visit('/')
                    ->click('@register-link')
                    ->assertVisible('@login-heading')
                    ->click('@register-link')
                    ->type('@first-name-input', $first_name)
                    ->type('@last-name-input', $last_name)
                    ->type('@uid-input', $uid)
                    ->type('@email-input', $this->faker->safeEmail())
                    ->type('@password-input', 'helloworld')
                    ->type('@password-confirm-input', 'helloworld')
                    ->click('@register-button')
                    ->assertVisible('@dashboard');
        });
    }

    /**
     * @group focus
     */
    public function testRegisteringWithExistingEmail()
    {
        $this->browse(function (Browser $browser) {

                // Create a user so we can try registering with their same info
            $user = factory(User::class)->create();
            $first_name = $this->faker->firstName;
            $last_name = $this->faker->lastName;
            $uid = $this->faker->userName;
            $browser->logout()
                        ->visit('/register')
                        ->type('@first-name-input', $first_name)
                        ->type('@last-name-input', $last_name)
                        ->type('@uid-input', $uid)
                        ->type('email', $user->email)
                        ->type('password', 'helloworld')
                        ->type('password_confirmation', 'helloworld')
                        ->click('@register-button')
                        ->assertPresent('@error-field-email')
                        ->assertSee('The email has already been taken.');
        });
    }

    /**
     *
     */
    public function testSuccesfulLogin()
    {
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->create();

            $browser->logout()
                    ->visit('/login')
                    ->type('@email-input', $user->email)
                    ->type('@password-input', 'helloworld')
                    ->click('@login-button')
                    ->assertSee(strtoupper('logout'));
        });
    }

    /**
     *
     */
    public function testLoginValidation()
    {
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->create();

            $browser->logout()
                    ->visit('/login')
                    ->type('@email-input', $user->email)
                    ->type('@password-input', 'this-is-the-wrong-password')
                    ->click('@login-button')
                    ->assertSee('These credentials do not match our records.');
        });
    }
}
