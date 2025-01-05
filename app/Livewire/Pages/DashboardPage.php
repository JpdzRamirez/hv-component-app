<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class DashboardPage extends Component
{
    public $section;
    protected $listeners = [
        'sectionChanged' => 'updateSection',
    ];

    public function mount()
    {
        $this->section = 1;
    }
    public function updateSection($section)
    {
        $this->section = $section;
    }
    public function render()
    {
        return view('livewire.pages.dashboard-page');
    }
}
