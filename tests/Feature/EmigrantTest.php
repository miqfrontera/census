<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmigrantTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     *
     */
    public function user_can_browse_emigrants()
    {
        $emigrant = factory('App\Emigrant')->create();

        $response = $this->get('/emigrants');

        $response->assertSee($emigrant->name);
    }
}
