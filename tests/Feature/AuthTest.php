<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends FeatureTest
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function register_page_is_unavailable()
    {
        $response = $this->get('/register');

        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function login_page_is_available()
    {
        $response = $this->get(route('auth.login.form'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function remember_password_page_is_available()
    {
        $response = $this->get(route('auth.password.reset.form'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function after_successful_login_it_redirects_to_dashboard_page()
    {
        $password = 'secret';
        $user = factory(User::class)->create([
            'password' => bcrypt($password)
        ]);

        $response = $this->post(route('auth.login'),
            [
                'email' => $user->email,
                'password' => $password
            ]
        );

        $response->assertRedirect('admin/');
    }
}