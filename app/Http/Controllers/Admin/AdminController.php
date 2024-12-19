<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with(['tags', 'networks', 'projects', 'roles'])
            ->orderBy('created_at', 'desc')
            ->paginate(20, ['*'], 'users');

        $projects = Project::with(['tags', 'age_limit', 'format'])
            ->orderBy('created_at', 'desc')
            ->paginate(20, ['*'], 'projects');

        return view('admin-dashboard', compact('users', 'projects'));
    }
}
