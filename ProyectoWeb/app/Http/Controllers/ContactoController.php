<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'correo' => 'required|email',
            'telefono' => 'required',
            'mensaje' => 'required|string',
        ]);

        $contenido = "
            <h2>Nuevo mensaje desde el formulario de contacto</h2>
            <p><strong>Nombre:</strong> {$request->nombre}</p>
            <p><strong>Correo:</strong> {$request->correo}</p>
            <p><strong>Teléfono:</strong> {$request->telefono}</p>
            <p><strong>Mensaje:</strong><br>{$request->mensaje}</p>
        ";

        Mail::html($contenido, function($message) {
            $message->to('contacto@world3d.com', 'World3D')
                    ->subject('Nuevo mensaje de contacto');
        });

        return back()->with('success', '¡Mensaje enviado correctamente!');
    }
}
