<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantStatus>
 */
class ApplicantStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return ApplicantStatusFactory::verifying();
    }

    public static function verifying(): array
    {
        return [
            'status' => 'verifying',
        ];
    }
    
    public static function administration(): array
    {
        return [
            'status' => 'administration',
        ];
    }
    
    public static function assessment(): array
    {
        return [
            'status' => 'assessment',
        ];
    }
    
    public static function evaluation(): array
    {
        return [
            'status' => 'evaluation',
        ];
    }
    
    public static function rejected(): array
    {
        return [
            'status' => 'rejected',
        ];
    }
    
    public static function accepted(): array
    {
        return [
            'status' => 'accepted',
        ];
    }

    public static function inactive(): array
    {
        return [
            'status' => 'inactive',
        ];
    }
}
