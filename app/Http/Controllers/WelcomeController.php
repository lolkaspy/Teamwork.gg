<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Project;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $recentProjects = Project::with('tags')->orderBy("created_at", "desc")->take(4)->get();
        $recentNews = News::with('user')->orderBy("created_at", "desc")->take(4)->get();
        return view('welcome', compact('recentProjects', 'recentNews'));
    }
}
