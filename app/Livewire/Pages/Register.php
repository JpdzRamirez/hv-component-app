<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Register extends Component
{
    public $fullName;
    
    public function mount($fullName=null)
    {   
        $this->fullName = $fullName;
    }
    public function render()
    {
        return view('livewire.pages.register')->layout('layouts.base');
    }
}
