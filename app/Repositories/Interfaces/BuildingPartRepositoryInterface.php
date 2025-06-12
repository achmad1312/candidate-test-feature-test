<?php

namespace App\Repositories\Interfaces;

use App\Models\Project;
use App\Models\BuildingPart;
use Illuminate\Support\Collection;

interface BuildingPartRepositoryInterface
{
    public function getByProject(Project $project): Collection;
    public function createForProject(Project $project, array $data): BuildingPart;
    public function update(BuildingPart $buildingPart, array $data): bool;
    public function delete(BuildingPart $buildingPart): bool;
}
