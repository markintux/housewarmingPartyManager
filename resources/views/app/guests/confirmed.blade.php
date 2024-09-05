@extends('app.layouts.template')

@section('title', 'Confirmed Guests')

@section('css')
    @component('app.layouts._css.table_guest_confirmed')
    @endcomponent
@endsection

@section('content')
    @component('app.layouts._components.table_guest_confirmed', compact('guests', 'totalConfirmedGuests', 'totalGifts'))
    @endcomponent
@endsection

@section('scripts')
    @component('app.layouts._scripts.table_guest_confirmed')
    @endcomponent
@endsection