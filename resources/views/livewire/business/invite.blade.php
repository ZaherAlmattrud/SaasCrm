<div class="p-6">
    <x-button wire:click="invite">Invite Users</x-button>

    <div class="">

        <table class="w-full bg-white mt-6">

            <tr class="bg-gray-50">
                <td class="p-2"> Email </td>
                <td class="p-2"> Sent At </td>
                <td class="p-2"> Actions </td>
            </tr>



            @foreach( $invitations as $invite)
            <tr>

                <td> {{$invite->email}} </td>
                <td> {{$invite->created_at->format('d-M-Y')}}</td>
                <td>

                    <x-secondary-button wire:click="resend('{{$invite->email}}')">
                        Resend
                    </x-secondary-button>

                </td>

            </tr>
            @endforeach
        </table>

    </div>
    <x-dialog-modal wire:model="inviteModal">
        <x-slot name="title">
            Invite Users
        </x-slot>

        <x-slot name="content">
            <div class="mb-3">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" wire:model="email" />
                @error('email')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('inviteModal')" wire:loading.attd="disabled">
                Cancel
            </x-secondary-button>

            <x-button class="ml-2" wire:click="sendInvite" wire:loading.attd="disabled">
                Send Invite
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>