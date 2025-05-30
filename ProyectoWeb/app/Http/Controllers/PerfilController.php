<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class PerfilController extends Controller
{
    public function mostrar()
    {
        $usuario = Auth::user();
        return view('perfil', compact('usuario'));
    }

    public function desactivar(Request $request, $id) 
    {
        $usuario = User::findOrFail($id);
    
        if (Auth::check() && Auth::id() === $usuario->id) {
            $usuario->estado = 'Inactivo';
            $usuario->save();
    
            Auth::logout();
        }
    
        return redirect()->route('inicio')->with('success', 'Usuario Elimininado correctamente.');
    }     
}
