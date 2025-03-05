<div>
    {{-- Success is as dangerous as failure. --}}

<x-dialog-modal wire:model="showForm">
    <x-slot name="title">
        
    </x-slot>

    <x-slot name="content">
    <div x-data="{ step: $wire.entangle('currentStep') }">
        <div class="max-w-xl mx-auto">
            <!-- Step 1: Plans/Pricing -->
            <div x-show="step === 1">
                <h2 class="text-2xl font-semibold mb-4">Step 1: Choose a Plan</h2>
                <!-- Add your step 1 content here -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Select a Plan
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($plans as $plan)
                        <!-- Plan 1 -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="text-xl font-semibold mb-2">{{ $plan->name }}</div>
                            <div class="text-gray-600 mb-4">{{ $plan->price }}/month</div>
                            <label class="flex items-center">
                                <input type="radio" class="form-radio text-blue-500" name="plan" wire:model.live="selectedPlan.id" value="{{ $plan->id }}">
                                <span class="ml-2">Select</span>
                            </label>
                        </div>
                        @endforeach
                    </div>
        
                </div>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        @click="step = 2">
                    Next
                </button>
            </div>

            <!-- Step 2: Business -->
            <div x-show="step === 2" style="display: none;">
                <h2 class="text-2xl font-semibold mb-4">Step 2: Business Information</h2>
                <!-- Add your step 2 content here -->
                <div class="mb-4">
                    <div class="mb-3">
                        <x-label for="business.name" value="{{ __('Business Name') }}" />
                        <x-input id="business.name" class="block mt-1 w-full" type="text" wire:model="business.name"  />
                        @error('business.name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <x-label for="business.industry" value="{{ __('Industry') }}" />
                        <x-select id="business.industry" class="block mt-1 w-full" type="text" wire:model="business.industry">
                            <option value="">Select</option>
                            <option value="Agriculture">Agriculture</option>
                            <option value="Automotive">Automotive</option>
                            <option value="Banking">Banking</option>
                            <option value="Chemicals">Chemicals</option>
                            <option value="Construction">Construction</option>
                            <option value="Education">Education</option>
                            <option value="Energy">Energy</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Fashion and Apparel">Fashion and Apparel</option>
                            <option value="Food and Beverage">Food and Beverage</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="Hospitality">Hospitality</option>
                            <option value="Information Technology (IT)">Information Technology (IT)</option>
                            <option value="Insurance">Insurance</option>
                            <option value="Manufacturing">Manufacturing</option>
                            <option value="Media">Media</option>
                            <option value="Real Estate">Real Estate</option>
                            <option value="Retail">Retail</option>
                            <option value="Telecommunications">Telecommunications</option>
                            <option value="Transportation and Logistics">Transportation and Logistics</option>
                            <option value="Travel and Tourism">Travel and Tourism</option>
                            <option value="Utilities">Utilities</option>
                            <option value="Other">Other</option>
                        </x-select>
                        @error('business.industry')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
                        @click="step = 1">
                    Previous
                </button>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        wire:click="nextStep('3')">  <!-- @click="step = 3" -->
                    Next
                </button>
            </div>

            <!-- Step 3: User Details -->
            <div x-show="step === 3" style="display: none;">
                <h2 class="text-2xl font-semibold mb-4">Step 3: User Details</h2>
              
                <!-- Add your step 3 content here -->
                <div>
                    <div class="mb-3">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" wire:model="user.name" required autofocus autocomplete="name" />
                        @error('user.name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" wire:model="user.email" />
                        @error('user.email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" wire:model="user.password" required autocomplete="new-password" />
                        @error('user.password')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" wire:model="user.password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>
                <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
                        @click="step = 2">
                    Previous
                </button>
                <button wire:click="nextStep('submit')" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Submit
                </button>
            </div>
        </div>
    </div>
    </x-slot>

    <x-slot name="footer">
    </x-slot>
</x-dialog-modal>

</div>
