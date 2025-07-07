<?php

    use App\Http\Controllers\registrarUsuariosController;
    use App\Http\Controllers\loginController;
    
    Route::get('/', function () {
        return view('principal');
    });
    Route::get('/registro', function () {
        return view('registro');
    });
    Route::post('/registrar', [registrarUsuariosController::class, 'RegistrarUsuarioNuevo']);
    Route::put('/cambiar-password/{id}', [registrarUsuariosController::class, 'CambiarPassword']);
    Route::get('/login', function () {
        return view('login');
    });
    Route::post('/loguearUsuario', [loginController::class, 'loginUsuario']);
    
    Route::get('/tareas', function () {
    if (!session('token')) {
        return redirect('/login')->with('error', 'no seas cochino, inicia sesión primero');
    }
    return view('tareas');
    });
    
    Route::get('/logout', [loginController::class, 'logoutUsuario']);

    

    
