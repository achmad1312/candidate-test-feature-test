<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\BuildingPart;
use Illuminate\Http\Request;

class BuildingPartController extends Controller
{
    public function index(Project $project)
    {
        $buildingParts = $project->buildingParts;
        return view('building_parts.index', compact('project', 'buildingParts'));
    }

    public function create(Project $project)
    {
        return view('building_parts.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project->buildingParts()->create($validated);

        return redirect()->route('projects.building-parts.index', $project)
            ->with('success', 'Building Part created successfully.');
    }

    public function show(Project $project, BuildingPart $buildingPart)
    {
        // Pastikan bagian ini hanya menampilkan building part milik project terkait
        if ($buildingPart->project_id !== $project->id) {
            abort(404);
        }

        return view('building_parts.show', compact('project', 'buildingPart'));
    }

    public function edit(Project $project, BuildingPart $buildingPart)
    {
        if ($buildingPart->project_id !== $project->id) {
            abort(404);
        }

        return view('building_parts.edit', compact('project', 'buildingPart'));
    }

    public function update(Request $request, Project $project, BuildingPart $buildingPart)
    {
        if ($buildingPart->project_id !== $project->id) {
            abort(404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $buildingPart->update($validated);

        return redirect()->route('projects.building-parts.index', $project)
            ->with('success', 'Building Part updated successfully.');
    }

    public function destroy(Project $project, BuildingPart $buildingPart)
    {
        if ($buildingPart->project_id !== $project->id) {
            abort(404);
        }

        $buildingPart->delete();

        return redirect()->route('projects.building-parts.index', $project)
            ->with('success', 'Building Part deleted successfully.');
    }
}
