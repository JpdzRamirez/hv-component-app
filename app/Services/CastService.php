<?php

namespace App\Services;

use App\Contracts\CastServiceInterface;

class CastService implements CastServiceInterface
{
    /**
     * Castea y transforma un arreglo de habilidades.
     *
     * @param string $skill
     * @param string $description
     * @return array
     */
    public function transformSkill(string $skill, string $description): array
    {
        return [
            'name' => strtoupper($skill),
            'description' => ucfirst($description),
        ];
    }
}