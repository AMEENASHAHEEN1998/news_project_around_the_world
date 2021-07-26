<?php

use Illuminate\Database\Seeder;

class CreateNewsCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $NewsCategory = \App\Models\admin\NewsCategory::create([
            'news_category_name' => '',
            'Notes' => '',
        ]);
    }
}
