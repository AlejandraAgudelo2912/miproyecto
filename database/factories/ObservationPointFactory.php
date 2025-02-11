<?php

namespace Database\Factories;

use App\Models\ObservationPoint;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ObservationPointFactory extends Factory
{
    protected $model = ObservationPoint::class;

    public function definition(): array
    {
        return [
            'user_id' => User::class::factory(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
