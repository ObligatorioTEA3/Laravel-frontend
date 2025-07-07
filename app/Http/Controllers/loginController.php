<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class loginController extends Controller
{
    public function loginUsuario(Request $request){
        $response = Http::asForm()->post('http://localhost:8001/oauth/token', [
            'grant_type' => 'password',
            'client_id' => 1,
            'client_secret' => 'N8ABz8NpIWMmpv2RRkFg1b0LXCMsv8gecXUQNrSQ',
            'username' => $request->email,
            'password' => $request->password,
            'scope' => ''
        ]);

        if ($response->successful()) {
            $tokenData = $response->json();
            session(['token' => $tokenData['access_token']]);
            return redirect('/privado');
        } else {
            return redirect('/login')->with('error', 'Credenciales inválidas');
        }
    }
    public function logoutUsuario(Request $request){
        $token = session('token');
        if ($token) {
            Http::withToken($token)->post('http://localhost:8001/api/logout');
            session()->forget('token');
        }
        return redirect('/login')->with('success', 'Sesión cerrada correctamente');
    }
    
    
}
