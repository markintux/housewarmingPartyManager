@extends('app.layouts.template')

@section('title', 'Edit Gift')

@section('content')
    @component('app.layouts._components.form_gift_edit', compact('gift'))
    @endcomponent
@endsection

@section('scripts')
    @component('app.layouts._scripts.form_gift_edit')
    @endcomponent
@endsection