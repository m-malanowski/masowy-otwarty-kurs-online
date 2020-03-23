<?php

namespace Tests\Feature;

use Mail;
use Laravast\User;
use Tests\TestCase;
use Laravast\Mail\ConfirmYourEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_a_user_has_a_default_username_after_registration()
    {
        Mail::fake();

        $this->withoutExceptionHandling();

        $this->post('/register', [
            'name' => 'Mateusz Malanowski',
            'email' => 'malanowski1990@gmail.com',
            'password' => 'secret'
        ])->assertRedirect();

        $this->assertDatabaseHas('users', [
            'username' => str_slug('Mateusz Malanowski')
        ]);
    }

    public function test_a_user_has_a_token_after_registration()
    {
        Mail::fake();

        $this->withoutExceptionHandling();

        $this->post('/register', [
            'name' => 'Mateusz Malanowski',
            'email' => 'malanowski1990@gmail.com',
            'password' => 'secret'
        ])->assertRedirect();

        $user = User::find(1);
        $this->assertNotNull($user->confirm_token);
        $this->assertFalse($user->isConfirmed());
    }

    public function test_an_email_is_sent_to_newly_registered_users()
    {
        $this->withoutExceptionHandling();
        Mail::fake();
        // rejestracja nowego użytkownika
        $this->post('/register', [
            'name' => 'Mateusz Malanowski',
            'email' => 'malanowski1990@gmail.com',
            'password' => 'secret'
        ])->assertRedirect();
        //assercja sprawdzająca czy email został wysłany użytkownikowi
        Mail::assertQueued(ConfirmYourEmail::class);
    }
}
