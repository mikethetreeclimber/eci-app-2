<div>
    @if ($circuits === [])
        <h2 class="card-title">No Circuits</h2>
        <p>There are no circuits currently active.</p>
    @else

        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Circuit Name
                        </th>
                        <th>
                            Created At
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($circuits as $circuit)
                        <tr class="">
                            <td> {{ $circuit['id'] }}</td>
                            <td>{{ str_replace('-', ' ', $circuit['circuit_name']) }}</td>
                            <td>{{ Carbon\Carbon::parse($circuit['created_at'])->diffForHumans() }}</td>
                            <td class="space-x-4">
                                <a href="{{ route('crm.circuit.show', ['circuit' => $circuit['circuit_name']]) }}" class="btn btn-primary">
                                    View
                                </a>
                                <button wire:click="removeCircuit('{{ $circuit['id'] }}')"
                                    class="btn bg-red-400 hover:bg-red-700">
                                    Remove
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif
</div>
