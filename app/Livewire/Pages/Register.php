<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Http\Requests\StorePresentationRequest;

use App\Contracts\PresentationRepositoryInterface;
use App\Contracts\SkillRepositoryInterface;
use App\Contracts\ExperienceRepositoryInterface;
use App\Contracts\SocialMediaRepositoryInterface;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

use App\Contracts\CastServiceInterface;

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

    // Section
    public $section;

    // Variables Social Media
    public $socials = ['linkedin', 'facebook', 'github', 'office365', 'youtube', 'twitter', 'instagram'];
    public $socialMediaData = [];

    public $skills=[];
    public $experiences=[];
    public $studies=[];

    public $messageVisibility=false;

    protected $listeners = [
        'bindingLocation' => 'updateLocation',
        'bindingPhoneRoot' => 'updatePhoneRoot',
        'bindingPhoneNumber' => 'updatePhone',
        'skillAdded'=>'updateSkills',
        'experienceAdded'=>'updateExperiences',
        'sectionChanged' =>'updateSection',
        'updateSocialPrompt',
        'socialMediaSubmitted',
    ];

    protected PresentationRepositoryInterface $presentationBuilder;
    protected ExperienceRepositoryInterface $experienceBuilder;
    protected SkillRepositoryInterface $skillBuilder;
    protected SocialMediaRepositoryInterface $socialmediaBuilder;

    protected CastServiceInterface $castService;
    /**************************************
    --------------Functions------------------
    ******************************************/
    public function resetAll(){
        $this->reset([
            'fullname',
            'description',
            'photo',
            'firstname',
            'lastname',
            'card',
            'email',
            'email_confirm',
            'phone',
            'phone_root',
            'country',
            'state',
            'city',
            'address',
            'address_complement',
            'socialMediaData',
            'skills',
            'experiences',
            'studies',
        ]);
    }
    public function closeErrors()
    {
        if ($this->getErrorBag()->isNotEmpty()) {
            $this->messageVisibility=false;
        }
    }

    // Loaders
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
    private function loadExperiences($experiences)
    {
        $this->experiences=$experiences->toArray();
    }
    private function loadStudies($studies)
    {
        $this->studies=$studies->toArray();
    }
    //*********************** */
    // Rules
    protected function rules()
    {
        return (new StorePresentationRequest)->rules();
    }
    // ****************************************************
    //  COMPONENT LIFE, INICIALIZADOR, hydrate y dhydrate
    //**************************************************** */
    public function mount(
        PresentationRepositoryInterface $presentationBuilder,
        ExperienceRepositoryInterface $experienceBuilder,
        SkillRepositoryInterface $skillBuilder,
        SocialMediaRepositoryInterface $socialmediaBuilder,
        CastServiceInterface $castService,
        $description = null,
        $presentationID = null)
    {
        //Inicializar seccion
        $this->section=1;
        //Inicializar repositorio
        $this->presentationBuilder = $presentationBuilder;
        $this->experienceBuilder = $experienceBuilder;
        $this->skillBuilder = $skillBuilder;
        $this->socialmediaBuilder = $socialmediaBuilder;
        $this->castService = $castService;

        if ($presentationID) {
            try {
                $presentation = $this->presentationBuilder->find($presentationID);

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
                    if ($presentation->experiences) {
                        $this->loadExperiences($presentation->experiences);
                    }
                    if ($presentation->studies) {
                        $this->loadStudies($presentation->studies);
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
    /*
    *******************************************
    -----------Event live listener-------------
    *******************************************
    */
    public function updated($propertyName)
    {
        if (in_array($propertyName, ['firstname', 'lastname'])) {
            $this->fullname = trim("{$this->firstname} {$this->lastname}");
        }
    }
    public function updatedPhoto(CastServiceInterface $castService){
        //Inicializar Instancia
        $this->castService = $castService;
        $tempPhoto=$this->photo;
        $this->photo =$this->castService->processPhoto($tempPhoto);
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
    public function updateSkills($skills)
    {
        // Añadir la habilidad al arreglo
        $this->skills = $skills; 
    }
    public function updateExperiences($experiences)
    {
        // Añadir la experiencia al arreglo
        $this->experiences = $experiences; 
    }
    public function updateSection($section){
        $this->section=$section;
    }
    //************************ */
    /*
    **************************************************
    ---------------Events binding---------------------
    **************************************************
    */
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
    /* 
    ***************************************************
    --------------Form method---------------------------
    *****************************************************
    */
    public function store(
        PresentationRepositoryInterface $presentationBuilder,
        ExperienceRepositoryInterface $experienceBuilder,
        SkillRepositoryInterface $skillBuilder,
        SocialMediaRepositoryInterface $socialmediaBuilder,
        CastServiceInterface $castService
        )
    {
        try {
            //Inicializar instancia
            $this->presentationBuilder = $presentationBuilder;
            $this->socialmediaBuilder = $socialmediaBuilder;
            $this->experienceBuilder = $experienceBuilder;
            $this->skillBuilder = $skillBuilder;
            $this->castService = $castService;
            // Obtener las reglas de validación desde StorePresentationRequest
            $validatedData = $this->validate();

            
            // Procesar la foto en base64, si existe
            $tempPhoto=$validatedData['photo'];
             
            $validatedData['photo'] = $this->castService->processPhoto($tempPhoto);

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
            $this->socialmediaBuilder->createSocialMedia($presentation, $socialMediaData);

            // Asociar las experiencias con la presentación creada
            $this->experienceBuilder->createExperiences($presentation, $this->experiences);

            // Asociar las skills con la presentación creada
            $this->skillBuilder->createSkills($presentation, $this->skills);

            $this->dispatch('formSubmittSuccess', 
                response:true,
                modal: '',
                button: '#registerSubmit'
            );
            // Redireccionar o mostrar mensaje de éxito
            session()->flash('success', __('exceptions.success-message',['name'=>$this->fullname]));


            $this->messageVisibility=true;

            $this->resetAll();

        } catch (ValidationException $exception) {
            $this->messageVisibility=true;

            // Emitimos un solo evento con todos los errores relevantes
            $this->dispatch('receiveErrors', [
                'errors' => array_filter([
                    'country' => $exception->validator->errors()->get('country'),
                    'state' => $exception->validator->errors()->get('state'),
                    'city' => $exception->validator->errors()->get('city'),
                    'phone' => $exception->validator->errors()->get('phone'),
                ]),
                // Añadimos destino de origen
                'modal' => '',
                'button'=> '#registerSubmit'
            ]

        );

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
