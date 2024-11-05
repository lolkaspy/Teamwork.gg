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
}
