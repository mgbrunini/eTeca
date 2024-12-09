<?php
session_start();
if (isset($_SESSION['nombre'])) {
    if (isset($_SESSION['usuario_editar'])) {
        $libro = $_SESSION['usuario_editar'];
    } else {
        header("location:carga_libros.php");
        exit();
    }
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Libro</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                align-items: center;
                justify-content: center;
                min-height: 100vh;
            }

            header {
                background-color: #4CAF50;
                color: white;
                width: 100%;
                padding: 1rem 2rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            main {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                padding: 2rem;
            }

            .form-container {
                background-color: white;
                padding: 2rem;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                max-width: 600px;
                width: 100%;
            }

            .form-container h2 {
                margin-bottom: 1.5rem;
                color: #4CAF50;
                text-align: center;
            }

            .form-group {
                margin-bottom: 1.5rem;
                text-align: center;
                /* Centra los elementos dentro del grupo */
            }

            .form-group label {
                display: block;
                font-weight: bold;
                margin-bottom: 0.5rem;
                text-align: left;
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
                /* Centra horizontalmente */
                max-width: 100%;
                max-height: 200px;
                /* Límite de altura */
                border-radius: 4px;
                border: 1px solid #ccc;
            }

            .btn-submit,
            .btn-cancel {
                display: inline-block;
                padding: 0.8rem 1.5rem;
                border: none;
                border-radius: 5px;
                font-size: 1rem;
                font-weight: bold;
                cursor: pointer;
                text-align: center;
                text-decoration: none;
                transition: background-color 0.3s, transform 0.2s;
            }

            .btn-submit {
                background-color: #4CAF50;
                color: white;
                margin-right: 1rem;
            }

            .btn-submit:hover {
                background-color: #45a049;
                transform: scale(1.05);
            }

            .btn-cancel {
                background-color: #f44336;
                color: white;
            }

            .btn-cancel:hover {
                background-color: #d32f2f;
                transform: scale(1.05);
            }

            footer {
                background-color: #4CAF50;
                color: white;
                text-align: center;
                width: 100%;
                padding: 1rem 0;
                margin-top: 2rem;
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
                <h2>Editar Libro</h2>
                <form action="metodosPhp/actualizar_libro.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($libro['id']) ?>">

                    <div class="form-group">
                        <label for="nomlibro">Nombre del libro</label>
                        <input type="text" id="nomlibro" name="nomlibro" value="<?= htmlspecialchars($libro['nomlibro']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="reseña">Reseña</label>
                        <textarea id="reseña" name="reseña" rows="4" required><?= htmlspecialchars($libro['reseña']) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="genero">Género</label>
                        <input type="text" id="genero" name="genero" value="<?= htmlspecialchars($libro['genero']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor</label>
                        <input type="text" id="autor" name="autor" value="<?= htmlspecialchars($libro['autor']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cantpag">Cantidad de páginas</label>
                        <input type="number" id="cantpag" name="cantpag" value="<?= htmlspecialchars($libro['cantpag']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="img">Imagen</label>
                        <input type="file" id="img" name="img" accept="image/*">
                        <img id="preview" src="<?= htmlspecialchars($libro['img']) ?>" alt="Imagen actual">
                    </div>
                    <button type="submit" class="btn-submit">Actualizar Libro</button>
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
                    };
                    reader.readAsDataURL(file);
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