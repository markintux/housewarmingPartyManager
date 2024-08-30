@extends('app.layouts.template')

@section('title', 'Edit Image')

@section('content')
    @component('app.layouts._components.form_image_edit', compact('image'))
    @endcomponent
@endsection

@section('scripts')
    @component('app.layouts._scripts.form_image_edit')
    @endcomponent
@endsection