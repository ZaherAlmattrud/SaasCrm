<?php

namespace App\Livewire\Business;

use App\Models\Business;
use Livewire\Component;

use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Roles extends Component
{

    use WithPagination;
    use LivewireAlert;


    public $name;
    public $editing = false;
    public $editRoleForm = false;
    public $permissions = [];
    public $selectedPermissions = [];



    public function mount()
    {
        if ( ! Gate::allows('view roles') ){

            abort(403);

        }
        $this->permissions = Business::find(session("businessId"))->plan->permissions;
    }

    /**
     * Renders the roles component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view(
            'livewire.business.roles',
            [
                'business_roles' => Role::paginate(10),
            ]
        );
    }


    /**
     * Creates a new role in the database.
     *
     * @return void
     */


     public function create(){

        $this->reset(['name','selectedPermissions']);
        $this->editRoleForm = true;


     }

    public function save()
    {


        $this->validate([
            'name' => 'required'
        ]);

        if ($this->editing) {

            $this->editing->update(['name' => $this->name]);
            $this->alert('success', 'Updated successfully!');
        } else {

            $this->editing = Role::create([
                'name' => $this->name,
                'business_id' => session('businessId'),
            ]);

            $this->alert('success', 'Created successfully!');
        }



        $this->editing->permissions()->sync($this->selectedPermissions);
        $this->editRoleForm = false;

        $this->resetInputFields();
    }
    /**
     * Edit the specified role.
     *
     * This method retrieves a role by its ID and sets the name property
     * to the role's name for editing purposes.
     *
     * @param int $id The ID of the role to be edited.
     */


    public function edit($id)
    {

        $this->editRoleForm = true;
        $role = Role::findOrFail($id);

        $permissionsIds = $role->permissions->flatten()->pluck('id');
        $this->selectedPermissions = $permissionsIds->toArray();

        $this->name = $role->name;
        $this->editing = $role;
    }

    /**
     * Updates the name of a role.
     *
     * This method retrieves a role by its ID and updates its name 
     * with the current input. After updating, it resets the input fields.
     *
     * @param int $id The ID of the role to update.
     */

    public function update($id)
    {

        $role = Role::findOrFail($id);
        $role->update([
            'name' => $this->name
        ]);
        $this->resetInputFields();
    }

    /**
     * Deletes a role by ID.
     *
     * This method will look for a role with the given ID and delete it.
     *
     * @param int $id The ID of the role to delete.
     */
    public function delete($id)
    {

        Role::findOrFail($id)->delete();
        $this->alert('success', 'Deleted successfully!');
    }

    /**
     * Resets the input fields for the role form.
     *
     * This method clears the current role name input and refreshes the list of all roles.
     */

    public function resetInputFields()
    {

        $this->name = '';
        $this->editing = false;
    }
}
