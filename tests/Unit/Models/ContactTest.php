<?php

namespace Tests\Unit\Models;

use App\Models\Contact;
use App\Models\Franchise;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{

    use RefreshDatabase;

    public function test_contact_belongs_to_user()
    {
        $contact = Contact::factory()->create();
        $this->assertInstanceOf(User::class, $contact->user);
    }

    public function test_contact_belongs_to_franchise()
    {
        $contact = Contact::factory()->create();
        $this->assertInstanceOf(Franchise::class, $contact->franchise);
    }
}
