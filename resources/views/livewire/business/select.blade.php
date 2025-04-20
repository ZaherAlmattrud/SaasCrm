<div class="p-6">

    @if( $showButton && auth()->user()->businesses->count()>1 )
    <a wire:click="change" class="cursor-pointer"> {{session('businessName')}} </a>
    
    @endif


    <x-dialog-modal wire:model="showSelection">
        <x-slot name="title">
            Select Business
        </x-slot>

        <x-slot name="content">
            @foreach( auth()->user()->businesses as $business)

            <div class="border rounded p-4 mb-3 flex gap-5">
                <input type="radio" wire:model.live="businessId" name="businessId" id="businessId{{$business->id}}" value="{{$business->id}}" class="radio">
                <x-label for="businessId" value="{{ $business->name }}" />
            </div>

            @endforeach

        </x-slot>

        <x-slot name="footer">

        

        </x-slot>
    </x-dialog-modal>
</div>