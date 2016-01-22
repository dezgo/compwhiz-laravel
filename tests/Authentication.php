<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Authentication extends TestCase
{
    public function testRegisterAllBlank()
    {
        $this->visit('/')
             ->click('Register')
             ->see('Confirm Password')
             ->press('Register')
             ->see('The name field is required')
             ->see('The email field is required')
             ->see('The password field is required');
    }

    public function testRegisterDiffPasswords()
    {
        $this->visit('/auth/register')
             ->type('Holly Edwards','name')
             ->type('holly@edwards.com', 'email')
             ->type('password1','password')
             ->type('password2','password_confirmation')
             ->press('Register')
             ->see('The password confirmation does not match');
    }

    public function testInvalidEmail()
    {
        $this->visit('/auth/register')
             ->type('Holly Edwards','name')
             ->type('holly@edwards','email')
             ->type('password1','password')
             ->type('password1','password_confirmation')
             ->press('Register')
             ->see('The email must be a valid email address');
    }

    public function testRegisterOK()
    {
        $this->visit('/auth/register')
             ->type('Holly Edwards','name')
             ->type('holly@edwards.com','email')
             ->type('password1','password')
             ->type('password1','password_confirmation')
             ->press('Register')
             ->see('Holly Edwards');
    }
}
