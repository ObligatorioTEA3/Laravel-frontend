<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class tareasController extends Controller
{
    public function crearTarea(Request $request)
    {
        $token = session('token');

        if (!$token) {
            return redirect('/login')->with('error', 'No estás autenticado.');
        }

        $response = Http::withToken($token)->get('http://localhost:8001/api/user');

        if ($response->successful()) {
            $usuario = $response->json(); // <- Esto trae el usuario completo (incluye 'id', 'email', etc.)
            return view('tareas', ['user' => $usuario]); // Pasás el array del usuario a la vista
        } else {
            return redirect('/login')->with('error', 'No se pudo obtener el usuario autenticado.');
        }
    }

    public function guardarTarea(Request $request)
    {
         $token = session('token');

        $response = Http::withToken($token)->post('http://localhost:8002/api/tareas', [
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'user_id' => $request->input('user_id'),
            'fecha_limite' => $request->input('fecha_limite'),
            'estado' => $request->input('estado', 'pendiente'), // Valor por defecto
            'prioridad' => $request->input('prioridad', 'normal') // Valor por defecto

        ]);

    if ($response->successful()) {
        return redirect('/tareas')->with('success', 'Tarea creada con éxito');
    } else {
        return back()->with('error', 'No se pudo crear la tarea');
    }
    }
    public function buscarTarea(Request $request)
    {
        // Aquí puedes implementar la lógica para buscar una tarea
        // Por ejemplo, enviar una solicitud a la API externa para buscar una tarea
        // y manejar la respuesta.                  
        $query = $request->input('query');
        $response = Http::get("http://localhost:8001/api/tareas/{$query}");
        return response()->json($response->json());
    }
}
