<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notifications extends Component
{


    public function mount(){

        Auth::user()->unreadNotifications->markAsRead();
    }

    public function delete()
    {
        Auth::user()->notifications()->delete();
        
    }
    
    public function render()
    {
        return view('livewire.notifications');
    }
}
