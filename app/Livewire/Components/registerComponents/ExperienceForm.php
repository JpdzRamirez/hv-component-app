<?php

namespace App\Livewire\Components\registerComponents;

use Livewire\Component;

class ExperienceForm extends Component
{
    public $experiences;

    public function mount($experiences=null){
        $this->experiences=$experiences;
    }
    public function render()
    {
        return view('livewire.components.registerComponents.experience-form');
    }
}
