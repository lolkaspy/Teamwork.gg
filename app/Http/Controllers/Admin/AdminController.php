<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin-dashboard');
    }
}
