<?php

namespace Database\Factories;

use App\Models\typeUsers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<typeUsers>
 */
class UserTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<typeUsers>
     */
    protected $model = typeUsers::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->randomElement(["Admin", "User"])
        ];
    }
}
