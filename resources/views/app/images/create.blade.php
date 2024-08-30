@extends('app.layouts.template')

@section('title', 'New Image')

@section('content')
    @component('app.layouts._components.form_image_create')
    @endcomponent
@endsection

@section('scripts')
    @component('app.layouts._scripts.form_image_create')
    @endcomponent
@endsection