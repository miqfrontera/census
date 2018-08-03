<?php
/**
 * Created by PhpStorm.
 * User: miquel
 * Date: 01/08/18
 * Time: 14:54
 */

namespace Tests\Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{

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
}