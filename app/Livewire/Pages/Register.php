<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Register extends Component
{
    public $fullName='';
    public $description='';
    public $photo='';

    //Variables Formulario principal
    public $first_name='';
    public $last_name='';
    public $card='';
    public $email='';
    public $phone='';
    public $country='';
    public $state='';
    public $city='';

    // Variables Social Media

    public $facebook='';
    public $github='';
    public $mail='';
    public $youtube='';
    public $twitter='';
    public $instagram='';
    
    public function mount($fullName=null,$description = '')
    {   
        $this->fullName = $fullName;
        $this->description = $description;
    }
    public function render()
    {
        return view('livewire.pages.register')->layout('layouts.base');
    }
}
