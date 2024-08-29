@extends('app.layouts.template')

@section('title', 'View Gifts')

@section('css')
    @component('app.layouts._css.table_gifts_index')
    @endcomponent
@endsection

@section('content')
    @component('app.layouts._components.table_gifts_index', compact('gifts'))
    @endcomponent
@endsection

@section('scripts')
    @component('app.layouts._scripts.table_gifts_index')
    @endcomponent
@endsection