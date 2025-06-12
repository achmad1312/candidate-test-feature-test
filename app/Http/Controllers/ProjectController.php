<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\ProjectServiceInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProjectController extends Controller
{
    use AuthorizesRequests;
    
    protected ProjectServiceInterface $projectService;

    public function __construct(ProjectServiceInterface $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $projects = $this->projectService->getAll();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->projectService->create($data);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function edit($id){

        $project = $this->projectService->getById($id);
        $this->authorize('update', $project);

        return view('projects.edit', compact('project'));
    }


    public function update(Request $request, $id){
        $project = $this->projectService->getById($id);
    
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $this->projectService->update($project, $data); // jangan return project di service!
    
        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }
    
    public function destroy($id){
        $project = $this->projectService->getById($id);
        $this->authorize('delete', $project);
    
        $this->projectService->delete($project); // jangan return apapun di service!
    
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
    

    public function show(Project $project){
        $this->authorize('view', $project);
        return view('projects.show', compact('project'));
    }


}
