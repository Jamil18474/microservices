<?php

namespace App\Http\Controllers;

use App\Models\typeUsers;
use http\Env\Response;
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
    $validatedData = $request->validate([
        'nom' => 'required|string',
    ]);
    $typeUser = typeUsers::create($validatedData);
    return response()->json($typeUser);
}

public function update(Request $request, $id){
    $typeUser = typeUsers::find($id);
    if(!$typeUser){
        return response()->json(["message" => "TypeUser not found"], 404);
    }
    $validatedData = $request->validate([
        'nom' => 'required|string',
    ]);
    $typeUser->update($validatedData);
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
