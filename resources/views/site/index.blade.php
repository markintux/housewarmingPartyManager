@extends('site.layouts.template')

@section('title', 'Home')

@section('content')
    @component('site.layouts._components.form_login')
    @endcomponent
@endsection

@section('scripts')
    @component('site.layouts._scripts.form_index')
    @endcomponent
@endsection