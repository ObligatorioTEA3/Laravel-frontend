<html>
    <head>
        <title>Pagina</title>
        
    </head>
    <body>

    <nav>   
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="/privado">Privado</a></li>
            @if(Auth::check())
                <li>{{ Auth::user()->name }}</li>
                <li><a href="/logout">Logout</a></li>
            @else
                <li><a href="/login">Login</a></li>
            @endif
        </ul>
    </nav>
    <hr>