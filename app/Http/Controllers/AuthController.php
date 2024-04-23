<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function login(AuthRequest $request){
        try {
            $request->validate($request->rules());
            $matricule = $request->input('matricule');
            $password = $request->input('password');
            $user = User::where('matricule', $matricule)->first();
            $credentials = request(['matricule', 'password']);
            if (!Auth::attempt($credentials)) {
                return back()->withErrors([
                    'error' => 'Adresse email ou mot de passe incorrect',
                ]);
            }

            $user = $request->user();
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            if ($request->remember_me) {
                $token->expires_at = Carbon::now()->addWeeks(1);
            }
            switch ($user->role) {
                case 'ADM':
                    Auth::login($user);
                    return redirect()->route('homeAdmin')->with([
                        'access_token' => $token,
                        
                    ]);
                case 'FRM':
                    return redirect()->route('homeFormateur')->with([
                        'access_token' => $token,

                    ]);
                case 'STG':
                    return redirect()->route('homeStagaire')->with([
                        'access_token' => $token,
                        
                    ]);
                default:
                    break;
            }
        } catch (ValidationException $e) {
            return back()->withErrors($e->validator->errors())->withInput();
        }
        
    }
    public function logout(Request $request)
    {
        
        $token = PersonalAccessToken::findToken($request->token);

    if ($token) {
        $token->delete();
    }
        Auth::logout();
        return redirect()->route('welcome');
    }
}
