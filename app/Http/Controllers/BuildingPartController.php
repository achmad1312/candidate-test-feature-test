<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\BuildingPart;
use Illuminate\Http\Request;
use App\Services\BuildingPartServiceInterface;

class BuildingPartController extends Controller
{
    protected BuildingPartServiceInterface $buildingPartService;

    public function __construct(BuildingPartServiceInterface $buildingPartService)
    {
        $this->buildingPartService = $buildingPartService;
    }

    public function index(Project $project)
    {
        $buildingParts = $this->buildingPartService->getByProject($project);
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

        $this->buildingPartService->createForProject($project, $validated);

        return redirect()->route('projects.building-parts.index', $project)
            ->with('success', 'Building Part created successfully.');
    }

    public function show(Project $project, BuildingPart $buildingPart)
    {
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

        $this->buildingPartService->update($buildingPart, $validated);

        return redirect()->route('projects.building-parts.index', $project)
            ->with('success', 'Building Part updated successfully.');
    }

    public function destroy(Project $project, BuildingPart $buildingPart)
    {
        if ($buildingPart->project_id !== $project->id) {
            abort(404);
        }

        $this->buildingPartService->delete($buildingPart);

        return redirect()->route('projects.building-parts.index', $project)
            ->with('success', 'Building Part deleted successfully.');
    }
}
