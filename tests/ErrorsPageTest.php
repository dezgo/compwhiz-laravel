<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ErrorsPageTest extends TestCase
{
    /**
     * Try going to invoices page when logged in as a user with no roles
     *
     */
    public function test403()
    {
        $user = factory(App\User::class)->make();
        $this->actingAs($user)
            ->get('/invoice')
            ->assertResponseStatus(403);
    }

    /**
     * Try going to a non-existant page
     *
     */
    public function test404()
    {
        $this->get('/wrongpage')
            ->assertResponseStatus(404);
    }
}
