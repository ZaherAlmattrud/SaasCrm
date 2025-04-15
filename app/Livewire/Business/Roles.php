<?php

namespace App\Livewire\Business;

use Livewire\Component;

use App\Models\Role;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Roles extends Component
{

    use WithPagination;
    use LivewireAlert;

   
    public $name;
    public $editing = false;
 

    /**
     * Renders the roles component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.business.roles',
         [
            'business_roles' => Role::paginate(10),
        ]);
    }


    /**
     * Creates a new role in the database.
     *
     * @return void
     */

    public function save()
    {


        $this->validate([
            'name'=>'required'
        ]);

        if( $this->editing ){
            
            $this->editing->update([    'name' => $this->name  ]);
            $this->alert('success', 'Updated successfully!');

        }else{

            Role::create([
                'name' => $this->name,
                'business_id'=>session('businessId'),
            ]);

            $this->alert('success', 'Created successfully!');
    

        }

     
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

        $role = Role::findOrFail($id);
        $this->name = $role->name;
        $this->editing = $role ;
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
    public function delete($id) {  

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
        $this->editing = false ;
       
    }
}
