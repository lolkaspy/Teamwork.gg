<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;

class ProjectCreatorController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:projects,name',
            'description' => 'required|string',
            'age_limit_id' => 'required|exists:age_limits,id',
            'format_id' => 'required|exists:formats,id',
        ]);

        $filename = '';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                $directory = storage_path('/app/public/project_images/');
                if (! file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }
                $filename = time().'.'.$image->getClientOriginalExtension();
                $newImage = ImageManager::imagick()->read($image);
                $newImage->resize(1920 / 2, 1080 / 2)->save($directory.$filename);

                $project = new Project;
                $project->fill([
                    'name' => $request->name,
                    'description' => $request->description,
                    'age_limit_id' => $request->age_limit_id,
                    'format_id' => $request->format_id,
                    'photo' => '/storage/project_images/'.$filename,
                    'participants' => $request->participants,
                ]);
            } else {
                return response()->json(['error' => 'Uploaded file is not valid.'], 400);
            }

        } else {
            return response()->json(['error' => 'No image uploaded.'], 400);
        }

        $project->save();

        if ($request->has('tags-outside')) {
            $tagList = json_decode($request->input('tags-outside'), true);

            foreach ($tagList as $tagName) {

                $tag = Tag::where('name', '=', $tagName['value'])->first();

                if ($tag != null) {
                    $project->tags()->attach($tag->id);
                } else {
                    $tag = new Tag;
                    $tag->name = $tagName['value'];
                    $tag->save();
                    $project->tags()->attach($tag->id);
                }
            }
        }

        $user = Auth::id();
        $project->users()->attach($user);

        return redirect()->back()->with('success', 'Проект успешно создан!');
    }


    public function update(Request $request, $id)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255|unique:projects,name,' . $id,
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'participants' => 'required|integer|min:2|max:10',
            'format_id' => 'required|exists:formats,id',
            'age_limit_id' => 'required|exists:age_limits,id',
        ]);

        // Находим проект
        $project = Project::findOrFail($id);

        // Обновляем поля проекта
        $project->name = $request->name;
        $project->description = $request->description;
        $project->participants = $request->participants;
        $project->format_id = $request->format_id;
        $project->age_limit_id = $request->age_limit_id;

        // Обработка загрузки нового изображения
        if ($request->hasFile('image')) {
            // Удаляем старое изображение, если оно не является изображением-заглушкой
            if ($project->photo && $project->photo != 'static/images/project_placeholder.jpg') {
                $fullPath = str_replace('/storage', storage_path('app/public'), $project->photo);
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            }
            // Загружаем новое изображение
            $path = $request->file('image')->store('projects', 'public');
            $project->photo = $path;
        }

        // Сохраняем изменения
        $project->save();

        // Обновляем теги (вы можете использовать ваш способ управления тегами)
        $tags = explode(',', $request->get('tags-outside'));
        $project->tags()->sync($tags);

        return redirect()->route('projects.index')->with('success', 'Проект успешно обновлён.');
    }
}
