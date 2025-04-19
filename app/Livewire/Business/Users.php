<?php

namespace App\Livewire\Business;

use App\Models\Business;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{

    use WithPagination;


    public function render()
    {


        return view('livewire.business.users', ['users' =>     Business::find(session("businessId"))->users()->paginate(10)]);
    }
}
