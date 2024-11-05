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

    public function show(Project $project)
    {
        return view('project-info', compact('project'));
    }

    public function destroy(Project $project)
    {

        if ($project->tags()->exists()) {
            $project->tags()->detach();
        }

        if ($project->users()->exists()) {
            $project->users()->detach();
        }

        if ($project->photo != 'static/images/project_placeholder.jpg') {
            $fullPath = str_replace('/storage', storage_path('app/public'), $project->photo);
            unlink($fullPath);
        }

        $project->delete();

        return redirect()->back()->with('success', 'Проект был успешно распущен');
    }
}
