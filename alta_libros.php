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
            /* Estilos existentes */
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
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;
                padding: 2rem;

            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 1.5rem;
            }

            table th,
            table td {
                border: 1px solid #ddd;
                padding: 0.8rem;
                text-align: center;
            }

            table th {
                background-color: #4CAF50;
                color: white;
            }

            table td .icon {
                cursor: pointer;
                margin: 0 0.5rem;
                font-size: 1.2rem;
                color: #333;
                transition: color 0.2s;
            }

            table td .icon:hover {
                color: #4CAF50;
            }

            footer {
                background-color: #4CAF50;
                color: white;
                text-align: center;
                padding: 1rem 0;
                margin-top: auto;
            }

            .btn-create {
                padding: 0.5rem 1rem;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                text-decoration: none;
                font-size: 1rem;
            }

            .btn-create:hover {
                background-color: #45a049;
            }

            .actions {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                /* Asegúrate de que ocupe todo el ancho disponible */
                margin-bottom: 1rem;
                /* Añade separación con otros elementos */
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
            <div class="actions">
                <h2>Gestión de Libros</h2>
                <button class="btn-create" onclick="crearLibro()">Agregar Libro</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Género</th>
                        <th>Nombre del Libro</th>
                        <th>Autor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="bookTable">
                    <!-- Aquí se cargan los libros desde la base de datos -->
                </tbody>
            </table>
        </div>

        <footer>
            <p>&copy; 2024 Sistema de Gestión de Bibliotecas. Todos los derechos reservados.</p>
        </footer>

        <script>
            function crearLibro() {
                window.location.href = 'crear_libro.php';
            }

            function eliminarLibro(id) {
                if (confirm('¿Estás seguro de eliminar este libro?')) {
                    fetch('metodosPhp/borrar_libro.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `id=${encodeURIComponent(id)}`
                        })
                        .then(response => response.text())
                        .then(data => {
                            cargarLibros();
                        })
                        .catch(error => console.error('Error:', error));
                }
            }

            function editarLibro(id) {
                window.location.href = `metodosPhp/editar_libro.php?id=${id}`;
            }

            function detallesLibro(id) {
                window.location.href = `metodosPhp/detalles_libro.php?id=${id}`;
            }

            function cargarLibros() {
                fetch('metodosPhp/listar_libros.php')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Error al cargar los libros');
                        }
                        return response.json();
                    })
                    .then(data => {
                        const tableBody = document.getElementById('bookTable');
                        tableBody.innerHTML = '';
                        if (data.length === 0) {
                            tableBody.innerHTML = '<tr><td colspan="4">No se encontraron libros</td></tr>';
                        } else {
                            data.forEach(book => {
                                tableBody.innerHTML += `
                                <tr>
                                    <td>${book.genero}</td>
                                    <td>${book.nombre}</td>
                                    <td>${book.autor}</td>
                                    <td>
                                        <i class="icon fas fa-eye" onclick="detallesLibro(${book.id})" title="Detalles"></i>
                                        <i class="icon fas fa-edit" onclick="editarLibro(${book.id})" title="Editar"></i>
                                        <i class="icon fas fa-trash" onclick="eliminarLibro(${book.id})" title="Eliminar"></i>
                                    </td>
                                </tr>
                            `;
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        const tableBody = document.getElementById('bookTable');
                        tableBody.innerHTML = '<tr><td colspan="4">Error al cargar libros</td></tr>';
                    });
            }

            window.onload = cargarLibros;
        </script>
    </body>

    </html>

<?php

} else {
    header("location:login.php");
}
?>