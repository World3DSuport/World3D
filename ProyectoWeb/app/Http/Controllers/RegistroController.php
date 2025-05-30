<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function index()
    {
        return view('registro'); 
    }

    public function guardarRegistro(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|min:6|confirmed',
        'terminos' => 'accepted',
    ], [
        'terminos.accepted' => '⚠️Debes aceptar los términos y condiciones para continuar.⚠️'
    ]);

    $role = ($request->email === 'juandavidvaquiroclavijo@gmail.com') ? 'administrador' : 'usuario';

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $role,
        'terminos' => true,
        'terminos_aceptados_en' => now()
    ]);

    return redirect()->route('login')->with('success', 'Registro exitoso. Inicia sesión.');
}

}
