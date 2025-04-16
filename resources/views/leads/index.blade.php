<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leads') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <a href="{{route('leads.create')}}" class="bg-blue-300 p-2 block mb-3 float-right">Create</a>

                <table class="table-auto clear-both w-full rounded">

                    <tr class="bg-gray-200">
                        <td class="px-6 py-3"> Name</td>
                        <td class="px-6 py-3"> Email</td>
                        <td class="px-6 py-3"> Actions</td>
                    </tr>

                    @foreach($leads as $lead)

                    <tr class="@if($loop->even) bg-gray-200 @endif">

                        <td class="px-6 py-3">{{ $lead->name }}</td>
                        <td class="px-6 py-3">{{ $lead->email }}</td>
                        <td class="px-6 py-3">

                            <a class="text-blue-500 hover:underline" href="{{ route('leads.edit', ['lead'=>$lead->id]) }}">edit</a>
                            <a class="text-blue-500 hover:underline" onclick="deleteLead('lead{{$lead->id}}')">delete</a>
                            <form id="lead{{$lead->id}}" action="{{ route('leads.delete', ['lead'=>$lead->id]) }}" method='post'>
                                @csrf
                                @method('DELETE')
                            </form>

                        </td>



                    </tr>



                    @endforeach

                </table>

                <div class="py-3">{{ $leads->links() }}</div>


            </div>
        </div>
        <script>
            function deleteLead(leadId) {
                if (confirm("Are you sure to delete lead?") == true) {
                    document.getElementById(leadId).submit();
                }
            }
        </script>
</x-app-layout>