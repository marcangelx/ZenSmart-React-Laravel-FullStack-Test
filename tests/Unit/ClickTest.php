<?php

namespace Tests\Unit;

use App\Models\Click;
use Tests\TestCase;

class ClickTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_button_click()
    {

        $response = $this->post('/api/click');
        $tally = Click::all()->first();
        $response->assertStatus(200);
        $this->assertDatabaseHas('click', [
            'id' => $tally->id,
            'clicks' => $tally->clicks,
        ]);
        $this->assertDatabaseHas('tally_history', [
            'tally_id' => $tally->id
        ]);
    }
}
