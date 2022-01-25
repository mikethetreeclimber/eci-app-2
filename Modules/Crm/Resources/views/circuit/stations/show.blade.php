@extends('crm::layouts.crm', ['breadcrumbs' => [$circuit->circuit_name, $station->station_number]])
@section('content')

    <div class="sticky top-0 z-50">
        <div class="grid h-full card bg-base-300 rounded-box place-items-left p-10">
            <span class="text-xl">Property Owner : <span
                    class="text-2xl text-primary">{{ $station->name }}</span></span>
            <span class="text-lg">Address : <span
                    class="text-xl text-primary">{{ ucwords(strtolower($station->address)) }} </span>
                <span class="ml-8 text-lg">City : <span
                        class="text-xl text-primary">{{ ucwords(strtolower($station->city)) }} </span></span></span>
        </div>
    </div>

    <livewire:crm::circuit.stations.verify-contacts :circuit="$circuit" :station="$station" />

@endsection
