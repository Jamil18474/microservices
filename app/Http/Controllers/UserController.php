<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);

    }
    public function getUser(Request $request)
    {
        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        return response()->json($user);
    }
    public function getUserId($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function setUser(Request $request){
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'idTypeUser' =>'required|integer' ,
            'password' => 'required|string',
            'email' => 'required|string',
            'age' => 'required|integer']);
        $user = User::create($validatedData);
        return response()->json($user);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json($user);

    }
    public function updateUser($id, Request $request){
        $user = User::find($id);
        if(!$user) {
            return response()->json(["message" => "User not found"], 400);
        }
        $validatedData = $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'idTypeUser' =>'required|integer' ,
        'password' => 'required|string',
        'email' => 'required|string',
        'age' => 'required|integer']);
        $user->update($validatedData);
        return response()->json($user);
    }
}
