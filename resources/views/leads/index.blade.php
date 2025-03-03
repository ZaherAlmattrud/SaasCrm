<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leads') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
              
            <a href="{{route('leads.create')}}">Create</a>

            @foreach($leads as $lead)
                  
                        <div>

                            {{ $lead->name }},
                            {{ $lead->email }} 
                          
                            <a class="text-blue-500 hover:underline" href="{{ route('leads.edit', ['lead'=>$lead->id]) }}">edit</a>
                            <a class="text-blue-500 hover:underline" onclick="deleteLead('lead{{$lead->id}}')">delete</a>
                        <form id="lead{{$lead->id}}" action="{{ route('leads.delete', ['lead'=>$lead->id]) }}" method='post'>
                            @csrf
                            @method('DELETE')
                        </form>

                        
                        
                        </div>
                     
                       
                       
                @endforeach

                <div class="py-3">{{ $leads->links() }}</div>

            </div>
        </div>
    </div>
    <script>
        function deleteLead(leadId)
        {
            if (confirm("Are you sure to delete lead?") == true) {
                document.getElementById(leadId).submit();
            }
        }
    </script>
</x-app-layout>
