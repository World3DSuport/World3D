<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('restablecer_contraseña');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

    
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
    ? back()->with('status', 'Te hemos enviado un enlace para restablecer tu contraseña.')
    : back()->withErrors(['email' => 'No se pudo enviar el enlace. Inténtalo de nuevo.']);

    }
}
