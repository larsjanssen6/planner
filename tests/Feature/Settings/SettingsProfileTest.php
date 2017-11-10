<?php

namespace Tests\Settings;

use Tests\TestCase;

class SettingsProfileTest extends TestCase
{
    /**
     * A user can update his profile.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
