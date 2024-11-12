<?php

namespace App\Repositories;

use App\Models\Skill;
use App\Models\Presentation;

use App\Contracts\SkillRepositoryInterface;

class SkillRepository implements SkillRepositoryInterface
{
    protected $model;

    /**
     * A fresh builder instance should contain a blank product object, which is
     * used in further assembly.
     */
    public function __construct(Skill $model)
    {
        $this->model = $model;
    }
    public function reset(): void
    {
        $this->model = new Skill();
    }
    /**
     * All production steps work with the same product instance.
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $presentation = $this->model->findOrFail($id);
        $presentation->update($data);
        return $presentation;
    }

    public function delete($id)
    {
        $presentation = $this->model->findOrFail($id);
        $presentation->delete();
    }

    public function createSkills(Presentation $presentation, array $skills)
    {
        // Crear las entradas en la tabla skills asociadas a la presentación
        $createdSkills = [];
        foreach($skills as $skill) {
            $skill['presentation_id'] = $presentation->id; // Asociar con el ID de la presentación
            $createdSkills[] = Skill::create($skill); // Guardar cada habilidad creada en el arreglo
        }
        
        return $createdSkills; // Retornar todas las habilidades creadas
    }
}