{{-- @dump($circuit, auth()->user())  --}}

@extends('crm::layouts.crm', ['breadcrumbs' => 'Verified'])
@section('content')
<div class="card lg:card-side card-bordered">
    <div class="card-body">
        @dump($permissionings)
    </div>
</div>

@endsection
