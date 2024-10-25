<?php

namespace App\Livewire\Components;

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
    public function inputPhoneCharger(string $numberInput)
    {
        $this->phoneNumber = $numberInput;
        $this->dispatch('bindingPhoneNumber', $numberInput);
    }
    public function render()
    {
        return view('livewire.components.phone-selector');
    }
}
