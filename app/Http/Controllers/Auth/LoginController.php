<?php

// LoginController.php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

   // LoginController.php

public function login(Request $request)
{
    $matricule = $request->input('matricule');
    $password = $request->input('password');

    $user = User::where('matricule', $matricule)->first();

    if ($user && password_verify($password, $user->password)) {
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

    // Authentication failed, return to login with error message
    return redirect()->route('login')->withErrors([
        'error' => 'Invalid matricule or password',
        'user' => $user, // Pass user data to the view
    ]);
}


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
