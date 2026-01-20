<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'title' => 'Strategic Consulting',
            'slug' => Str::slug('Strategic Consulting'),
            'description' => '<p>We offer comprehensive strategic consulting servcies to help you develop and implement effective business strategies.
                            Our expertise includes market analysis, competitive benchmarking, and growth strategy development.</p>',
            'photo' => 'service.png',
        ]);

        Service::create([
            'title' => 'Technology Advisory',
            'slug' => Str::slug('Technology Advisory'),
            'description' => '<p>Stay ahead of the curve with our technology advisory services. We provide insights on the latest sales channel and customer acquisition technological advancements and help you integrate cutting-edge solutions into your sales and customer service operations.</p>',
            'photo' => 'service.png',
        ]);

        Service::create([
            'title' => 'Sales Growth & Acquisition',
            'slug' => Str::slug('Sales Growth & Acquisition'),
            'description' => '<p>Maximixe the efficiency and performance of your sales and customer acquisition channels with our digital-first sales and customer acquisition approach. We analyze your current sales team and channel structure and recommend improvements to enhance operational efficiency, drive growth while reducing costs.</p>',
            'photo' => 'service.png',
        ]);

        Service::create([
            'title' => 'Regulatory Compliance',
            'slug' => Str::slug('Regulatory Compliance'),
            'description' => '<p>Navigate the complex telecom industry regulatory environment with confidence. Our team ensures that your business complies with all relevant regulations and standards, minimizing risk and avoiding costly penalties fron the regulator.</p>',
            'photo' => 'service.png',
        ]);
    }
}
