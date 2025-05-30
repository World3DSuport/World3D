<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash; 

class AdminController extends Controller
{
    
    public function createAdmin()
    {
        $admin = User::firstOrCreate(
            ['email' => 'juandavidvaquiroclavijo@gmail.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('juancho2712'),
                'role' => 'administrador',
            ]
        );
    
        return "Administrador creado con éxito";
    }
    
        public function index()
        {
            $userCount = User::count();
            return view('admindashboard', compact('userCount'));
    }
    public function dashboard()
    {
        $usuariosInactivos = User::where('estado', 'inactivo')->get();
        $totalUsuarios = User::count();
        $fechaActual = Carbon::now()->format('d/m/Y');
    
        return view('admindashboard', compact(
            'usuariosInactivos',
            'totalUsuarios',
            'fechaActual'
        ));
    }
    
public function eliminarUsuario($id)
{
    $usuario = User::where('id', $id)->where('estado', 'inactivo')->first();
    if ($usuario) {
        $usuario->delete();
        return redirect()->back()->with('success', 'Usuario eliminado correctamente.');
    }
    return redirect()->back()->with('error', 'Usuario no encontrado o aún está activo.');
}

public function mostrarUsuarios()
{
    $usuarios = User::all(); 
    return view('v_usuarios', compact('usuarios'));
}
public function cambiarEstadoUsuario($id)
{
    $usuario = User::findOrFail($id);


    $usuario->estado = $usuario->estado === 'activo' ? 'inactivo' : 'activo';
    $usuario->save();

    return redirect()->back()->with('success', 'Estado del usuario actualizado correctamente.');
}

public function cambiarRolUsuario($id)
{
    $usuario = User::findOrFail($id);

    // Cambiar de admin a usuario o viceversa
    $usuario->role = ($usuario->role === 'administrador') ? 'usuario' : 'administrador';
    $usuario->save();

    return redirect()->back()->with('success', 'Rol actualizado correctamente.');
}


}
