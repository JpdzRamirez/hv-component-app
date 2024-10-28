<?php

namespace App\Repositories;

use App\Models\Presentation;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
}