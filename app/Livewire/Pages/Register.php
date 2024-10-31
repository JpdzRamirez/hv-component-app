<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Http\Requests\StorePresentationRequest;
use App\Repositories\PresentationRepository;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

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
    public $socials = ['linkedin', 'facebook', 'github', 'office365', 'youtube', 'twitter', 'instagram'];
    public $socialMediaData = [];

    public $skills=[];

    protected $listeners = [
        'bindingLocation' => 'updateLocation',
        'bindingPhoneRoot' => 'updatePhoneRoot',
        'bindingPhoneNumber' => 'updatePhone',
        'skillAdded'=>'updateSkills',
        'updateSocialPrompt',
        'socialMediaSubmitted',
    ];

    protected PresentationRepository $presentationRepository;
    //Functions
    protected function processPhoto($photo)
    {   
        if ($this->photo) {
            $photoPath = $this->photo->getRealPath();
            $base64Photo = base64_encode(file_get_contents($photoPath));
            $photo = 'data:image/' . $this->photo->getClientOriginalExtension() . ';base64,' . $base64Photo;
        }
        return $photo;
    }
    private function loadSocialMediaData($socialMedia)
    {
        foreach ($this->socials as $social) {
            if (isset($socialMedia->{$social})) {
                $this->socialMediaData[$social]['url'] = $socialMedia->{$social};
                $this->socialMediaData[$social]['status'] = '';
                
                // Decodificar el JSON de términos y marketing, si está presente
                $terms = isset($socialMedia->{$social . '_terms'}) ? json_decode($socialMedia->{$social . '_terms'}, true) : [];
                $this->socialMediaData[$social]['terms'] = $terms['terms'] ?? 0;
                $this->socialMediaData[$social]['marketing'] = $terms['marketing'] ?? 0;
            }
        }
    }
    private function loadSills($skills)
    {
        $this->skills=$skills->toArray();
    }
    //*********************** */
    // Rules
    protected function rules()
    {
        return (new StorePresentationRequest)->rules();
    }
    // ****************************************************
    // COMPONENT LIFE, hydrate y dhydrate
    public function mount(PresentationRepository $presentationRepository, $description = null, $presentationID = null)
    {
        //Inicializar repositorio
        $this->presentationRepository = $presentationRepository;

        if ($presentationID) {
            try {
                $presentation = $this->presentationRepository->find($presentationID);

                if ($presentation) {
                    // Convertir a array antes de asignar
                    foreach ($presentation->getAttributes() as $key => $value) {
                        if (property_exists($this, $key)) {
                            $this->{$key} = $value;
                        }
                    }                    
                    // Inicializa las redes sociales si existen
                    if ($presentation->socialmedia) {
                        $this->loadSocialMediaData($presentation->socialmedia);
                    }
                    //Inicializa las skills en el form
                    if ($presentation->skills) {
                        $this->loadSills($presentation->skills);
                    }

                    $this->fullname = trim("{$presentation->firstname} {$presentation->lastname}");
                    $this->description = $presentation->description;
                }
            } catch (ModelNotFoundException $e) {
                // Manejo si no se encuentra la presentación
                throw new ModelNotFoundException(" ID Busqueda: $presentationID" . " " . __('exceptions.not_found'));
            }
        } else {
            //Inicializar redes sociales por defecto
            foreach ($this->socials as $social) {
                $this->socialMediaData[$social] = [
                    'url' => '',
                    'status' => '',
                    'terms' => 0,
                    'marketing' => 0,
                ];
            }

            $this->fullname = __('forms.register.model-full-name');
            $this->description = $description;
        }   
    }
    //Event live listener
    public function updated($propertyName)
    {
        if (in_array($propertyName, ['firstname', 'lastname'])) {
            $this->fullname = trim("{$this->firstname} {$this->lastname}");
        }
    }
    public function updatedPhoto(){
        $tempPhoto=$this->photo;
        $this->photo =$this->processPhoto($tempPhoto);
    }
    public function socialMediaSubmitted($data)
    {
        // Si el valor de 'socialPrompt' es válido, asignarlo a la propiedad correspondiente
        if (in_array($data['socialPrompt'], $this->socials)) {
            $this->socialMediaData[$data['socialPrompt']]['url'] = $data['url'];
            if(empty($this->socialMediaData[$data['socialPrompt']]['status'])){
                $this->socialMediaData[$data['socialPrompt']]['status'] = 'added';
            }else{
                $this->socialMediaData[$data['socialPrompt']]['status'] = 'edited';
            }
            $this->socialMediaData[$data['socialPrompt']]['terms'] = $data['terms'];
            $this->socialMediaData[$data['socialPrompt']]['marketing'] = $data['marketing'];
        }
    }
    public function updateSkills($skill)
    {
        $this->skills = $skill; // Añadir la habilidad al arreglo
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
    public function store(PresentationRepository $presentationRepository)
    {
        try {
            //Inicializar instancia
            $this->presentationRepository=$presentationRepository;
            // Obtener las reglas de validación desde StorePresentationRequest
            $validatedData = $this->validate();

            // Procesar la foto en base64, si existe
            $tempPhoto=$validatedData['photo'];
             
            $validatedData['photo'] = $this->processPhoto($tempPhoto);

            // Usar el repositorio para crear la presentación
            $presentation=$this->presentationRepository->create($validatedData);

            // Preparar los datos de redes sociales
            $socialMediaData = [];
            foreach ($this->socials as $social) {
                $socialMediaData[$social] = $this->socialMediaData[$social]['url'] ?? '';
                $socialMediaData[$social . '_terms'] = json_encode([
                    'terms' => $this->socialMediaData[$social]['terms'] ?? 0,
                    'marketing' => $this->socialMediaData[$social]['marketing'] ?? 0,
                ]);
            }
            // Asociar las redes sociales con la presentación creada
            $this->presentationRepository->createSocialMedia($presentation, $socialMediaData);

            // Redireccionar o mostrar mensaje de éxito
            session()->flash('success', 'Presentación creada exitosamente');
        } catch (ValidationException $exception) {
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
        )->layout('components.layouts.base');
    }
}
