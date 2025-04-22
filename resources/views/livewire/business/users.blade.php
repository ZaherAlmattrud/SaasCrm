<div>






    <div class="p-4">
        <div class="overflow-x-auto rounded-2xl shadow">
            <table class="min-w-full text-left text-sm font-light">
                <thead class="bg-gray-800 text-white uppercase text-xs">
                    <tr>
                        <th scope="col" class="px-6 py-4">#</th>
                        <th scope="col" class="px-6 py-4">Name</th>
                        <th scope="col" class="px-6 py-4">Email</th>
                        <th scope="col" class="px-6 py-4">Role</th>
                        <th scope="col" class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">

                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{$user->id}}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{$user->name}}</td>
                        <td class="px-6 py-4">{{$user->email}}</td>
                        <td class="px-6 py-4">

                            @foreach($user->roles as $role)
                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-800">
                                {{ $role->name}}
                            </span>
                            @endforeach
                        </td>

                        @can('edit user')
                        <td class="px-6 py-4">
                            <button wire:click="edit('{{$user->id}}')" class="text-blue-500 hover:underline text-xs">Edit</button> |
                            <button class="text-red-500 hover:underline text-xs">Delete</button>
                        </td>
                        @endcan
                    </tr>

                </tbody>
                @endforeach
            </table>
        </div>
    </div>

    <x-dialog-modal wire:model="editUserForm">
        <x-slot name="title">
            Edit User
        </x-slot>

        <x-slot name="content">
            @foreach($roles as $role)
            <div class="block mt-4">
                <label for="role{{ $role->id }}" class="flex items-center">
                    <x-checkbox wire:model="selectedRoles" id="role{{ $role->id }}" value="{{ $role->id }}" />
                    <span class="ms-2 text-sm text-gray-600">{{ $role->name }}</span>
                </label>
            </div>
            @endforeach
        </x-slot>


        <x-slot name="footer">

            <x-secondary-button wire:click="$toggle('editUserForm')" wire:loading.attd="disabled">
                Cancel
            </x-secondary-button>

            <x-button class="ml-2" wire:click="save" wire:loading.attd="disabled">
                Save
            </x-button>

        </x-slot>
    </x-dialog-modal>

</div>