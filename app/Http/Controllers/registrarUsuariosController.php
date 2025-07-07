<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class registrarUsuariosController extends Controller
{
    public function RegistrarUsuarioNuevo(Request $request)
    {
        // Llama a la API externa
        $response = Http::post('http://localhost:8001/api/registrar', [ // Cambia puerto si es necesario
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation
        ]);

        if ($response->successful()) {
            return redirect('/login')->with('success', 'Usuario registrado con éxito. Por favor, inicia sesión.');
        } else {
            return back()->with('error', 'Error al registrar usuario: ' . $response->json()['message']);
        }
    }

    public function CambiarPassword(Request $request, $id)
    {
        $response = Http::put("http://localhost:8001/api/users/$id/password", [
            'password' => $request->password
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Contraseña actualizada');
        } else {
            return back()->with('error', 'Error al actualizar contraseña');
        }
    }

    
}
