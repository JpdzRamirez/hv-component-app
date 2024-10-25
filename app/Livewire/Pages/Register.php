<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Presentation;

use App\Http\Requests\StorePresentationRequest;
use App\Repositories\PresentationRepository;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Register extends Component
{
    use WithFileUploads;

    public $fullname;
    public $description;
    public $photo;    
    //Variables Formulario principal
    public $firstname;
    public $lastname;
    public $card;
    public $email;
    public $email_confirm;
    public $phone;
    public $phone_root;
    public $country;
    public $state;
    public $city;
    public $address;
    public $address_complement;

    // Variables Social Media
    public $terms;
    public $marketing;
    public $linkedin;
    public $facebook;
    public $github;
    public $outlook;
    public $youtube;
    public $twitter;
    public $instagram;

    protected $listeners = [
        'bindingLocation' => 'updateLocation',
        'bindingPhoneRoot' => 'updatePhoneRoot',
        'bindingPhoneNumber' => 'updatePhone',
        'updateSocialPrompt',
        'socialMediaSubmitted',
    ];

    protected PresentationRepository $presentationRepository;
    //Functions
    protected function processPhoto(array $validatedData)
    {
        if ($this->photo) {
            $photoPath = $this->photo->getRealPath();
            $base64Photo = base64_encode(file_get_contents($photoPath));
            $validatedData['photo'] = 'data:image/' . $this->photo->getClientOriginalExtension() . ';base64,' . $base64Photo;
        }
        return $validatedData;
    }
    //*********************** */
    // Rules
    protected function rules()
    {
        return (new StorePresentationRequest)->rules();
    }
    // ****************************************************
    // COMPONENT LIFE, hydrate y dhydrate
    public function mount(PresentationRepository $presentationRepository, $fullname = null, $description = null,$presentationID=null)
    {   
        //Inicializar repositorio
        $this->presentationRepository = $presentationRepository;
        if ($presentationID) {
            try{
                $presentation = $this->presentationRepository->find($presentationID);
                
                if ($presentation) {
                    // Convertir a array antes de asignar
                    foreach ($presentation->getAttributes() as $key => $value) {
                        if (property_exists($this, $key)) {
                            $this->{$key} = $value;
                        }
                    }
                }
            }catch (ModelNotFoundException $e) {
                // Manejo si no se encuentra la presentación
                $presentation = null; // O redirigir a otra página, por ejemplo
                session()->flash('error', 'Presentación no encontrada.');
                return redirect()->route('profile.crud');
            }
            
    

        }
        $this->fullname = $fullname ?? __('forms.register.model-full-name');
        $this->description = $description;
    }
    //Event live listener
    public function updated($propertyName)
    {
        if (in_array($propertyName, ['firstname', 'lastname'])) {
            $this->fullname = trim("{$this->firstname} {$this->lastname}");
        }
    }
    public function socialMediaSubmitted($data)
    {
        // Asignar los valores recibidos desde el dispatch        
        $this->terms = $data['terms'];
        $this->marketing = $data['marketing'];
        // Lista de redes sociales válidas
        $socialPlatforms = ['linkedin', 'twitter', 'youtube', 'outlook', 'github', 'facebook', 'instagram'];

        // Si el valor de 'socialPrompt' es válido, asignarlo a la propiedad correspondiente
        if (in_array($data['socialPrompt'], $socialPlatforms)) {
            $this->{$data['socialPrompt']} = $data['url'];
        }
    }
    //************************ */
    //Events binding
    public function updateLocation($data)
    {
        $this->country = $data['country'];
        $this->state = $data['state'];
        $this->city = $data['city'];
    }
    public function updatePhoneRoot($data)
    {
        $this->phone_root = $data;
    }
    public function updatePhone($data)
    {
        $this->phone = $data;
    }
    // ****************************************************
    // Form method
    public function store()
    {
        try {
            // Obtener las reglas de validación desde StorePresentationRequest
            $validatedData = $this->validate();

            // Procesar la foto en base64, si existe
            $validatedData = $this->processPhoto($validatedData);

            // Usar el repositorio para crear la presentación
            $this->presentationRepository->create($validatedData);

            // Redireccionar o mostrar mensaje de éxito
            session()->flash('success', 'Presentación creada exitosamente');
        } catch (\Illuminate\Validation\ValidationException $exception) {
            // Emitimos un solo evento con todos los errores relevantes
            $this->dispatch('receiveErrors', array_filter([
                'country' => $exception->validator->errors()->get('country'),
                'state' => $exception->validator->errors()->get('state'),
                'city' => $exception->validator->errors()->get('city'),
                'phone' => $exception->validator->errors()->get('phone'),
            ]));

            throw $exception;
        }
    }

    //***************************************************** */
    public function render()
    {
        return view(
            'livewire.pages.register',
            [
                'countryError' => $this->getErrorBag()->get('country'),
                'stateError' => $this->getErrorBag()->get('state'),
                'cityError' => $this->getErrorBag()->get('city'),
                'phoneError' => $this->getErrorBag()->get('phone'),
            ]
        )->layout('layouts.base');
    }
}
