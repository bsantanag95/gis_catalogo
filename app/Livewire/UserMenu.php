<?php

namespace App\Livewire;

use Livewire\Component;

class UserMenu extends Component
{
    public $isLoggedIn = false;

    public function toggleLogin()
    {
        $this->isLoggedIn = !$this->isLoggedIn;
    }

    public function render()
    {
        return view('livewire.user-menu');
    }
}
