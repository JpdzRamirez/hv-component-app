<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Repositories\PresentationRepository;

class Header extends Component
{   
    public $exception;

    protected  PresentationRepository $presentationRepository;
   
    //Inyeccion de dependencias
    public function mount(PresentationRepository $presentationRepository)
    {
        $this->presentationRepository = $presentationRepository;
    }

    public function render()
    {
        $presentation=$this->presentationRepository->find(1);
        if (is_null($presentation)) {
            // Si es null retornar un mensaje o un valor por defecto.
            $presentation = 'No presentation found'; 
        }
        return view('livewire.components.header',[
            'presentation'=>$presentation,
        ]);
    }
}
