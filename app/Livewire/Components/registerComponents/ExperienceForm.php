<?php

namespace App\Livewire\Components\registerComponents;

use Livewire\Component;
use App\Http\Requests\StoreExperienceRequest;

use Illuminate\Validation\ValidationException;

use App\Contracts\CastServiceInterface;

use Livewire\WithFileUploads;

class ExperienceForm extends Component
{
    use WithFileUploads;

    //Arreglo de experiencias
    public $experiences = [];

    //Propiedades para validar
    public $company_logo;
    public $company;
    public $position;
    public $main_role;
    public $goals;
    public $status_working;
    public $start_date;
    public $end_date;
    public $rank_company;
    public $rank_enviroment;
    public $recommend;

    protected CastServiceInterface $castService;

    protected $listeners = [
        'experienceSubmitted',
        'upload' => 'handleImageUpload'
    ];

    //*********************** */
    // Rules
    protected function rules()
    {
        return (new StoreExperienceRequest)->rules();
    }
    // ****************************************************
    public function mount($experiences = null, CastServiceInterface $castService)
    {
        $this->castService = $castService;
        $this->experiences = $experiences;
    }
    public function handleImageUpload($file)
    {
        $base64Image = 'data:image/jpeg;base64,' . $file;
        $this->company_logo = $base64Image;
    }

    public function experienceSubmitted(CastServiceInterface $castService, array $data)
    {
        try {
            //Inicializar variable
            $this->castService = $castService;
            // Asignar solo si todas las propiedades existen
            $this->fill($data);

            // Validar los datos
            $validatedData = $this->validate();
            //Añadimos la imagen al arreglo, si no hay se sube por defecto null 
            $validatedData['company_logo'] = $this->company_logo;

            //Añadimos a campos validados
            $this->experiences[] = $validatedData;

            $messageData = $this->castService->transformMessage('success', 'exp');

            //send notification to toast
            $this->dispatch('messageUpdated', $messageData)->to('components.tools.toast');
            //update principal-form
            $this->dispatch(
                'experienceAdded',
                experiences: $this->experiences
            )->to('pages.register');

            //Response to close modals and clean
            $this->dispatch(
                'formSubmittSuccess',
                response: true,
                modal: 'modalExperience',
                button: '#submitModalExperience'
            );
            // reset variables
            $this->reset([
                'company_logo',
                'company',
                'position',
                'main_role',
                'goals',
                'status_working',
                'start_date',
                'end_date',
                'rank_company',
                'rank_enviroment',
                'recommend'
            ]);
        } catch (ValidationException $exception) {
            // Emitimos un solo evento con todos los errores relevantes
            $this->dispatch('receiveErrors', [
                'errors' => array_filter([
                    'company_logo' => $exception->validator->errors()->get('company_logo'),
                    'company' => $exception->validator->errors()->get('company'),
                    'position' => $exception->validator->errors()->get('position'),
                    'main_role' => $exception->validator->errors()->get('main_role'),
                    'goals' => $exception->validator->errors()->get('goals'),
                    'status_working' => $exception->validator->errors()->get('status_working'),
                    'start_date' => $exception->validator->errors()->get('start_date'),
                    'end_date' => $exception->validator->errors()->get('end_date'),
                    'rank_company' => $exception->validator->errors()->get('rank_company'),
                    'rank_enviroment' => $exception->validator->errors()->get('rank_enviroment'),
                    'recommend' => $exception->validator->errors()->get('recommend'),
                ]),
                // Añadimos destino de origen
                'modal' => '#modalExperience',
                'button' => '#submitModalExperience'
            ]);

            throw $exception;
        }
    }
    public function render()
    {
        return view('livewire.components.registerComponents.experience-form');
    }
}
