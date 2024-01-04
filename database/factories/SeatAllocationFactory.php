<?php

namespace Database\Factories;

use App\Models\SeatAllocation;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeatAllocation>
 */
class SeatAllocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = SeatAllocation::class;

    private $seatNumber = 1;

    public function definition()
    {
        $status = $this->faker->numberBetween(0, 1);
        return [
            'trip_id' => Trip::factory(),
            'seat_no' => $this->seatNumber++,
            'status' => $this->faker->numberBetween(0, 1),
            't_name' => $status == 1 ? $this->faker->name : null,
        ];

    }
}
