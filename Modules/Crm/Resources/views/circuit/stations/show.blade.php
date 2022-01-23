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
    <div class="flex flex-col w-full">
        <div class="divider"></div>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <div class="p-3 space-y-4 grid h-auto card bg-base-300 rounded-box place-items-center">
                    <h3 class="pt-4 text-center text-2xl leading-6 font-medium text-primary-content">
                        All Units Associtated To <div class="text-primary">{{ $station->name }}
                        </div>
                    </h3>
                    <ul role="list" class="pb-4 grid sm:grid-cols-2 gap-4">
                        @foreach ($allStationsAssociatedToLastName as $stationAssociatedToLastName)
                            <li class="btn btn-lg col-span-1 flex">
                                <a
                                    href="{{ route('crm.circuit.station.show', ['circuit' => $circuit, 'station' => $stationAssociatedToLastName->station_number]) }}">
                                    <div class="">
                                        <p class="text-xl font-medium text-secondary">
                                            {{ $stationAssociatedToLastName->station_number }}</p>
                                        <p class=" text-base text-accent">
                                            {{ strtolower($stationAssociatedToLastName->unit) }}</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <div class="p-3 space-y-4 grid h-auto card bg-base-300 rounded-box place-items-center">
                    @if ($contactInformation !== [] && isset($contactFoundWith))
                        <h3 class="pt-4 text-2xl leading-6 font-medium text-primary-content">
                            Possible Contact Information Found With <div
                                class="text-primary text-center">{{ $contactFoundWith }}</div>
                        </h3>
                        <ul role="list" class="divide-y divide-gray-200">
                            @foreach ($contactInformation as $contact)
                                <li class="py-4 flex">
                                    <div class="ml-3">
                                        <p class="text-xl font-medium text-secondary">{{ $contact->customer_name }}</p>
                                        <p class=" text-lg text-accent">{{ $contact->address }}</p>
                                        <p class=" text-lg text-accent">{{ $contact->primary_phone }}</p>
                                        <p class=" text-lg text-accent">{{ $contact->alt_phone }}</p>
                                        <button class="btn btn-primary">Verify</button>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <h3 class="pt-4 text-xl leading-6 font-medium text-primary-content">
                            Sorry No Results Found 
                        </h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- @dump($allStationsAssociatedToLastName, $allNamesAssociatedToStationNumber, $station, $circuit) --}}

@endsection
