<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class subcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class,10)->create(
            [
                'parent_id' => $this->getRandonParentId()
            ]);
    }

    private function getRandonParentId()
    {
        $parient_id =  Category::InRandomOrder()->first();
        return $parient_id;
    }
}
