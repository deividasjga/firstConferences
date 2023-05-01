<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use Faker\Provider\Lorem;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        (new Article())->insert([
            [
                'title' => Lorem::sentence(5),
                'content' => Lorem::text()
            ],
            [
                'title' => Lorem::sentence(5),
                'content' => Lorem::text()
            ]
            ]);
    }
}
