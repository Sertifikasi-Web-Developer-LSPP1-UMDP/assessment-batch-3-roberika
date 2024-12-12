<?php

namespace Database\Factories;

use App\Models\UserStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserStatus>
 */
class UserStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return UserStatusFactory::pending();
    }

    public static function pending(): array
    {
        return [
            'status' => 'pending',
        ];
    }

    public static function verifying(): array
    {
        return [
            'status' => 'verifying',
        ];
    }

    public static function inactive(): array
    {
        return [
            'status' => 'inactive',
        ];
    }

    public static function active(): array
    {
        return [
            'status' => 'active',
        ];
    }
}
