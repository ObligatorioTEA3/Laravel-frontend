<?php

    use App\Http\Controllers\registrarUsuariosController;
    use App\Http\Controllers\loginController;
    use App\Http\Controllers\tareasController;
    
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
    Route::get('/tareas', [tareasController::class, 'crearTarea']);
    Route::post('/guardar-Tarea', [tareasController::class, 'guardarTarea']);

    Route::get('/logout', [loginController::class, 'logoutUsuario']);

    

    
