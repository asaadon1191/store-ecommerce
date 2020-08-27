<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingDataabseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::setMany(
            [
                'defult_lang'           => 'ar',
                'defult_timezone'       => 'Africa/Cairo',
                'comments_enable'       => true,
                'auto_comments_enable'  => true,
                'defult_currency'       => ['USD','EUR'],
                'search_engine'         => 'mysql',
                'store_email'           => 'ahmed@gmail.com',
                'free_shipping_cost'    => 0,
                'local_shipping_cost'   => 100,
                'outer_shipping_cost'   => 500,
                'translatable'          => 
                [
                    'store_name'            => 'asaadon store',
                    'free_shipping_cost'    => 'free shipping',
                    'local_shipping_cost'   => 'local shipping',
                    'outer_shipping_cost'   => 'outer shipping',
                ],
            ]);
    }
}
