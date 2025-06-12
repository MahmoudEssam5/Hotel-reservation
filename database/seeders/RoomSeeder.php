<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Room::create([
                'name' => "Room $i",
                'room-number' => 100 + $i,
                'description' => "This is room number $i. It is very comfortable and well-furnished.",
                'image' => "room$i.jpg",
            ]);
        }
    }
}
