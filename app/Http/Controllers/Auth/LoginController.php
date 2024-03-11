<?php

// LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('matricule', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $role = $user->role;

            switch ($role) {
                case 'ADM':
                    return view('admin.adminHome');
                    break;

                case 'FORM':
                    return view('formateurs.formateurHome');
                    break;

                case 'STAG':
                    return view('stagiaires.stagiaireHome');
                    break;

                default:
                    return redirect()->route('error.page');
                    break;
            }
        }

        return redirect()->route('login')->with('error', 'Invalid matricule or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
