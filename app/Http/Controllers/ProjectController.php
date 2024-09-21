<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Menampilkan daftar proyek
    public function index()
    {
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    // Menampilkan formulir untuk membuat proyek baru
    public function create()
    {
        return view('projects.create');
    }

    // Menyimpan proyek baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Project::create($request->only('name', 'description'));

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    // Menampilkan detail proyek
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    // Menampilkan formulir untuk mengedit proyek
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Memperbarui proyek yang ada
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project->update($request->only('name', 'description'));

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    // Menghapus proyek
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}

