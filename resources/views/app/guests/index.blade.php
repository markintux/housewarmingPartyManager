@extends('app.layouts.template')

@section('title', 'View Guests')

@section('css')
    @component('app.layouts._css.table_guest_index')
    @endcomponent
@endsection

@section('content')
    @component('app.layouts._components.table_guest_index', compact('guests'))
    @endcomponent
@endsection

@section('scripts')
    @component('app.layouts._scripts.table_guest_index')
    @endcomponent
@endsection