<?php
session_start();
if (isset($_SESSION['nombre'])) {
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Gestión de Bibliotecas</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }

            body {
                background-color: #f5f5f5;
                color: #333;
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            header {
                background-color: #4CAF50;
                color: white;
                padding: 1rem 2rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            header h1 {
                margin: 0;
                font-size: 1.5rem;
            }

            nav a {
                color: white;
                text-decoration: none;
                margin: 0 1rem;
                font-size: 1rem;
            }

            nav a:hover {
                text-decoration: underline;
            }

            .container {
                flex: 1;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;
            }

            .button {
                background-color: #4CAF50;
                color: white;
                padding: 1rem 2rem;
                margin: 1rem;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 1.2rem;
                transition: background-color 0.3s;
            }

            .button:hover {
                background-color: #45a049;
            }

            footer {
                background-color: #4CAF50;
                color: white;
                text-align: center;
                padding: 1rem 0;
                margin-top: auto;
            }

            .header-button a {
                display: inline-block;
                background-color: #4CAF50;
                color: white;
                text-decoration: none;
                padding: 0.8rem 1.5rem;
                border: 2px solid white;
                /* Borde blanco para destacarse */
                border-radius: 5px;
                font-size: 1rem;
                font-weight: bold;
                transition: background-color 0.3s, transform 0.2s, border-color 0.3s;
            }

            .header-button a:hover {
                background-color: #45a049;
                border-color: #f5f5f5;
                /* Cambio de color del borde al hacer hover */
                transform: scale(1.05);
            }
        </style>
    </head>

    <body>
        <header>
            <h1>Sistema de Gestión de Bibliotecas</h1>
            <div class="header-button">
                <a href="dashboard.php">Inicio</a>
                <a href="metodosPhp/cerrarSesion.php">Salir</a>
            </div>
        </header>
        <div class="container">
            <h2>Seleccione una opción</h2>
            <button class="button" onclick="location.href='carga_libros.php'">Carga de Libros</button>
            <button class="button" onclick="location.href='abmUsuarios.php'">ABM de Usuarios</button>
        </div>
        <footer>
            <p>&copy; 2024 Sistema de Gestión de Bibliotecas. Todos los derechos reservados.</p>
        </footer>
    </body>

    </html>



<?php

} else {
    header("location:login.php");
}
?>