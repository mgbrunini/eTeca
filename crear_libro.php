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
            /* Estilos generales */
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

            nav a {
                color: white;
                text-decoration: none;
                margin: 0 1rem;
                font-size: 1rem;
            }

            nav a:hover {
                text-decoration: underline;
            }

            .form-container {
                background-color: white;
                padding: 2rem;
                margin: 2rem auto;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                max-width: 600px;
            }

            .form-container h2 {
                margin-bottom: 1rem;
                color: #4CAF50;
            }

            .form-group {
                margin-bottom: 1.5rem;
                text-align: left;
            }

            .form-group label {
                display: block;
                font-weight: bold;
                margin-bottom: 0.5rem;
            }

            .form-group input,
            .form-group textarea {
                width: 100%;
                padding: 0.8rem;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 1rem;
            }

            .form-group textarea {
                resize: vertical;
            }

            .form-group img {
                display: block;
                margin: 1rem auto;
                max-width: 100%;
                max-height: 200px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .btn-submit {
                padding: 0.8rem 1.5rem;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 1rem;
                transition: background-color 0.3s;
            }

            .btn-submit:hover {
                background-color: #45a049;
            }

            .btn-cancel {
                padding: 0.8rem 1.5rem;
                background-color: #f44336;
                color: white;
                border: none;
                border-radius: 4px;
                text-decoration: none;
                font-size: 1rem;
                transition: background-color 0.3s;
                margin-left: 1rem;
            }

            .btn-cancel:hover {
                background-color: #d32f2f;
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
        </style>
    </head>

    <body>
        <header>
            <h1>Sistema de Gestión de Bibliotecas</h1>
            <div class="header-button">
                <a href="carga_libros.php">Volver</a>
            </div>
        </header>

        <main>
            <div class="form-container">
                <h2>Registrar Libro</h2>
                <form action="metodosPhp/guardar_libro.php" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <label for="nombre_libro">Nombre del libro</label>
                        <input type="text" id="nombre_libro" name="nombre_libro" placeholder="Ingresa el nombre del libro" required>
                    </div>
                    <div class="form-group">
                        <label for="resena">Reseña</label>
                        <textarea id="resena" name="resena" rows="4" placeholder="Escribe una breve reseña" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="genero">Género</label>
                        <input type="text" id="genero" name="genero" placeholder="Ingresa el género literario" required>
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor</label>
                        <input type="text" id="autor" name="autor" placeholder="Ingresa el nombre del autor" required>
                    </div>
                    <div class="form-group">
                        <label for="cantidad_paginas">Cantidad de páginas</label>
                        <input type="number" id="cantidad_paginas" name="cantidad_paginas" placeholder="Ingresa la cantidad de páginas" required>
                    </div>
                    <div class="form-group">
                        <label for="img">Portada del libro (imagen)</label>
                        <input type="file" name="img" id="img" accept="image/*" required>
                        <img id="preview" src="#" alt="Previsualización de la portada" style="display: none;">
                    </div>
                    <button type="submit" class="btn-submit">Registrar Libro</button>
                    <a href="carga_libros.php" class="btn-cancel">Cancelar</a>
                </form>
            </div>
        </main>

        <footer>
            <p>&copy; 2024 Sistema de Gestión de Bibliotecas</p>
        </footer>

        <script>
            const imgInput = document.getElementById('img');
            const preview = document.getElementById('preview');

            imgInput.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.src = '#';
                    preview.style.display = 'none';
                }
            });
        </script>
    </body>

    </html>

<?php
} else {
    header("location:login.php");
}
?>
