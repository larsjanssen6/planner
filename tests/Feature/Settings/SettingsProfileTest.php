<?php

namespace Tests\Settings;

use Auth;
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
        $this->signIn();
        $user = Auth::user();

        $response = $this->get('/instellingen/' . Auth::user()->id . '/profiel');

        $response->assertSee($user->name);
    }
}
