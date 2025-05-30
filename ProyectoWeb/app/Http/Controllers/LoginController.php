<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return back()->withErrors(['email' => 'Correo o contraseña incorrectos.'])->withInput();
        }
    
        if ($user->estado !== 'activo') {
            return back()->withErrors(['email' => 'Tu cuenta está inactiva. Contacta al administrador.'])->withInput();
        }
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            if ($user->role === 'administrador') {
                return redirect()->route('admindashboard')->with('success', 'Bienvenido al panel de administrador');
            } else {
                return redirect()->route('dashboard')->with('success', 'Bienvenido al sistema');
            }
        }
    
        return back()->withErrors(['email' => 'Correo o contraseña incorrectos.'])->withInput();
    }
    

    public function guardarRegistro(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Registro exitoso, bienvenido al sistema');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('inicio')->with('success', 'Sesión cerrada correctamente');
    }
}
