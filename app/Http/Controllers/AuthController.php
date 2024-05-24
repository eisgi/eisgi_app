<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
{
    try {
        $validateUser = Validator::make($request->all(), [
            'matricule' => 'required',
            'password' => 'required'
        ]);

        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Erreur de validation',
                'errors' => $validateUser->errors()
            ], 401);
        }

        if (!Auth::attempt($request->only(['matricule', 'password']))) {
            return response()->json([
                'status' => false,
                'message' => 'Matricule ou  mot de passe Incorrecte.',
            ], 401);
        }

        $user = User::where('matricule', $request->matricule)->first();

        return response()->json([
            'status' => true,
            'message' => 'Utilisateur connecté avec succès',
            'token' => $user->createToken("API TOKEN")->plainTextToken,
            'role' => $user->role // Include the user's role in the response
        ], 200);
    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }
}

}
