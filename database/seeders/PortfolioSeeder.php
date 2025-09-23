<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;
use App\Models\Service;
use App\Models\Project;
use App\Models\Setting;

class PortfolioSeeder extends Seeder
{
    public function run()
    {
        Skill::insert([
            ['name' => 'PHP / Laravel', 'proficiency' => 95],
            ['name' => 'JavaScript', 'proficiency' => 85],
            ['name' => 'Vue.js / React', 'proficiency' => 80],
            ['name' => 'UI/UX Design', 'proficiency' => 75],
            ['name' => 'MySQL', 'proficiency' => 90],
        ]);

        Service::insert([
            ['title' => 'Web Development', 'description' => 'Full-stack web apps with Laravel & modern JS.', 'icon' => 'fas fa-laptop-code'],
            ['title' => 'API Integration', 'description' => 'RESTful APIs, Payment gateways, OAuth.', 'icon' => 'fas fa-plug'],
            ['title' => 'UI/UX Design', 'description' => 'Beautiful, responsive, user-centered designs.', 'icon' => 'fas fa-paint-brush'],
        ]);

        Project::insert([
            ['title' => 'E-Commerce Platform', 'description' => 'Laravel + Vue store with cart & payments.', 'image' => 'project1.jpg', 'link' => '#'],
            ['title' => 'Portfolio CMS', 'description' => 'Admin-managed portfolio with blog.', 'image' => 'project2.jpg', 'link' => '#'],
        ]);

        Setting::insert([
            ['key' => 'site_title', 'value' => 'Rukundo Kennedy | Developer & Designer'],
            ['key' => 'site_description', 'value' => 'Crafting digital experiences with passion.'],
            ['key' => 'social_twitter', 'value' => 'https://twitter.com/rukundokennedy'],
            ['key' => 'social_github', 'value' => 'https://github.com/rukundokennedy'],
            ['key' => 'contact_email', 'value' => 'hello@rukundokennedy.com'],
        ]);
    }
}