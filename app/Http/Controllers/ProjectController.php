<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['tags', 'age_limit', 'format'])->orderBy('created_at', 'desc')->paginate(12);

        return view('project-cards', compact('projects'));
    }
}
