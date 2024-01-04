<?php

namespace Database\Factories;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Trip::class;

    private static $cities = [
        'Dhaka', 'Chittagong', 'Rajshahi', 'Khulna', 'Barisal', 'Sylhet', 'Comilla', 'Rangpur', 'Mymensingh', 'Cox\'s Bazar'
    ];

    public function definition()
    {
        return [
            'from' => $this->randomBangladeshiCity(),
            'to' => $this->randomBangladeshiCity(),
            'date' => $this->faker->date,
        ];
    }

    private function randomBangladeshiCity()
    {
        return self::$cities[array_rand(self::$cities)];
    }
}
