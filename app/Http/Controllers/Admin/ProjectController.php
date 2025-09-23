<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
}

if ($request->hasFile('image')) {
    $path = $request->file('image')->store('projects', 'public');
    $project->image = $path;
}
