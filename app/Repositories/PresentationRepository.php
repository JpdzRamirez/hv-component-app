<?php

namespace App\Repositories;

use App\Models\Presentation;
use App\Models\SocialMedia;

class PresentationRepository 
{
    protected $model;

    public function __construct(Presentation $model)
    {
        $this->model = $model;
    }

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
    public function createSocialMedia(Presentation $presentation, array $socialMediaData)
    {
        // Crear la entrada en la tabla socialmedia asociada a la presentación
        $socialMediaData['presentation_id'] = $presentation->id; // Asociar con el ID de la presentación
        return SocialMedia::create($socialMediaData);
    }
}