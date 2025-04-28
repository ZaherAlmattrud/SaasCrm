<?php

namespace App\Livewire\Business;

use App\Models\Business;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;
use App\Notifications\CommonNotification;
use Illuminate\Support\Facades\Auth;

class Users extends Component
{

    use WithPagination;


    public $roles;
    public $editUserForm = false;
    public $user;
    public $selectedRoles = [];
 


    public function mount()
    {

        $this->roles = Role::all();
    }


    public function edit(User $user)
    {

        $this->editUserForm = true;
        Log::info("edit user form ");
        $this->user = $user;
        $rolesIds = $user->roles->flatten()->pluck('id');
        $this->selectedRoles = $rolesIds->toArray();
    }


    public function save()
    {

        Log::info($this->selectedRoles);
        $this->user->roles()->sync($this->selectedRoles);
        $this->editUserForm = false;
        $message = "User : ".  $this->user->name ." roles updated successfully";
        $link = route("business.users");
        Auth::user()->notify(new CommonNotification($message, $link));
    }

    public function render()
    {

        return view(
            'livewire.business.users',
            [
                'users' =>     Business::find(session("businessId"))->users()->paginate(10),

                'roles' => $this->roles

            ]
        );
    }
}
