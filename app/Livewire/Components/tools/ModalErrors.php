<?php

namespace App\Livewire\Components\Tools;

use Livewire\Component;

class ModalErrors extends Component
{

    public $errors=[];
    public $errorVisibility;

    public $listeners=[
        'addErrors' => 'updateErrors'
    ];

    public function mount(){
        $this->errorVisibility=false;
    }
    public function updateErrors($payload){
        $this->errors = $payload['errors'] ?? [];
        $this->errorVisibility = $payload['errorVisibility'] ?? false;
    }
    public function render()
    {
        return view('livewire.components.tools.modal-errors');
    }
}
