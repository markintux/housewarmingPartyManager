@extends('app.layouts.template')

@section('title', 'View Images')

@section('css')
    @component('app.layouts._css.table_image_index')
    @endcomponent
@endsection

@section('content')
    @component('app.layouts._components.table_image_index', compact('images'))
    @endcomponent
@endsection

@section('scripts')
    @component('app.layouts._scripts.table_image_index')
    @endcomponent
@endsection