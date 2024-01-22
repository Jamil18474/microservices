<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use http\Env\Response;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{

    public function __construct()
    {
//
    }
    public function index(){
        $reservations = Reservations::all();
        return response()->json($reservations);
    }

    public function getReservation($id){
        $reservations = Reservations::find($id);
        return response()->json($reservations);
    }
    public function setReservation($idUser, Request $request)
    {
        $reservation = new Reservations();
        $reservation->idUser= $idUser;
        $reservation->idTarif= $request->idTarif;
        $reservation->idSeance= $request->idSeance;
        $reservation->save();
        return response()->json($reservation);
    }

    public function updateReservation($id, $idUser, Request $request)
    {
        $reservation= Reservations::find($id);

        if(!$reservation){
            return response()->json(["message", "Reservation not found !"], 404);
        }
        $reservation->idUser = $idUser;
        $reservation->idTarif = $request->idTarif;
        $reservation->idSeance = $request->idSeance;
        $reservation->save();
        return response()->json($reservation);
    }

    public function deleteReservation($id){
        $reservation = type_users::find($id);
        $reservation->delete();
        return response()->json('La réservation a été supprimée');
    }


}
