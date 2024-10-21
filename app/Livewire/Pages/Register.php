<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Http\Requests\StorePresentationRequest;
use App\Repositories\PresentationRepository;

class Register extends Component
{
    use WithFileUploads;

    public $fullName='';
    public $description='';
    public $photo;

    //Variables Formulario principal
    public $firstName='';
    public $lastName='';
    public $card='';
    public $email='';
    public $email_confirm = '';
    public $phone='';
    public $phoneRoot='';
    public $country='';
    public $state='';
    public $city='';
    public $address='';
    public $address_complement='';

    // Variables Social Media

    public $facebook='';
    public $github='';
    public $mail='';
    public $youtube='';
    public $twitter='';
    public $instagram='';

    protected $listeners = [
        'bindingLocation' => 'updateLocation',
        'bindingPhoneRoot' => 'updatePhoneRoot',
        'bindingPhoneNumber' =>'updatePhone',
    ];

    protected PresentationRepository $presentationRepository;

    // ****************************************************
    // COMPONENT LIFE, hydrate y dhydrate
    public function mount(PresentationRepository $presentationRepository, $fullName = null, $description = null)
    {   
        $this->presentationRepository = $presentationRepository;
        $this->fullName =$fullName ?? __('forms.register.model-full-name');
        $this->description = $description; 
    }
    public function updated($propertyName)
    {
        if (in_array($propertyName, ['firstName', 'lastName'])) {
            $this->fullName = trim("{$this->firstName} {$this->lastName}");
        }
    }
    public function updateLocation($data)
    {
        $this->country = $data['country'];
        $this->state = $data['state'];
        $this->city = $data['city'];        
    }
    public function updatePhoneRoot($data)
    {
        $this->phoneRoot = $data;     
    }
    public function updatePhone($data)
    {
        $this->phone = $data;     
    }
    // ****************************************************

    public function store()
    {
        // Obtener las reglas de validación desde StorePresentationRequest
        $request = new StorePresentationRequest();

        $validatedData = $this->validate($request->rules(), $request->messages());

        // Si hay una foto, transformarla a base64
        if ($this->photo) { 
            $photoPath = $this->photo->getRealPath();
            $base64Photo = base64_encode(file_get_contents($photoPath));

            // Agregar la imagen base64 a los datos que se guardarán
            $validatedData['photo'] = 'data:image/' . $this->photo->getClientOriginalExtension() . ';base64,' . $base64Photo;
        }
        // Usar el repositorio para crear la presentación
        $this->presentationRepository->create($validatedData);

        // Redireccionar o mostrar mensaje de éxito
        session()->flash('success', 'Presentación creada exitosamente');
    }

    //***************************************************** */
    public function render()
    {   
        return view('livewire.pages.register')->layout('layouts.base');
    }
}
