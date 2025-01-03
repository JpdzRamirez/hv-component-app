<?php

namespace App\Repositories;

use App\Contracts\PresentationRepositoryInterface;

use App\Models\Presentation;

class PresentationRepository implements PresentationRepositoryInterface
{
    protected $model;

    /**
     * A fresh builder instance should contain a blank product object, which is
     * used in further assembly.
     */
    public function __construct(Presentation $model)
    {
        $this->model = $model;
    }
    public function reset(): void
    {
        $this->model = new Presentation();
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

}