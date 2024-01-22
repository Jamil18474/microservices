<?php

namespace App\Http\Controllers;

use App\Models\typeUsers;
use Illuminate\Http\Request;

class typeUsersController extends Controller
{

public function __construct()
{
//
}

public function getTypes()
{
    $typeUsers = typeUsers::all();
    return response()->json($typeUsers);
}

public function setType(Request $request)
{
    $typeUser = new typeUsers();
    $typeUser->nom=$request->nom;
    $typeUser->save();
    return response()->json($typeUser);
}

public function update($id, Request $request){
    $typeUser = typeUsers::find($id);
    $typeUser->nom = $request->nom;
    $typeUser->save();
    return response()->json($typeUser);
}

public function getType($id){
    $typeUser = typeUsers::find($id);
    return response()->json($typeUser);
}

public function deleteType($id){
    $typeUser = typeUsers::find($id);
    $typeUser->delete();
    return response()->json('Le type d\'utilisateur a été supprimé');
}


}
