<?php

namespace Tests\Feature\Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
   use RefreshDatabase;

    public function test_guest_routes_contact()
    {
        $this->get('contact/index')->assertRedirect('login');
        $this->get('contact/import')->assertRedirect('login');
        $this->post('contact/import', [])->assertRedirect('login');
    }

    public function test_index_contact_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('contact/index');
        $response->assertStatus(200);
    }

    public function test_imported_files_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('contact/import');
        $response->assertStatus(200);
    }
}
