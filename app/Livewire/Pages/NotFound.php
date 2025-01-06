<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class NotFound extends Component
{   
    public $message;

    public function mount($message)
    {
        $this->message = $message;
    }
    public function render()
    {
        return view('livewire.pages.not-found');
    }
}
