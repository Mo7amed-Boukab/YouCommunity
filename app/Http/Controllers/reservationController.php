<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservations;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request, $eventId)
    {
        $userId = Auth::id();
        Reservations::create([
            'user_id' => $userId,
            'event_id' => $eventId,
        ]);
        return redirect()->back()->with('success', 'Votre réservation a été effectuée avec succès !');
    }

    public function destroy($eventId)
    {

        $userId = Auth::id();

        $reservation = Reservations::where('user_id', $userId)->where('event_id', $eventId)->first();
        $reservation->delete();

        return redirect()->back()->with('error', 'Votre réservation a été annulée.');
    }
}
