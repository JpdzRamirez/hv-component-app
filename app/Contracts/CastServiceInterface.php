<?php

namespace App\Contracts;

interface CastServiceInterface
{
    public function transformSkill(string $skill, string $description);
    public function transformMessage(string $type, string $case);
    public function processPhoto(object $photo);
}