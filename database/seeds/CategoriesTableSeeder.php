<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =[
            ['id' => 1, 'name' => '家電/スマホ/カメラ'],
            ['id' => 2, 'name' => 'ファッション/服'],
            ['id' => 3, 'name' => '小物/インテリ'],
            ['id' => 4, 'name' => 'キッチン/食品'],
            ['id' => 5, 'name' => '日用品'],
            ['id' => 6, 'name' => 'その他'],
        ];
        DB::table('categories')->insert($categories);
    }
}
