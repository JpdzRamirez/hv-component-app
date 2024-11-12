<?php

namespace App\Livewire\Pages;

use Livewire\Component;

use App\Http\Requests\StoreContactRequest;

class Contact extends Component
{   
    public $name;
    public $email;
    public $contact;
    public $message;

    //*********************** */
    // Rules
    protected function rules()
    {
        return (new StoreContactRequest)->rules();
    }
    public function submitMail(){
        // Obtener las reglas de validación desde StorePresentationRequest
        $validatedData = $this->validate();
        


    }
    public function render()
    {
        return view('livewire.pages.contact');
    }
}
