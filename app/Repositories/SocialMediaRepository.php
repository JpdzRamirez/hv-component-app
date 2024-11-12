<?php

namespace App\Repositories;

use App\Models\SocialMedia;
use App\Models\Presentation;

use App\Contracts\SocialMediaRepositoryInterface;

class SocialMediaRepository implements SocialMediaRepositoryInterface
{
    protected $model;

    /**
     * A fresh builder instance should contain a blank product object, which is
     * used in further assembly.
     */
    public function __construct(SocialMedia $model)
    {
        $this->model = $model;
    }
    public function reset(): void
    {
        $this->model = new SocialMedia();
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

    public function createSocialMedia(Presentation $presentation, array $socialMediaData)
    {
        // Crear la entrada en la tabla socialmedia asociada a la presentación
        $socialMediaData['presentation_id'] = $presentation->id; // Asociar con el ID de la presentación
        return SocialMedia::create($socialMediaData);
    }
}