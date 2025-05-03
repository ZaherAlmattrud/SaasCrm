<div>
  <div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Kanban Board</h1>
    <div class="flex" wire:sortable="updateLeadOrder" wire:sortable-group="updateLeadStatus" >
        @foreach($statuses as $status)
        <div class="w-1/4 mr-4" wire:key="group-{{ $status }}" >
            <h2 class="text-lg font-bold mb-2">{{ $status }}</h2>
            <div class="bg-white rounded-lg shadow-md p-4" wire:sortable-group.item-group="{{ $status }}">
                @foreach($data[$status] as $lead)
                    <div wire:key="lead-{{ $lead->id }}" wire:sortable-group.item="{{ $lead->id }}" class="bg-yellow-200 rounded-lg p-2 mb-2">
                        <span wire:sortable-group.handle>{{ $lead->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
  </div>
</div>
