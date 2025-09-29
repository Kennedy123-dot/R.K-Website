<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'proficiency' => 'required|integer|min:1|max:100',
        ]);

        Skill::create($request->all());
        return redirect()->route('admin.skills.index')->with('success', 'Skill added!');
    }

    // Add edit, update, destroy methods similarly...
}