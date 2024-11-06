<?php

namespace App\Livewire\Components\registerComponents;

use Livewire\Component;
use App\Http\Requests\StoreExperienceRequest;

use Illuminate\Validation\ValidationException;

class ExperienceForm extends Component
{
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

    protected $listeners = ['experienceSubmitted'];

    //*********************** */
    // Rules
    protected function rules()
    {
        return (new StoreExperienceRequest)->rules();
    }
    // ****************************************************
    public function mount($experiences = null)
    {
        $this->experiences = $experiences;
    }

    public function experienceSubmitted($data)
    {
        try {
            // Asignar solo si todas las propiedades existen
            $this->fill($data);

            // Validar los datos
            $validatedData = $this->validate();

            //Si están validados
            $this->experiences[] = $validatedData;

            $this->dispatch('experienceAdded', response:true);

        } catch (ValidationException $exception) {
            // Emitimos un solo evento con todos los errores relevantes
            $this->dispatch('receiveErrorsExperience', array_filter([
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
            ]));

            throw $exception;
        }
    }
    public function render()
    {
        return view('livewire.components.registerComponents.experience-form');
    }
}
