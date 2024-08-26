@extends('site.layouts.template')

@section('title', 'Register')

@section('content')
    @component('site.layouts._components.form_user_create')
    @endcomponent
@endsection

@section('scripts')
    @component('site.layouts._scripts.form_user_create')
    @endcomponent
@endsection