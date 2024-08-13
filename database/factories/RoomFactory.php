<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Room::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word . ' Room', // اسم الغرفة
            'room-number' => $this->faker->numberBetween(10, 100), // سعة الغرفة
            'description' => $this->faker->sentence, // وصف الغرفة
            'image' => $this->faker->imageUrl(),
        ];
    }
}
