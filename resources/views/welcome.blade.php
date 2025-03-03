<x-guest-layout>
<div>
  <div class="container mx-auto px-4 py-16">
    <div class="md:flex md:items-center md:justify-between">
      <div class="md:w-1/2 mb-8 md:mb-0">
        <h1 class="text-4xl font-bold text-gray-900 leading-tight mb-4">Welcome to CRM Solutions</h1>
        <p class="text-lg text-gray-700 mb-6">Manage your customer relationships efficiently with our powerful CRM platform.</p>
        <div class="flex">
          <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded mr-4">Get Started</a>
          <a href="#" class="bg-transparent border border-gray-900 text-gray-900 font-semibold py-2 px-6 rounded hover:bg-gray-900 hover:text-white">Learn More</a>
        </div>
      </div>
      <div class="md:w-1/2">
        <img src="/images/undraw_visual_data_re_mxxo.svg" alt="CRM Illustration" class="w-full h-auto md:max-w-lg mx-auto">
      </div>
    </div>
  </div>
</div>
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Choose a Plan</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Flexible Pricing
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                Pick a plan that fits your needs.
            </p>
        </div>

        <div class="mt-10">
            <div class="flex flex-wrap -m-4">
                @foreach($plans as $plan)
                <div class="p-4 lg:w-1/3 md:w-1/2">
                    <div class="bg-white border border-gray-200 p-6 rounded-lg transition duration-300 ease-in-out transform hover:shadow-lg hover:-translate-y-1">
                        <h3 class="text-center text-xl font-semibold text-gray-900">{{$plan->name}}</h3>
                        <p class="text-center mt-2">{{$plan->description}}</p>
                        <div class="mt-6 flex justify-center">
                            <div class="flex items-center">
                                <span class="text-2xl font-semibold">{{$plan->price}}</span>
                                <span class="text-gray-500 ml-1">{{$plan->currency}}</span>
                            </div>
                        </div>
                        @if($plan->trial_period_days)
                        <p class="text-center text-gray-500 mt-2">14-day free trial</p>
                        @endif
                        <div class="mt-8">
                            <a wire:click="selectPlan('{{$plan->id}}')" class="block w-full bg-indigo-500 text-white text-center py-2 px-4 rounded-md transition duration-300 ease-in-out transform hover:bg-indigo-600">Choose Plan</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div>

@livewire('plans.pricing')
</div>

 

</x-guest-layout>