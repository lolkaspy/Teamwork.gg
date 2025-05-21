<?php

namespace App\Http\Controllers;

use App\Enums\AgeLimitEnum;
use App\Enums\FormatEnum;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $ageLimitEnum = AgeLimitEnum::class;
        $formatEnum = FormatEnum::class;

        $query = Project::with(['tags', 'age_limit', 'format']);

        // Поиск по названию
        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        // Фильтр по формату
        if ($request->filled('format_id')) {
            $query->where('format_id', $request->format_id);
        }

        // Фильтр по возрасту
        if ($request->filled('age_limit_id')) {
            $query->where('age_limit_id', $request->age_limit_id);
        }

        // Фильтр по тегам
        if ($request->has('tags')) {
            $tagsInput = $request->input('tags');
            $tagNames = [];

            try {
                $decodedTags = json_decode($tagsInput, true);
                if (is_array($decodedTags)) {
                    foreach ($decodedTags as $tag) {
                        if (isset($tag['value'])) {
                            $tagNames[] = $tag['value'];
                        }
                    }
                }
            } catch (\Exception $e) {
                // Если не JSON, попробуем как простую строку
                $tagNames = array_filter([$tagsInput]);
            }

            if (!empty($tagNames)) {
                $query->whereHas('tags', function($q) use ($tagNames) {
                    $q->whereIn('name', $tagNames);
                });
            }
        }
        $projects = $query->orderBy('created_at', 'desc')
            ->paginate(12)
            ->withQueryString();


        return view('project-cards', compact('projects','ageLimitEnum', 'formatEnum'));
    }

    public function show(Project $project)
    {
        $participantsCount = DB::table('project_users')->select(DB::raw('count(*) as count, project_id'))
            ->groupBy('project_id')->get()->keyBy('project_id');

        // Получаем полную информацию об участниках для каждого проекта
        $projectParticipants = DB::table('project_users')
            ->join('users', 'project_users.user_id', '=', 'users.id')
            ->select('project_users.project_id', 'users.*')
            ->get()
            ->groupBy('project_id');

        return view('project-info', compact('project', 'participantsCount', 'projectParticipants'));
    }

    public function destroy(Project $project)
    {
        DB::transaction(function () use ($project) {
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
        });

        return redirect()->back()->with('success', 'Проект был успешно распущен');
    }
}
