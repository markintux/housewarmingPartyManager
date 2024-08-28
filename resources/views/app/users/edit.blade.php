@extends('app.layouts.template')

@section('title', 'Profile')

@section('content')
    @component('app.layouts._components.form_user_edit', compact('user'))
    @endcomponent
@endsection

@section('scripts')
    @component('app.layouts._scripts.form_user_edit')
    @endcomponent
@endsection