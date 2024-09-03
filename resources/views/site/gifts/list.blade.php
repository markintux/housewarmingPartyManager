@extends('site.layouts.template')

@section('title', $user->title)

@section('content')
    @component('site.layouts._components.list', compact('gifts', 'user', 'images'))
    @endcomponent
@endsection

@section('scripts')
    @component('site.layouts._scripts.list')
    @endcomponent
@endsection