<?php

namespace App\Livewire\Components;

use Livewire\Component;

class PhoneSelector extends Component
{   
    public $customPhoneId;

    public $selectedPhone = null;

    protected $listeners=['selectorPhoneCharger'];
    public function mount($customPhoneId = "phoneComponent")
    {
        $this->customPhoneId = $customPhoneId;
    }
    public function selectorPhoneCharger(string $optionSelected)
    {
        $this->selectedPhone = $optionSelected;
        $this->dispatch('bindingPhoneRoot', $optionSelected);
    }
    public function render()
    {
        return view('livewire.components.phone-selector');
    }
}
