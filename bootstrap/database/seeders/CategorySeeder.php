<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
            'name'=>'Curtains',
            'description'=>'Handcrafted to size. simple or elaborate. embroideries to pichwai, minimal borders to textured solids. choose a curtain to suit your architecture & interior style.',
            'image'=>'curtains.png',
            'children'=>[
                    ['name'=>'Main curtain',
                    'description'=>'Main curtain Description Comes Here',
                    'image'=>'main-curtain.png'
                    ],
                    ['name'=>'Sheer curtain',
                    'description'=>'Sheer curtain Description Comes Here',
                    'image'=>'sheer-curtain.png'
                    ],
                    ['name'=>'Panels',
                    'description'=>'Panels Description Comes Here',
                    'image'=>'panels.png'
                    ],
                    ['name'=>'Accessories',
                    'description'=>'Accessories Description Comes Here',
                    'image'=>'accessories.png'
                    ],
                ],
            ],
            [
            'name'=>'Blinds',
            'description'=>'Blinds Description Comes Here',
            'image'=>'blinds.png',
            'children'=>[],
            ],
            [
            'name'=>'Panels',
            'description'=>'Panels Description Comes Here',
            'image'=>'panels.png',
            'children'=>[],
            ],
            [
            'name'=>'Accessories',
            'description'=>'Accessories Description Comes Here',
            'image'=>'accessories.png',
            'children'=>[],
            ],
            [
            'name'=>'Bedding',
            'description'=>'Bedding Description Comes Here',
            'image'=>'bedding.png',
            'children'=>[],
            ]
        ];
        \App\Models\Category::truncate();
        foreach ($categories as $category) {
            $parent = \App\Models\Category::create([
                'cat_nm' => $category['name'],
                'cat_ds' => $category['description'],
                'cat_img1' => $category['image'],
            ]);

            if (isset($category['children'])) {
                foreach ($category['children'] as $child) {
                    $parent->children()->create([
                        'cat_nm' => $child['name'],
                        'cat_ds' => $child['description'],
                        'cat_img1' => $child['image'],
                    ]);
                }
            }
        }
    }
}
