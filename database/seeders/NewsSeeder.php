<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title' => 'The Future of AI in Business Consulting',
                'slug' => Str::slug('The Future of AI in Business Consulting'),
                'description' => 'Artificial Intelligence is transforming the consultancy industry. From predictive analytics to intelligent automation, discover how AI is reshaping business strategies.',
                'photo' => 'news.jpg',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Cybersecurity Trends Every Business Should Know in 2025',
                'slug' => Str::slug('Cybersecurity Trends Every Business Should Know in 2025'),
                'description' => 'With increasing cyber threats, businesses must stay ahead. Learn about the latest cybersecurity strategies to protect your digital assets.',
                'photo' => 'news.jpg',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'How Cloud Computing is Revolutionizing Business Operations',
                'slug' => Str::slug('How Cloud Computing is Revolutionizing Business Operations'),
                'description' => 'From scalability to cost efficiency, cloud computing is a game-changer. Explore its impact on tech-driven consultancy firms.',
                'photo' => 'news.jpg',
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('news')->insert($news);
    }
}
