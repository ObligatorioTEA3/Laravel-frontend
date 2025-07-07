<!DOCTYPE html>
<html>
<head>
    <title>Página Principal</title>
</head>
<body>
    <h1>logueate pa</h1>
    <form action="/loguearUsuario" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Correo" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <button type="submit">Ingresar</button>
</form>

    <p>¿No tienes cuenta? <a href="/registro">Regístrate aquí</a></p>
    
    @if(session('error'))
        <script>
        alert("{{ session('error') }}");
        </script>
    @endif

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif
</body>
</html>