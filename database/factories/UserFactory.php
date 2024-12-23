<?php

namespace Database\Factories;

use App\Models\UserStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $status_id = fake()->randomElement(UserStatus::STATUSES);
        return [
            'username' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => $status_id == UserStatus::PENDING ? null : now(),
            // 'status_id' => $status_id,
            'email_verified_at' => now(),
            'status_id' => fake()->randomElement([UserStatus::INACTIVE, UserStatus::ACTIVE, UserStatus::VERIFYING]),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
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
