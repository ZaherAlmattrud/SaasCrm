<div>
    <div class="w-full bg-gray-200 p-5"> @livewire('business.select',['showButton'=>true]) </div>
    <div class="flex flex-col p-2 gap-2">

        <a href="{{ route('dashboard') }}" class="p-4 flex gap-2 bg-slate-100 hover:bg-slate-200 rounded"> <x-iconic-dashboard  class="w-6 h-6" /> <span>Dashboard </span></a>
        <a href="{{ route('leads.index') }}" class="p-4 flex gap-2 bg-slate-100 hover:bg-slate-200 rounded"><x-iconic-file class="w-6 h-6" /> <span>Leads </span></a>

        <!-- <div class="w-full" x-data="{open:$persist(false).as('open-users')}">
            <a x-on:click="open=!open" class="flex justify-between p-4 bg-slate-100 hover:bg-slate-200 rounded w-full ">

                <span> Users </span>
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                </svg>
            </a>
            <div x-show="open" class="flex flex-col">
                <a href="" class="p-4 bg-slate-100 hover:bg-slate-200 rounded">link</a>
                <a href="" class="p-4 bg-slate-100 hover:bg-slate-200 rounded">link</a>
                <a href="" class="p-4 bg-slate-100 hover:bg-slate-200 rounded">link</a>
            </div>
        </div> -->

        <div class="w-full" x-data="{open:$persist(false).as('open-settings')}">
            <a x-on:click="open=!open" class="flex justify-between p-4 bg-slate-100 hover:bg-slate-200 rounded w-full ">

                <span> Settings </span>
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                </svg>
            </a>
            <div x-show="open" class="flex flex-col">
                @can('view roles')
                <a href="{{route('business.roles')}}" class="p-4 flex gap-2 hover:bg-slate-200 rounded @if(request()->routeIs('business.roles')) bg-slate-300 @else bg-slate-100 @endif"> <x-iconic-user-check class="w-6 h-6" /> Roles</a>
                @endcan
                @can('view users')
                <a href="{{route('business.users')}}" class="p-4 flex gap-2  hover:bg-slate-200 rounded  @if(request()->routeIs('business.users')) bg-slate-300 @else bg-slate-100 @endif"> <x-iconic-users class="w-6 h-6" />Users</a>
                @endcan
                @can('invite users')
               
                <a href="{{route('business.invites')}}" class="p-4 flex gap-2  hover:bg-slate-200 rounded  @if(request()->routeIs('business.invites')) bg-slate-300 @else bg-slate-100 @endif"> <x-iconic-users-plus class="w-6 h-6" /> <span>Invite Users</span></a>
                @endcan
                @can('mange subscription')
                <a href="{{route('business.subscription')}}" class="p-4 flex gap-2  hover:bg-slate-200 rounded  @if(request()->routeIs('business.subscription')) bg-slate-300 @else bg-slate-100 @endif"> <x-iconic-dollar class="w-6 h-6" /> <span>Subscription </span></a> </a>
                @endcan
            </div>
        </div>

    </div>
</div>