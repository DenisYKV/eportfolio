<?php

namespace Database\Factories;

use App\Models\ModuloFormativo;
use App\Models\ResultadoAprendizaje;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use LDAP\Result;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class MatriculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'estudiante_id' => User::factory(),
            'modulo_formativo_id' => ModuloFormativo::factory()
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
