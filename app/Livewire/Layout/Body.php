<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class Body extends Component
{
    
    public function render()
    {
        return view('livewire.layout.body')->layout('layouts.base');
    }
}
