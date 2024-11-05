<?php

namespace App\Livewire\Components\registerComponents;

use Livewire\Component;
use App\Contracts\CastServiceInterface;

class SkillsForm extends Component
{
    public $skills;
    public $skill;

    public $tagCounter;

    protected CastServiceInterface $castService;

    protected $listeners = [
        'skillSubmitted'
    ];

    public function mount(CastServiceInterface $castService)
    {
        $this->castService = $castService;
        $this->tagCounter = 10;
    }
    public function handleEnterTagg(CastServiceInterface $castService,$value)
    {   
        $this->castService = $castService;
        // Verifica si el valor no está vacío y si el tagCounter es mayor a 0
        if (!empty($value) && $this->tagCounter > 0) {
            $this->dispatch(
                'openModal',
                formTitle: $value
            )->to('components.modal.modalform');
        } elseif (empty($value)) {
            // Maneja el caso en que el valor está vacío
            $messageData = $this->castService->transformMessage('error-empty', 'tag');
            $this->dispatch('messageUpdated', $messageData)->to('components.tools.toast');
        } else {
            // Maneja el caso donde tagCounter es 0
            $messageData = $this->castService->transformMessage('error-limitempty', 'tag');
            $this->dispatch('messageUpdated', $messageData)->to('components.tools.toast');
        }
    }
    public function removeSkill(CastServiceInterface $castService, $index)
    {
        if (isset($this->skills[$index])) {
            //Inicializar Instancia
            $this->castService = $castService;
            $messageData = $this->castService->transformMessage('info', 'tag');
            //send notification to toast
            $this->dispatch('messageUpdated', $messageData)->to('components.tools.toast');
            unset($this->skills[$index]);
            $this->tagCounter += 1;
            $this->skills = array_values($this->skills);
            $this->dispatch(
                'skillAdded',
                skills: $this->skills
            )->to('pages.register');
        }
    }
    public function clearSkills(CastServiceInterface $castService,)
    {
        //Inicializar Instancia
        $this->castService = $castService;
        // Elimina todos los registros y actualiza el formulario padre
        $this->skills = [];
        $messageData = $this->castService->transformMessage('warning', 'tag');
        //send notification to toast
        $this->dispatch('messageUpdated', $messageData)->to('components.tools.toast');
        $this->dispatch(
            'skillAdded',
            skills: $this->skills
        )->to('pages.register');
    }
    public function skillSubmitted(CastServiceInterface $castService, $description)
    {
        //Inicializar Instancia
        $this->castService = $castService;
        //Castear
        $newSkill = $this->castService->transformSkill($this->skill, $description);
        //Agregar
        $this->skills[] = $newSkill;
        $this->skill = '';
        $this->tagCounter -= 1;
        $messageData = $this->castService->transformMessage('success', 'tag');

        //send notification to toast
        $this->dispatch('messageUpdated', $messageData)->to('components.tools.toast');
        //update principal-form
        $this->dispatch(
            'skillAdded',
            skills: $this->skills
        )->to('pages.register');
    }
    public function render()
    {
        return view('livewire.components.registerComponents.skills-form');
    }
}
