<?php
session_start();
if (isset($_SESSION['nombre'])) {
    // Verifica si los datos del libro están disponibles en la sesión
    if (isset($_SESSION['usuario_editar'])) {
        $libro = $_SESSION['usuario_editar'];
    } else {
        echo "No se encontraron detalles del libro.";
        exit();
    }
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalle del Libro</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            /* Estilo general */
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

            /* Header */
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

            .header-button a {
                display: inline-block;
                background-color: #4CAF50;
                color: white;
                text-decoration: none;
                padding: 0.8rem 1.5rem;
                border: 2px solid white;
                border-radius: 5px;
                font-size: 1rem;
                font-weight: bold;
                transition: background-color 0.3s, transform 0.2s, border-color 0.3s;
            }

            .header-button a:hover {
                background-color: #45a049;
                border-color: #f5f5f5;
                transform: scale(1.05);
            }

            /* Contenedor principal */
            .container {
                background: white;
                padding: 2rem;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 600px;
                margin: 2rem auto;
                display: flex;
                gap: 1rem;
            }

            /* Contenedor del texto */
            .text-container {
                flex: 1;
            }

            .detail-item {
                margin-bottom: 1rem;
            }

            .detail-item span {
                font-weight: bold;
                color: #4CAF50;
            }

            .btn-back {
                display: inline-block;
                background-color: #4CAF50;
                color: white;
                text-decoration: none;
                padding: 0.8rem 1.5rem;
                border-radius: 5px;
                font-size: 1rem;
                font-weight: bold;
                transition: background-color 0.3s;
            }

            .btn-back:hover {
                background-color: #45a049;
            }

            .btn-container {
                display: flex;
                justify-content: center;
                margin-top: 2rem;
            }

            /* Imagen */
            .image-container {
                flex-shrink: 0;
                width: 150px;
                height: 200px;
            }

            .image-container img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            /* Footer */
            footer {
                background-color: #4CAF50;
                color: white;
                text-align: center;
                padding: 1rem 0;
                margin-top: auto;
            }
        </style>
    </head>

    <body>
        <header>
            <h1>Detalle del Libro</h1>
            <div class="header-button">
                <a href="dashboard.php">Inicio</a>
                <a href="metodosPhp/cerrarSesion.php">Salir</a>
            </div>
        </header>

        <div class="container">
            <!-- Contenedor de la imagen -->
            <div class="image-container">
                <img src="<?php echo htmlspecialchars($libro['img']); ?>" alt="Portada del libro">
            </div>

            <!-- Contenedor del texto -->
            <div class="text-container">
                <div class="detail-item">
                    <span>Nombre del Libro:</span> <?php echo htmlspecialchars($libro['nomlibro']); ?>
                </div>
                <div class="detail-item">
                    <span>Autor:</span> <?php echo htmlspecialchars($libro['autor']); ?>
                </div>
                <div class="detail-item">
                    <span>Género:</span> <?php echo htmlspecialchars($libro['genero']); ?>
                </div>
                <div class="detail-item">
                    <span>Cantidad de páginas:</span> <?php echo htmlspecialchars($libro['cantpag']); ?>
                </div>
                <div class="detail-item">
                    <span>Descripción:</span> <?php echo htmlspecialchars($libro['reseña']); ?>
                </div>

                <div class="btn-container">
                    <a href="carga_libros.php" class="btn-back">Atrás</a>
                </div>
            </div>
        </div>

        <footer>
            <p>&copy; 2024 Sistema de Gestión de Bibliotecas. Todos los derechos reservados.</p>
        </footer>
    </body>

    </html>
<?php
} else {
    header("Location: login.php");
    exit();
}
?>
