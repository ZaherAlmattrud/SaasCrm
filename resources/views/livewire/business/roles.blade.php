<div class="p-6">
   

    <x-button class="" wire:click="create">Create</x-button>
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
    <div class="mt-5">
        {{ $business_roles->links() }}
    </div>
    <x-dialog-modal wire:model="editRoleForm">
        <x-slot name="title">
            Mange Role
        </x-slot>

        <x-slot name="content">

            <div>
                <x-label for="role" value="{{__('Role Name')}}"/>
                <x-input class="w-full" type="text" wire:model="name" placeholder="Role Name"></x-input>
                @error('name')
                <span class="text-red-500">{{$message}}</span>
                @enderror

            </div>
            
            <x-label class="mt-5" for="permission" value="{{__('Permission Name')}}"/>
            @foreach($permissions as $permission)
            <div class="block mt-4">
                <label for="permission{{ $permission->id }}" class="flex items-center">
                    <x-checkbox wire:model="selectedpermissions" id="permission{{ $permission->id }}" value="{{ $permission->id }}" />
                    <span class="ms-2 text-sm text-gray-600">{{ $permission->name }}</span>
                </label>
            </div>
            @endforeach
        </x-slot>


        <x-slot name="footer">

            <x-secondary-button wire:click="$toggle('editRoleForm')" wire:loading.attd="disabled">
                Cancel
            </x-secondary-button>

            <x-button class="ml-2" wire:click="save" wire:loading.attd="disabled">
                Save
            </x-button>

        </x-slot>
    </x-dialog-modal>
</div>