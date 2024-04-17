<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $categories=[
      'Bangladesh'=>'বাংলাদেশ',
      'Sports'=>'খেলাধুলা',
      'International'=>'আন্তর্জাতিক',
      'Business'=>'অর্থনীতি',
      'Entertainment'=>'বিনোদন',
      'Health'=>'স্বাস্থ্য',
      'Science & Technology'=>'বিজ্ঞান ও প্রযুক্তি',
      ];

      foreach($categories as $key=>$value){
        Category::create([
            'category_name_en'=>$key,
            'category_name_bn'=>$value,
        ]);
      }
    }
}
