@extends('app.layouts.template')

@section('title', 'Admin Area')

@section('content')
    @component('app.layouts._components.home', compact(
        'totalGifts', 
        'totalGuests', 
        'confirmedGuests', 
        'totalConfirmedGifts',
        'percentGuestsConfirmed',
        'percentGiftsSelected'
        ))
    @endcomponent
@endsection