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
            font-size: 1.5rem;
        }

        .header-button a {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            border: 2px solid white; /* Borde blanco para destacarse */
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s, border-color 0.3s;
        }

        .header-button a:hover {
            background-color: #45a049;
            border-color: #f5f5f5; /* Cambio de color del borde al hacer hover */
            transform: scale(1.05);
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
    <main>
        <div class="card" id="catalogacion">
            <h3>Catalogación</h3>
            <p>Gestione y clasifique los libros de la biblioteca.</p>
        </div>
        <div class="card" id="prestamos">
            <h3>Préstamos</h3>
            <p>Administre el registro de préstamos y devoluciones.</p>
        </div>
        <div class="card" id="consultas">
            <h3>Consultas</h3>
            <p>Permita a los usuarios buscar y consultar libros.</p>
        </div>
        <div class="card" id="estadisticas">
            <h3>Estadísticas</h3>
            <p>Revise estadísticas del uso de la biblioteca.</p>
        </div>
        <div class="card" id="configuracion">
            <h3>Configuración</h3>
            <p>Configure los ajustes del sistema.</p>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Sistema de Gestión de Bibliotecas. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
