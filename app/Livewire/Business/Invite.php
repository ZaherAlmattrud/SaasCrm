<?php

namespace App\Livewire\Business;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteUser;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Invitation;
use Auth;

class Invite extends Component
{
    use LivewireAlert;
    public $inviteModal = false;
    public $email;

    public function invite()
    {
        $this->inviteModal = true;
    }

    public function sendInvite()
    {
        $validated = $this->validate([
            'email'=>'email',
        ]);

     
        Mail::to($this->email)->send(new InviteUser());
        $this->inviteModal = false;
        $this->alert('success', 'Invite mail send successfully!');
       
      

    }

    public function resend($email)
    {
        $this->email = $email;
        $this->sendInvite();
    }

    public function render()
    {
       
        return view('livewire.business.invite' );
    }
}
