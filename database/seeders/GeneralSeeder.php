<?php

namespace Database\Seeders;

use App\Models\General;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        General::create([
            'site_logo' => url('/images/general/site_logo.png'),
            'site_logo_white' => url('/images/general/site_logo_white.png'),
            'site_logo_footer' => url('/images/general/site_footer_logo.png'),
            'site_name' => 'Digital Adop',
            'email' => 'example@mail.com',
            'phone' => '+01234567890',
            'address' => '149/8 60 feet, Mirpur, Dhaka-1216',
            'site_slogan' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever.',
            'active_time' => 'Mon - Sat 8.00 - 18.00',

            'links_1_name' => 'Home',
            'links_1' => 'javascript:void(0);',
            'links_2_name' => 'Cart',
            'links_2' => 'javascript:void(0);',
            'links_3_name' => 'Checkout',
            'links_3' => 'javascript:void(0);',
            'links_4_name' => 'Orders',
            'links_4' => 'javascript:void(0);',

            'facebook' => 'javascript:void(0);',
            'instagram' => 'javascript:void(0);',
            'twitter' => 'javascript:void(0);',
            'youtube' => 'javascript:void(0);',
        ]);
    }
}
