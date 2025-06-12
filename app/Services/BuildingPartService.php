<?php

namespace App\Services;

use App\Models\Project;
use App\Models\BuildingPart;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\BuildingPartRepositoryInterface;

class BuildingPartService implements BuildingPartServiceInterface
{
    protected BuildingPartRepositoryInterface $buildingPartRepository;

    public function __construct(BuildingPartRepositoryInterface $buildingPartRepository)
    {
        $this->buildingPartRepository = $buildingPartRepository;
    }

    public function getByProject(Project $project): Collection
    {
        return $this->buildingPartRepository->getByProject($project);
    }

    public function createForProject(Project $project, array $data): BuildingPart
    {
        return $this->buildingPartRepository->createForProject($project, $data);
    }

    public function update(BuildingPart $buildingPart, array $data): bool
    {
        return $this->buildingPartRepository->update($buildingPart, $data);
    }

    public function delete(BuildingPart $buildingPart): bool
    {
        return $this->buildingPartRepository->delete($buildingPart);
    }
}
