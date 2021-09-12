<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Franchise;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'birthday' => $this->faker->date('Y-m-d'),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'credit_card_number' => Hash::make($this->faker->creditCardNumber()),
            'email' => $this->faker->unique()->safeEmail(),
            'user_id' => User::factory()->create(),
            'code' => $this->faker->randomNumber(4, true),
            'franchise_id' => Franchise::factory()->create(),
        ];
    }
}
