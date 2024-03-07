<?php

namespace Database\Factories;

use App\Models\Reservations;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<Reservations>
 */
class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = Reservations::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "idUser" => fake()->numberBetween(1,10),
            "idTarif" => fake()->numberBetween(1,5),
            "idSeance" => fake()->numberBetween(1,10)
        ];
    }
}
