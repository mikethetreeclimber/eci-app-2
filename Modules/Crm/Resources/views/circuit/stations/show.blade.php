@extends('crm::layouts.crm', ['breadcrumbs' => ['Stations']])
@section('content')
    <div class="flex flex-col w-full">
        <div class="grid h-40 card bg-base-300 rounded-box place-items-left p-10">
            <span class="text-xl">Station Number : <span
                    class="text-3xl text-primary">{{ $station->station_number }}</span></span>
            <span class="text-xl">Property Owner : <span
                    class="text-3xl text-primary">{{ $station->name }}</span></span>
        </div>
        <div class="divider"></div>
        <div class="grid h-full card bg-base-300 rounded-box place-items-left p-4">
            <ul role="list" class="divide-y divide-gray-200">
                @foreach ($allStationsAssociatedToLastName as $stationAssociatedToLastName)
                    <li class="py-4 flex">
                        <div class="ml-3">
                            <p class="text-xl font-medium text-secondary">{{ $stationAssociatedToLastName->station_number }}</p>
                            <p class="text-xl text-gray-500">{{ $stationAssociatedToLastName->unit }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    @dump($allStationsAssociatedToLastName, $station->address, $circuit)

@endsection
