<?php

namespace App\Livewire\Components\Tools;

use Livewire\Component;

class Toast extends Component
{
    public $message;
    public $alertClass;
    public $iconClass;

    protected $listeners = ['messageUpdated' => 'updateMessage'];

    //event listener
    public function updateMessage($messageData)
    {
        $this->message = $messageData;
        if (!empty($this->message['type'])) {
            switch ($this->message['type']) {
                case 'success':
                    $this->alertClass = 'alert-success';
                    $this->iconClass = 'fa-comment-check';
                    break;
                case 'warning':
                    $this->alertClass = 'alert-warning';
                    $this->iconClass = 'fa-comment-exclamation';
                    break;
                case 'warning':
                    $this->alertClass = 'alert-info';
                    $this->iconClass = 'fa-comment-exclamation';
                    break;
                case 'error-empty':
                    $this->alertClass = 'alert-danger';
                    $this->iconClass = 'fa-comment-exclamation';
                    break;
                case 'error-limit':
                    $this->alertClass = 'alert-danger';
                    $this->iconClass = 'fa-comment-xmark';
                    break;
                default:
                    $this->alertClass = 'alert-danger';
                    $this->iconClass = 'fa-comment-xmark';
            }
        }
    }

    public function render()
    {
        return view('livewire.components.tools.toast');
    }
}
