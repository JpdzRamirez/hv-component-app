<?php

namespace App\Repositories;

use App\Models\Experience;
use App\Models\Presentation;

use App\Contracts\ExperienceRepositoryInterface;

class ExperienceRepository implements ExperienceRepositoryInterface
{
    protected $model;

    /**
     * A fresh builder instance should contain a blank product object, which is
     * used in further assembly.
     */
    public function __construct(Experience $model)
    {
        $this->model = $model;
    }
    public function reset(): void
    {
        $this->model = new Experience();
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

    public function createExperiences(Presentation $presentation, array $experiences)
    {
        // Crear las entradas en la tabla skills asociadas a la presentación
        $createdExperiences= [];
        foreach($experiences as $experience) {
            $experience['presentation_id'] = $presentation->id; // Asociar con el ID de la presentación
            $createdExperiences[] = Experience::create($experience); // Guardar cada habilidad creada en el arreglo
        }
        
        return $createdExperiences; // Retornar todas las habilidades creadas
    }
}