<?php

namespace App\Contracts;

use App\Models\Presentation;

/**
 * The Builder interface specifies methods for creating the different parts of
 * the Product objects.
 */

interface SkillRepositoryInterface
{
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function createSkills(Presentation $presentation, array $skills);
}