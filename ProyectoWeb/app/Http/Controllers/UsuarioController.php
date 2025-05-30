<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    public function __construct()
    {
       
        $this->middleware('auth');
        $this->middleware('role:usuario')->only('index');
    }
public function configuracion()
{
    $usuario = Auth::user();
    return view('configuracion', compact('usuario'));
}

public function actualizarConfiguracion(Request $request)
{
    $usuario = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    $usuario->name = $request->name;
    $usuario->email = $request->email;
    $usuario->save();

    return back()->with('success', 'Datos actualizados correctamente.');
}

public function actualizarPassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ]);

    $usuario = Auth::user();

    if (!Hash::check($request->current_password, $usuario->password)) {
        return back()->with('error', 'La contraseña actual no es correcta.');
    }

    $usuario->password = Hash::make($request->new_password);
    $usuario->save();

    return back()->with('success', 'Contraseña actualizada correctamente.');
}

public function dashboard() 
{
    return view('dashboard');
}

public function desactivar($id)
{
    $usuario = User::findOrFail($id);
    $usuario->estado = 'Inactivo';
    $usuario->save();

    return redirect()->back()->with('success', 'Usuario desactivado correctamente.');
}
}
