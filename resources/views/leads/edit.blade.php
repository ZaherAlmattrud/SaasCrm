<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Lead') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

            
                <form action="{{ route('leads.update', ['lead'=>$lead->id]) }}" method='post'>
              
                    @csrf
                    @method('PUT')
                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$lead->name}}" required autofocus autocomplete="name" />
                        @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$lead->email}}" required />
                        @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="phone" value="{{ __('Phone') }}" />
                        <x-input id="phone" class="block mt-1 w-full" type="text" name="phone"  value="{{$lead->phone}}" />
                        @error('phone')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="message" value="{{ __('Message') }}" />
                        <x-input id="message" class="block mt-1 w-full" type="text" name="message"  value="{{$lead->message}}" />
                        @error('message')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="status" value="{{ __('Status') }}" />
                        <x-select id="status" class="block mt-1 w-full" type="text" name="status">
                            <option value="">Select</option>
                            <option value="new" @if($lead->status=='new') selected='selected' @endif>New</option>
                            <option value="contacted" @if($lead->status=='contacted') selected='selected' @endif>Contacted</option>
                            <option value="converted" @if($lead->status=='converted') selected='selected' @endif>Converted</option>
                        </x-select>
                        @error('status')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <x-button class="mt-5">Submit</x-button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>