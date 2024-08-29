@extends('app.layouts.template')

@section('title', 'New Gift')

@section('content')
    @component('app.layouts._components.form_gift_create')
    @endcomponent
@endsection

@section('scripts')
    @component('app.layouts._scripts.form_gift_create')
    @endcomponent
@endsection