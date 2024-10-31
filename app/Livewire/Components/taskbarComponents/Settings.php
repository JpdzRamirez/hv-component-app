<?php

namespace App\Livewire\components\taskbarComponents;

use Livewire\Component;

class Settings extends Component
{
    // Opciones de color para cada variable CSS
    public $colorOptions = [
        'theme-bg-color' => ['#ffce45', '#333333', '#f9fafb', '#14162b', '#515151'],
        'theme-color' => ['#333333', '#ffffff', '#ffa534', '#f3545d', '#3c3a3a'],
        'border-color' => ['rgba(113, 119, 144, 0.25)', 'rgba(255, 255, 255, 0.35)', '#f3545d', '#3c3a3a', '#ffa534'],
        // Agrega más variables y sus opciones de color
    ];

    public function updateColor($variable, $color)
    {
        $this->dispatchBrowserEvent('color-updated', [
            'variable' => $variable,
            'color' => $color
        ]);
    }

    public function render()
    {
        return view('livewire.components.taskbarComponents.settings', [
            'colorOptions' => $this->colorOptions
        ]);
    }
}
