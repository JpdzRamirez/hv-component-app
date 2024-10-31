<?php

namespace App\Livewire\components\tools;

use Livewire\Component;

class PhoneSelector extends Component
{   
    public $customPhoneId;

    public $selectedPhoneIndicator;
    public $phoneNumber;

    protected $listeners=['selectorPhoneRootCharger','inputPhoneCharger'];

    public function mount($customPhoneId = "phoneComponent")
    {
        $this->customPhoneId = $customPhoneId;
    }

    public function selectorPhoneRootCharger(string $optionSelected)
    {
        $this->selectedPhoneIndicator = $optionSelected;
        $this->dispatch('bindingPhoneRoot', $optionSelected);
    }
    public function inputPhoneCharger()
    {
        $this->dispatch('bindingPhoneNumber', $this->phoneNumber);
    }
    public function render()
    {
        return view('livewire.components.tools.phone-selector');
    }
}
