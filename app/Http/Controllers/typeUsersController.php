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
    $typeUsers = type_users::all();
    return response()->json($typeUsers);
}

public function setType($nom)
{
    $typeUser = new type_users();
    $typeUser->nom= $nom;
    $typeUser->save();
    return response()->json($typeUser);
}

public function update($id, $nom){
    $typeUser = typeUsers::find($id);
    $typeUser->nom = $nom;
    $typeUser->save();
    return response()->json($typeUser);
}

public function getType($id){
    $typeUser = type_users::find($id);
    return response()->json($typeUser);
}

public function deleteType($id){
    $typeUser = type_users::find($id);
    $typeUser->delete();
    return response()->json('Le type d\'utilisateur a été supprimé');
}


}
