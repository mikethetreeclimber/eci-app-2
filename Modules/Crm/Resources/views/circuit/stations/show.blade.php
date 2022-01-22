@extends('crm::layouts.crm', ['breadcrumbs' => [$circuit->circuit_name, $station->station_number]])
@section('content')
    <div class="flex flex-col w-full">
        <div class="grid h-full card bg-base-300 rounded-box place-items-left p-10">
            <span class="text-xl">Station Number : <span
                    class="text-3xl text-primary">{{ $station->station_number }}</span>
                <span class="ml-8 text-xl">Unit : <span
                        class="text-2xl text-accent">{{ $station->unit }}</span></span></span>
            <span class="text-lg">Address : <span
                    class="text-xl text-primary">{{ ucwords(strtolower($station->address)) }} </span>
                    <span class="ml-8 text-lg">City : <span
                        class="text-xl text-primary">{{ ucwords(strtolower($station->city)) }} </span></span></span>

        </div>
        <div class="divider"></div>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <div class="p-3 space-y-4 grid h-auto card bg-base-300 rounded-box place-items-center">
                    <h3 class="pt-4 text-center text-2xl leading-6 font-medium text-primary-content">
                        All Stations Associtated To <div class="text-primary">{{ ucwords(strtolower($station->last_name)) }}</div>
                    </h3>
                    <ul role="list" class="pb-4 grid sm:grid-cols-2 gap-4">
                        @foreach ($allStationsAssociatedToLastName as $stationAssociatedToLastName)
                            <li class="btn btn-lg col-span-1 flex">
                                <a href="{{ route('crm.circuit.station.show', ['circuit' => $circuit, 'station' => $stationAssociatedToLastName->station_number]) }}">
                                    <div class="">
                                        <p class="text-xl font-medium text-secondary">
                                            {{ $stationAssociatedToLastName->station_number }}</p>
                                        <p class=" text-base text-accent">{{ strtolower($stationAssociatedToLastName->unit) }}</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <div class="p-3 space-y-4 grid h-auto card bg-base-300 rounded-box place-items-center">
                    <h3 class="pt-4 text-2xl leading-6 font-medium text-primary-content">
                        All Names Associated to <span class="text-primary">{{ $station->station_number }}</span>
                    </h3>
                    <ul role="list" class="divide-y divide-gray-200">
                        @foreach ($allNamesAssociatedToStationNumber as $nameAssociatedToStation)
                            <li class="py-4 flex">
                                <div class="ml-3">
                                    <p class="text-xl font-medium text-secondary">{{ $nameAssociatedToStation->name }}</p>
                                    <p class="ml-3 text-xl text-accent">{{ $nameAssociatedToStation->address }}</p>
                                    <p class="ml-3 text-xl text-accent">{{ $nameAssociatedToStation->city }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- @dump($allStationsAssociatedToLastName, $allNamesAssociatedToStationNumber, $station, $circuit) --}}

@endsection
