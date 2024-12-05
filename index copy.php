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

        /* header {
            background-color: #4CAF50;
            color: white;
            padding: 1rem 2rem;
            text-align: center;
        } */

        header {
            background-color: #4CAF50;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            background-color: #333;
            padding: 0.5rem;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #4CAF50;
        }

        main {
            flex: 1;
            padding: 2rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            text-align: center;
            width: 250px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            margin-bottom: 1rem;
        }

        .card p {
            margin-bottom: 1.5rem;
        }

        a {
            display: inline-block;
            padding: 0.5rem 1rem;
            color: white;
            background-color: blue;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .card a {
            display: inline-block;
            padding: 0.5rem 1rem;
            color: white;
            background-color: #4CAF50;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .card a:hover {
            background-color: #45a049;
        }

        /* footer {
            text-align: center;
            padding: 1rem;
            background-color: #333;
            color: white;
        } */

        footer {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .card {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Sistema de Gestión de Bibliotecas</h1>

        <div class="header-button">
            <a href="login.php">Entrar</a>
        </div>

    </header>
    <!-- <nav>
        <a href="#catalogacion">Catalogación</a>
        <a href="#prestamos">Préstamos</a>
        <a href="#consultas">Consultas</a>
        <a href="#estadisticas">Estadísticas</a>
        <a href="#configuracion">Configuración</a>
    </nav> -->
    <main>
        <div class="card" id="catalogacion">
            <h3>Catalogación</h3>
            <p>Gestione y clasifique los libros de la biblioteca.</p>
            <!-- <a href="#">Entrar</a> -->
        </div>
        <div class="card" id="prestamos">
            <h3>Préstamos</h3>
            <p>Administre el registro de préstamos y devoluciones.</p>
            <!-- <a href="#">Entrar</a> -->
        </div>
        <div class="card" id="consultas">
            <h3>Consultas</h3>
            <p>Permita a los usuarios buscar y consultar libros.</p>
            <!-- <a href="#">Entrar</a> -->
        </div>
        <div class="card" id="estadisticas">
            <h3>Estadísticas</h3>
            <p>Revise estadísticas del uso de la biblioteca.</p>
            <!-- <a href="#">Entrar</a> -->
        </div>
        <div class="card" id="configuracion">
            <h3>Configuración</h3>
            <p>Configure los ajustes del sistema.</p>
            <!-- <a href="#">Entrar</a> -->
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Sistema de Gestión de Bibliotecas. Todos los derechos reservados.</p>
    </footer>
</body>

</html>