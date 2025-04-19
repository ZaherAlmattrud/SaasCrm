<?php

namespace App\Livewire\Business;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteUser;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Invitation;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Log;


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

        $invitation = Invitation::create([

            "email"=>  $validated['email'],
            "business_id"=>session("businessId"),
            "user_id"=>Auth::user()->id
            
        ]);

     
        Mail::to($this->email)->send(new InviteUser());
        $this->inviteModal = false;
        $this->alert('success', 'Invite mail send successfully!');
     
       
      

    }

    public function resend($email)
    {

        Log::info( "test : ".$email );
        $this->email = $email;
        $this->sendInvite();
    }

    public function render()
    {

        $invitations = Invitation::paginate(10);
        return view('livewire.business.invite' ,compact('invitations'));
    }
}
