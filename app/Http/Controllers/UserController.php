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
    public function getUsers(): JsonResponse
    {
        $users = User::all();
        return response()->json($users);

    }
    public function getUser($email, $password): JsonResponse
    {
        $user = User::where('email', $email)->where('password', $password)->first();
        return response()->json($user);
    }
    public function getUserId($id): JsonResponse
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
    public function setUser(Request $request) : JsonResponse {
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->idTypeUser = $request->idTypeUser;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->save();
        return response()->json($user);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function deleteUser($id): JsonResponse
    {
        $user = User::find($id);
        $user->delete();
        return response()->json($user);

    }
    public function updateUser($id, Request $request) : JsonResponse {
        $user = User::find($id);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->idTypeUser = $request->idTypeUser;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->save();
        return response()->json($user);
    }
}
