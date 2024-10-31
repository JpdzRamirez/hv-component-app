<?php

namespace App\Livewire\Components\Modal;

use Livewire\Component;

class ModalForm extends Component
{
    public $formTitle;
    public $isOpen = false;
 

    public $description;

    protected $listeners = ['openModal' => 'open'];


    public function open($formTitle)
    {
        $this->formTitle = $formTitle;

        $this->isOpen = true;
    }

    public function close()
    {
        $this->isOpen = false;
    }

    public function save(){
        $this->close();
        $this->dispatch('skilldescription', description: $this->description
        )->to('components.registerComponents.skillsform');
        $this->description='';
    }

    public function render()
    {
        return view('livewire.components.modal.modal-form');
    }
}
