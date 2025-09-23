<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Service;
use App\Models\Project;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch data to show on homepage
        $skills = Skill::all();
        $services = Service::all();
        $projects = Project::all();

        // Optional: Get site settings (title, description, etc.)
        $siteTitle = Setting::where('key', 'site_title')->value('value') ?? 'Rukundo Kennedy | Portfolio';
        $siteDescription = Setting::where('key', 'site_description')->value('value') ?? 'Welcome to my portfolio.';

        return view('home', compact('skills', 'services', 'projects', 'siteTitle', 'siteDescription'));
    }
}
