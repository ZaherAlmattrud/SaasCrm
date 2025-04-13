<?php

namespace App\Livewire\Business;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Roles extends Component
{

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.business.roles');
    }
}
