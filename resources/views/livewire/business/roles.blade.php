<div class="p-6">
    <div class="flex">
        <x-input type="text" wire:model="name" placeholder="Role Name"></x-input>
        <x-button wire:click="create" >Create</x-button>
    </div>

   
    <table class="bg-white rounded mt-10 w-full">
        <tr class="bg-state-50 border">

            <td class="p-2">Name</td>
            <td class="p-2">Action</td>

        </tr>

        @foreach ($business_roles as $business_role)
        <tr>

            <td class="p-2"> {{ $business_role->name }} </td>
            <td>
                <button class="text-blue-500 cursor-pointer" wire:click="edit({{$business_role->id}})">Edit</button>
                <button class="text-red-500 cursor-pointer" wire:click="delete({{$business_role->id}})">Delete</button>
            </td>

        </tr>
        @endforeach

    </table>

 

</div>