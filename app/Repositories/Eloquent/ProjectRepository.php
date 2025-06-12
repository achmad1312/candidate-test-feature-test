<?php

namespace App\Repositories\Eloquent;

use App\Models\Project;
use App\Repositories\Interfaces\ProjectRepositoryInterface;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function getAllByUser($userId)
    {
        return Project::where('user_id', $userId)->get();
    }

    public function findById($id)
    {
        return Project::findOrFail($id);
    }

    public function create(array $data)
    {
        return Project::create($data);
    }

    public function update($id, array $data)
    {
        $project = Project::findOrFail($id);
        $project->update($data);
        return $project;
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);
        return $project->delete();
    }
}
