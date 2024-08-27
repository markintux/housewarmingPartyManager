@extends('app.layouts.template')

@section('title', 'New Guest')

@section('content')
    @component('app.layouts._components.form_guest_create')
    @endcomponent
@endsection

@section('scripts')
    @component('app.layouts._scripts.form_guest_create')
    @endcomponent
@endsection