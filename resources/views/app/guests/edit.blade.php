@extends('app.layouts.template')

@section('title', 'Edit Guest')

@section('content')
    @component('app.layouts._components.form_guest_edit', compact('guest'))
    @endcomponent
@endsection

@section('scripts')
    @component('app.layouts._scripts.form_guest_edit')
    @endcomponent
@endsection