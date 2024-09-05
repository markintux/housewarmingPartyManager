<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::check()){
            
            $userId = Auth::id();

            $totalGifts = Gift::where('user_id', $userId)->count();
            $totalGuests = Guest::where('user_id', $userId)->count();
            $confirmedGuests = Guest::where('user_id', $userId)->whereHas('gifts')->count();
            $totalConfirmedGifts = Guest::where('user_id', $userId)->whereHas('gifts')->withCount('gifts')->get()->sum('gifts_count');
            $percentGuestsConfirmed = $totalGuests > 0 ? ($confirmedGuests / $totalGuests) * 100 : 0;
            $percentGiftsSelected = $totalGifts > 0 ? ($totalConfirmedGifts / $totalGifts) * 100 : 0;

            return view('app.home', compact(
                'totalGifts', 
                'totalGuests', 
                'confirmedGuests', 
                'totalConfirmedGifts',
                'percentGuestsConfirmed',
                'percentGiftsSelected'
            ));

        }else{
            return view('site.index');
        }
    }
}
