<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(
            [
                'name' => 'ahmed saadon',
                'email' => 'ahmed1191@gmail.com',
                'password' => bcrypt('ahmed1191'),
            ]);
    }
}
