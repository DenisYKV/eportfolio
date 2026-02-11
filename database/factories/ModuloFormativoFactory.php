<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ModuloFormativoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ciclo_formativo_id' => \App\Models\CicloFormativo::factory(),
            'nombre' => fake()->name(),
            'codigo' => fake()->unique()->word(),
            'descripcion' => fake()->text(),
            'horas_totales' => fake()->numberBetween(1, 100),
            'curso_escolar' => fake()->year(),
            'centro' => fake()->word(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
