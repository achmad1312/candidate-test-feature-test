<?php

namespace App\Services;

use App\Models\Project;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use Illuminate\Support\Collection;

class ProjectService implements ProjectServiceInterface
{
    protected ProjectRepositoryInterface $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function getAll(): Collection
    {
        return $this->projectRepository->getAllByUser(auth()->id());
    }

    public function getById(int $id): Project
    {
        return $this->projectRepository->findById($id);
    }

    public function create(array $data): Project
    {
        $data['user_id'] = auth()->id();
        return $this->projectRepository->create($data);
    }

    public function update(Project $project, array $data): void
    {
        $project->update($data);
    }

    public function delete(Project $project): void
    {
        $project->delete();
    }

}
