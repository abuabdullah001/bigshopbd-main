<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::create([
            'image' => url('/images/slider/Tablet.jpeg'),
            'name' => 'Smart Tablets',
        ]);
        Slider::create([
            'image' => url('/images/slider/headphone.jpeg'),
            'name' => 'Wireless Smart Headphone',
        ]);
        Slider::create([
            'image' => url('/images/slider/Watch.jpeg'),
            'name' => 'Smart Watches',
        ]);
    }
}
