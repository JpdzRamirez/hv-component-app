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

    protected $listeners = ['skilldescription' => 'skillSubmitted'];

    public function mount(CastServiceInterface $castService)
    {
        $this->castService = $castService;
        $this->tagCounter = 10;
    }
    public function handleEnterTagg($value)
    {
        // Verifica si el valor no está vacío y si el tagCounter es mayor a 0
        if (!empty($value) && $this->tagCounter > 0) {
            $this->dispatch(
                'openModal',
                formTitle: $value
            )->to('components.modal.modalform');
        } elseif (empty($value)) {
            // Maneja el caso en que el valor está vacío
            session()->flash('error', 'El valor no puede estar vacío.');
        } else {
            // Maneja el caso donde tagCounter es 0
            session()->flash('error', 'No puedes agregar más tags.');
        }
    }
    public function removeSkill($index)
    {
        if (isset($this->skills[$index])) {
            session()->flash('error', 'Tag No: ' . $index . ' - ' . $this->skills[$index]['name'] . ' eliminado.');
            unset($this->skills[$index]);
            $this->tagCounter += 1;
            $this->skills = array_values($this->skills);
            $this->dispatch(
                'skillAdded',
                skill: $this->skills
            )->to('pages.register');
        }
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
        session()->flash('success', 'Tag añadido.');
        $this->dispatch(
            'skillAdded',
            skill: $this->skills
        )->to('pages.register');
    }
    public function render()
    {
        return view('livewire.components.registerComponents.skills-form');
    }
}
