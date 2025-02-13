<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['content' => '商品のお届けについて']);
        Category::create(['content' => '商品交換について']);
        Category::create(['content' => '商品トラブル']);
        Category::create(['content' => 'ショップへのお問い合わせ']);
        Category::create(['content' => 'その他']);
        // $categories = [
        //     '商品のお届けについて',
        //     '商品の交換について',
        //     '商品トラブル',
        //     'ショップへのお問い合わせ',
        //     'その他',
        // ];

        // foreach ($categories as $category) {
        //     Category::create([
        //         'content' => $category,
        //     ]);
        // }
    }
}
