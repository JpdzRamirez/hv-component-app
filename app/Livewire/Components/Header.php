<?php

namespace App\Livewire\Components;

use Livewire\Component;

//Models
use App\Models\Presentation;

class Header extends Component
{   
    private $presentation;
    public function mount()
    {   
        $presentation=Presentation::find(1);;
        if($presentation){
            $this->presentation = $presentation;
        }
    }
    public function render()
    {
        return view('livewire.components.header');
    }
}
