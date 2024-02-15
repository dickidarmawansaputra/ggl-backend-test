<?php

namespace App\Containers\NewsSection\News\Data\Seeders;

use Illuminate\Support\Facades\DB;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;
use App\Containers\NewsSection\News\Data\Factories\NewsFactory;
use App\Containers\NewsSection\Category\Data\Factories\CategoryFactory;

class NewsSeeder extends ParentSeeder
{
    public function run(): void
    {
        $news = NewsFactory::new()->count(5)->create();
        $categories = CategoryFactory::new()->count(5)->create();
        foreach ($news->pluck('id') as $newsId) {
            foreach ($categories->pluck('id') as $categoryId) {
                DB::table('category_news')->insert(['news_id' => $newsId, 'category_id' => $categoryId]);
            }
        }
    }
}
