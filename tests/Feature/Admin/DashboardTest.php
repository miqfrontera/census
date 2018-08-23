<?php

namespace Tests\Feature\Admin;


use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\User;
use Tests\Feature\FeatureTest;

class DashboardTest extends FeatureTest
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function dashboard_page_is_not_available_for_guest_users()
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertRedirect(route('auth.login'));
    }
}