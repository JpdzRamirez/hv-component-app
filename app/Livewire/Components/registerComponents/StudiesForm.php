<?php

namespace App\Livewire\Components\RegisterComponents;

use Livewire\Component;

class StudiesForm extends Component
{
    public $studies;

    public function mount($studies=null){
        $this->studies=$studies;
    }
    public function render()
    {
        return view('livewire.components.register-components.studies-form');
    }
}
