<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function getTags(): JsonResponse
    {
        $tags = Tag::pluck('name');

        return response()->json($tags);
    }
}
