{{-- @dump($circuit, auth()->user())  --}}

@extends('crm::layouts.crm', ['breadcrumbs' => [str_replace('-', ' ', $circuit['circuit_name']), 'Stations']])
@section('content')

<livewire:crm::circuit.stations.import-stations :circuit="$circuit" />

@endsection
