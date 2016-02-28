<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    // leave all fields blank and check correct validation messages are shown
    public function testRegisterAllBlank()
    {
        $this->visit('/')
             ->click('Register')
             ->see('Confirm Password')
             ->press('Register')
             ->see('The first name field is required')
             ->see('The last name field is required')
             ->see('The email field is required')
             ->see('The password field is required');
    }

    // enter different passwords when registering and ensure appropriate
    // message is displayed
    public function testRegisterDiffPasswords()
    {
        $this->visit('/register')
             ->type('Holly','first_name')
             ->type('Edwards','last_name')
             ->type('holly@edwards.com', 'email')
             ->type('password1','password')
             ->type('password2','password_confirmation')
             ->press('Register')
             ->see('The password confirmation does not match');
    }

    // enter an invalid email address and ensure appropriate
    // message is displayed
    public function testInvalidEmail()
    {
        $this->visit('/register')
             ->type('Holly','first_name')
             ->type('Edwards','last_name')
             ->type('holly@edwards','email')
             ->type('password1','password')
             ->type('password1','password_confirmation')
             ->press('Register')
             ->see('The email must be a valid email address');
    }

    // finally, register correctly
    // try to register again to check we can't register the same email twice
    // then try logging in with wrong password
    public function testRegisterOK()
    {
        $this->visit('/register')
             ->type('Holly','first_name')
             ->type('Edwards','last_name')
             ->type('holly@edwards.com','email')
             ->type('password1','password')
             ->type('password1','password_confirmation')
             ->press('Register')
             ->see('Holly Edwards')
             ->visit('/logout');

        $this->visit('/register')
             ->type('Holly','first_name')
             ->type('Edwards','last_name')
              ->type('holly@edwards.com','email')
              ->type('password1','password')
              ->type('password1','password_confirmation')
              ->press('Register')
              ->see('The email has already been taken');

        $this->visit('/login')
             ->type('holly@edwards.com','email')
             ->type('wrong password','password')
             ->press('Login')
             ->see('These credentials do not match our records');
    }


}
