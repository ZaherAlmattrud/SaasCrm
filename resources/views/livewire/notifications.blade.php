<div class="p-6">

<x-button class="mb-3" wire:click="delete">Delete Notifications</x-button>
    @foreach(auth()->user()->notifications as $notification)

    <div class="@if(! $notification->read_at )  bg-blue-100 @endif mb-3 rounded border p-4" >
        <x-dropdown-link class="flex justify-between" href="{{$notification->data['link']}}">
            <span> {{ $notification->data['message'] ?? '' }} </span>
            <span class="text-sx text-gray-400"> {{ $notification->created_at->diffForHumans() }}</span>

        </x-dropdown-link>
    </div>
    @endforeach
</div>