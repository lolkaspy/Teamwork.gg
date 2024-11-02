<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Project;

class WelcomeController extends Controller
{
    public function index()
    {
        $recentProjects = Project::with('tags','age_limit','format')->orderBy('created_at', 'desc')->take(4)->get();
        $recentNews = News::with('user')->orderBy('created_at', 'desc')->take(4)->get();

        return view('welcome', compact('recentProjects', 'recentNews'));
    }
}
