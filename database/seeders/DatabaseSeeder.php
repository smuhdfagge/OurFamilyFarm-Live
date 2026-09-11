<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['title' => 'Crop Production', 'slug' => 'crop-production', 'summary' => 'Sustainable crop planning and production strategies for quality yields.', 'description' => 'We support crop production through practical field planning, growing advice, soil-aware decisions and productivity improvements that help farmers and institutions achieve better results with less waste.', 'icon' => '🌾', 'sort_order' => 1],
            ['title' => 'Soil Analysis', 'slug' => 'soil-analysis', 'summary' => 'Field-informed soil testing and fertility management.', 'description' => 'Our soil analysis service helps identify nutrient needs, soil health issues and crop suitability so recommendations are rooted in evidence and long-term productivity.', 'icon' => '🧪', 'sort_order' => 2],
            ['title' => 'Seed Multiplication', 'slug' => 'seed-multiplication', 'summary' => 'Quality seed multiplication built for high-performance farming.', 'description' => 'We support seed multiplication programs that improve seed quality, consistency and field performance, enabling stronger agricultural outcomes and better supply reliability.', 'icon' => '🌱', 'sort_order' => 3],
            ['title' => 'Water Analysis', 'slug' => 'water-analysis', 'summary' => 'Reliable water quality insights for farm productivity.', 'description' => 'Water analysis helps define irrigation suitability, crop compatibility and risk reduction, enabling healthier fields and more efficient use of water resources.', 'icon' => '💧', 'sort_order' => 4],
            ['title' => 'Farm Management', 'slug' => 'farm-management', 'summary' => 'Operational support for better farm performance and profitability.', 'description' => 'From farm planning to field monitoring, we provide management support that helps reduce inefficiencies, monitor output and improve decision-making across the cycle.', 'icon' => '🚜', 'sort_order' => 5],
            ['title' => 'Farm Design', 'slug' => 'farm-design', 'summary' => 'Efficient farm layout and production design built to fit the land.', 'description' => 'Our farm design service brings together layout, production flow and resource planning to create systems that improve yield potential and long-term sustainability.', 'icon' => '🗺️', 'sort_order' => 6],
            ['title' => 'Capacity Building', 'slug' => 'capacity-building', 'summary' => 'Training and knowledge transfer for stronger farm teams.', 'description' => 'We provide hands-on learning and advisory support to strengthen farmer knowledge, improve operations and build local capacity in agricultural practice.', 'icon' => '🎓', 'sort_order' => 7],
            ['title' => 'Resources Verification', 'slug' => 'resources-verification', 'summary' => 'Verification of land, inputs and operational resources.', 'description' => 'We help verify agricultural resources so partners can make confident investment, production and operational decisions based on reliable field information.', 'icon' => '📋', 'sort_order' => 8],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }

        $team = [
            ['name' => 'Malam Ahmad Hussain Abubakar', 'role' => 'Founder, Our Family Farm Nig. Ltd.', 'title' => 'Founder, Our Family Farm Nig. Ltd.', 'bio' => 'Founder, Our Family Farm Nig. Ltd.', 'image' => '/ahmad.PNG', 'sort_order' => 1],
            ['name' => 'Fatima Muhammad Adam', 'role' => 'Project Manager', 'title' => 'Project Manager', 'bio' => 'Project Manager', 'image' => '/fatima.PNG', 'sort_order' => 2],
            ['name' => 'Aminu Abba Wada Waziri', 'role' => 'Chief Marketing Executive', 'title' => 'Chief Marketing Executive', 'bio' => 'Chief Marketing Executive', 'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=900&q=80', 'sort_order' => 3],
        ];

        foreach ($team as $member) {
            TeamMember::updateOrCreate(['name' => $member['name']], $member);
        }

        $gallery = [
            ['title' => 'Crops field', 'category' => 'Crops', 'image_url' => 'https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=900&q=80', 'description' => 'Crops field', 'sort_order' => 1],
            ['title' => 'Farm facility', 'category' => 'Facilities', 'image_url' => 'https://images.unsplash.com/photo-1464226184884-fa520f1b8679?auto=format&fit=crop&w=900&q=80', 'description' => 'Farm facility', 'sort_order' => 2],
            ['title' => 'Training session', 'category' => 'Training', 'image_url' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=900&q=80', 'description' => 'Training session', 'sort_order' => 3],
            ['title' => 'Farm equipment', 'category' => 'Equipment', 'image_url' => 'https://images.unsplash.com/photo-1581092921461-eab62e97a780?auto=format&fit=crop&w=900&q=80', 'description' => 'Farm equipment', 'sort_order' => 4],
            ['title' => 'Livestock', 'category' => 'Livestock', 'image_url' => 'https://images.unsplash.com/photo-1550989460-0adf9ea622e2?auto=format&fit=crop&w=900&q=80', 'description' => 'Livestock', 'sort_order' => 5],
            ['title' => 'Field harvest', 'category' => 'Crops', 'image_url' => 'https://images.unsplash.com/photo-1464226184884-fa520f1b8679?auto=format&fit=crop&w=900&q=80', 'description' => 'Field harvest', 'sort_order' => 6],
        ];

        foreach ($gallery as $image) {
            GalleryImage::updateOrCreate(['title' => $image['title']], $image);
        }
    }
}
