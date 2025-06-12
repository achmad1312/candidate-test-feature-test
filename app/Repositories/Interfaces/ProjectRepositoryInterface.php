<?php

namespace App\Repositories\Interfaces;

use App\Models\Project;

interface ProjectRepositoryInterface
{
    public function getAllByUser(int $userId);
    public function findById(int $id);
    public function create(array $data);
    public function update(Project $project, array $data);
    public function delete(Project $project);
}
