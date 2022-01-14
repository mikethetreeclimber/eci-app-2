{{-- @dump($circuit, auth()->user())  --}}

@extends('crm::layouts.crm', ['breadcrumbs' => [str_replace('-', ' ', $circuit['circuit_name']), 'Stations']])
@section('content')

@forelse ($stations as $station)
    @dd($station, $circuit)
@empty
    <h3>No Stations Have Been Added</h3>
@endforelse
    
@endsection
