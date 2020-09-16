<?php

// use AdminDatabaseSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminDatabaseSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(subcategorySeeder::class);
         $this->call(SettingDataabseSeeder::class);
    }
}
