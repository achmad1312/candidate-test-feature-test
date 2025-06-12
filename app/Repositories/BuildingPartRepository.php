<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\BuildingPart;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\BuildingPartRepositoryInterface;

class BuildingPartRepository implements BuildingPartRepositoryInterface
{
    public function getByProject(Project $project): Collection
    {
        return $project->buildingParts()->get();
    }

    public function createForProject(Project $project, array $data): BuildingPart
    {
        return $project->buildingParts()->create($data);
    }

    public function update(BuildingPart $buildingPart, array $data): bool
    {
        return $buildingPart->update($data);
    }

    public function delete(BuildingPart $buildingPart): bool
    {
        return $buildingPart->delete();
    }
}
