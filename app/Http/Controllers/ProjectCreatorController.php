<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectCreatorController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:projects,name',
            'description' => 'required|string',
            'age_limit_id' => 'required|exists:age_limits,id',
            'format_id' => 'required|exists:formats,id',
            // Добавьте валидацию для тегов, если это необходимо
        ]);

        $project = new Project;
        $project->fill([
            'name' => $request->name,
            'description' => $request->description,
            'age_limit_id' => $request->age_limit_id,
            'format_id' => $request->format_id,
        ]);
        $project->save();

        return redirect()->route('welcome')->with('success', 'Проект успешно создан!');
    }
}
