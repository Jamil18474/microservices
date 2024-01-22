<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
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
    public function setReservation($idUser, $idTarif ,$idSeance)
    {
        $reservation = new Reservations();
        $reservation->idUser= $idUser;
        $reservation->idTarif= $idTarif;
        $reservation->idSeance= $idSeance;
        $reservation->save();
        return response()->json($reservation);
    }

    public function updateReservation($id, $idUser, $idTarif ,$idSeance)
    {
        $reservation= Reservations::find($id);

        $reservation->idUser = $idUser;
        $reservation->idTarif = $idTarif;
        $reservation->idSeance = $idSeance;
        $reservation->save();
        return response()->json($reservation);
    }

    public function deleteReservation($id){
        $reservation = type_users::find($id);
        $reservation->delete();
        return response()->json('La réservation a été supprimée');
    }


}
