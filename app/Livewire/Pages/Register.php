<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Register extends Component
{
    public $fullName='';
    public $description='';
    public $photo='';

    //Variables Formulario principal
    public $firstName='';
    public $lastName='';
    public $card='';
    public $email='';
    public $phone='';
    public $country='';
    public $state='';
    public $city='';
    public $address='';
    public $addressComplement='';

    // Variables Social Media

    public $facebook='';
    public $github='';
    public $mail='';
    public $youtube='';
    public $twitter='';
    public $instagram='';
    
    public function mount($fullName=null,$description = '')
    {   
        $this->fullName =$fullName ?? __('forms.register.model-full-name');
        $this->description = $description;
    }
    public function updated($propertyName)
    {
        if (in_array($propertyName, ['firstName', 'lastName'])) {
            $this->fullName = trim("{$this->firstName} {$this->lastName}");
        }
    }
    public function render()
    {   
        return view('livewire.pages.register')->layout('layouts.base');
    }
}
