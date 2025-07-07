<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuario</title>
</head>
<body>
    <h1>Registro</h1>
    <form action='/registrar' method='Post'>
        @csrf
        <input type="text" name="name" placeholder="Nombre completo" required><br>
        <input type="email" name="email" placeholder="Correo" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required><br>


        <button type="submit">Registrar</button>
    </form>
</body>
</html>
