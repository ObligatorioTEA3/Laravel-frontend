<?php
// resources/views/tareas.blade.php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>
</head>
<body>
    <h1>Bienvenido al Gestor de Tareas</h1>
    <p>Aquí puedes gestionar tus tareas de manera eficiente.</p>
<!-- Las tareas deben contener ID de tarea, título, ID de autor, ID de usuario asignado, cuerpo, fecha de creación, fecha de expiración (opcional) y categorías, las cuales pueden ser más de una, y opcionales. -->
    <div>
        <form action="/guardar-Tarea" method="post">
            @csrf
            <input type="text" name="titulo" placeholder="Título de la tarea" required>
            <br>
            <textarea name="descripcion" placeholder="Descripción de la tarea" required></textarea>
            <br>
            <input type="hidden" name="user_id" value="{{ $user['id'] }}">
            <br>
            <input type="text" name="usuario_asignado_id" placeholder="ID del usuario asignado" required>
            <br>
            <input type="date" name="fecha_creacion" placeholder="Fecha de creación" required>
            <br>
            <input type="date" name="fecha_expiracion" placeholder="Fecha de expiración:">
            <br>
            <input type="checkbox" name="categorias[]" id="categoria1" value="Planificación">
            <label for="categoria1">Planificación</label><br>
            <input type="checkbox" name="categorias[]" id="categoria2" value="Análisis">
            <label for="categoria2">Análisis</label><br>
            <input type="checkbox" name="categorias[]" id="categoria3" value="Desarrollo">
            <label for="categoria3">Desarrollo</label><br>
            <input type="checkbox" name="categorias[]" id="categoria4" value="Pruebas">
            <label for="categoria4">Pruebas</label><br>
            <input type="checkbox" name="categorias[]" id="categoria5" value="Documentación">
            <label for="categoria5">Documentación</label><br>
            <input type="checkbox" name="categorias[]" id="categoria6" value="Mantenimiento">
            <label for="categoria6">Mantenimiento</label><br>
            <br>
            <button type="submit">Crear Tarea</button>
        </form>
    </div>
</body>
</html>