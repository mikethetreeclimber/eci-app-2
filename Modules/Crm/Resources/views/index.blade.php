@extends('crm::layouts.crm')
@section('content')
    <div class="card lg:card-side card-bordered">
        <div class="card-body">

            <livewire:crm::circuit.circuits-table />

            <div class="card-actions">
                <x-crm::modal cardTitle="Add A New Circuit" button="Add Circuit">

                    <livewire:crm::circuit.add-circuit-form />

                </x-crm::modal>
            </div>
            {{-- <button class="btn btn-ghost">Access Archive</button> --}}
        </div>
    @endsection
