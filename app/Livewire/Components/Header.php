<?php

namespace App\Livewire\components;

use Livewire\Component;
use App\Repositories\PresentationRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Header extends Component
{
    public $exception;

    public $section;

    protected  PresentationRepository $presentationRepository;

    //Inyeccion de dependencias
    public function mount(PresentationRepository $presentationRepository)
    {
        $this->presentationRepository = $presentationRepository;
        $this->section = 1;
    }
    public function updatedSection($section){
        $this->section=$section;
    }
    public function render()
    {

        try {
            // //$presentation = $this->presentationRepository->find(1);
            // if (is_null($presentation)) {
            //     // Si es null retornar un mensaje o un valor por defecto.
            //     $presentation = 'No presentation found';
            // }

            return view('livewire.components.header', [
                'presentation' => "test",
            ]);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException(" ID Busqueda" . " " . __('exceptions.not_found'));
        }
    }
}
