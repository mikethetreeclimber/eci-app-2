@extends('crm::layouts.crm')
@section('content')
    <!-- Replace with your content -->
    <div class="card lg:card-side card-bordered">
        <div class="card-body">
            <h2 class="card-title">No Circuts</h2>
            <p>There are no circuts currently active.</p>
            <div class="card-actions">
                <button class="btn btn-primary">Add a Circut</button>
                <button class="btn btn-ghost">Access Archive</button>
            </div>
        </div>
    </div>
    <livewire:crm::modal />
    <!-- /End replace -->
@endsection
