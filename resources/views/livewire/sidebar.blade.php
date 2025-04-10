<div>
    <div class="w-full bg-gray-200 p-2"> CRM </div>
    <div class="flex flex-col p-2 gap-2">

        <div class="w-full" x-data="{open:false}">
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
        </div>
        <a href="" class="p-4 bg-slate-100 hover:bg-slate-200 rounded">link</a>
        <a href="" class="p-4 bg-slate-100 hover:bg-slate-200 rounded">link</a>
        <a href="" class="p-4 bg-slate-100 hover:bg-slate-200 rounded">link</a>
        <div class="w-full" x-data="{open:false}">
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
                <a href="" class="p-4 bg-slate-100 hover:bg-slate-200 rounded">link</a>
                <a href="" class="p-4 bg-slate-100 hover:bg-slate-200 rounded">link</a>
                <a href="" class="p-4 bg-slate-100 hover:bg-slate-200 rounded">link</a>
            </div>
        </div>

    </div>
</div>