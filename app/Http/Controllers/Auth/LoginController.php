<?php

// LoginController.php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

   public function login(Request $request)
{
    $matricule = $request->input('matricule');
    $password = $request->input('password');

    $user = User::where('matricule', $matricule)->first();


    if ($user && $password === $user->password) {
        $role = $user->role;

        switch ($role) {
            case 'ADM':
                return view('admin.adminHome', compact('user'));
                break;

            case 'FORM':
                return view('formateurs.formateurHome',['user'=>$user]);
                break;

            case 'STAG':
                return view('stagiaires.stagiaireHome');
                break;

            default:
                return redirect()->route('error.page');
                break;
        }
    }

    return redirect()->route('login')->withErrors([
        'error' => 'Invalid matricule or password',
    ]);
}


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}