<?php

namespace App\Livewire\Notifications;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Unread extends Component
{
    public function render()
    {
        return view('livewire.notifications.unread');
    }

 



    public function read($notificationId)
    {

        $notification = Auth::user()->notifications()->find($notificationId);
        $notification->markAsRead();
        $this->redirect($notification->data['link']);

    }
}
