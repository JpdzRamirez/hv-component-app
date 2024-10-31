<?php

namespace App\Contracts;

interface CastServiceInterface
{
    public function transformSkill(string $skill, string $description);

}