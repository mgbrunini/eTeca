<?php
session_start();
if (isset($_SESSION['nombre'])) {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Gestión de Bibliotecas - Usuarios</title>
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

            main {
                flex: 1;
                padding: 2rem;
                display: flex;
                flex-direction: column;
                gap: 2rem;
            }

            .actions {
                display: flex;
                justify-content: space-between;
                align-items: center;
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

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table th,
            table td {
                text-align: left;
                padding: 10px;
                border-bottom: 1px solid #ddd;
            }

            table th {
                background-color: #f4f4f4;
            }

            .icon {
                cursor: pointer;
                margin: 0 5px;
                color: #666;
            }

            .icon:hover {
                color: #333;
            }

            .icon-trash {
                color: red;
            }

            .icon-edit {
                color: blue;
            }

            footer {
                text-align: center;
                padding: 1rem;
                background-color: #333;
                color: white;
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
            <div class="actions">
                <h2>Gestión de Usuarios</h2>
                <button class="btn-create" onclick="crearUsuario()">Crear Usuario</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="userTable">
                    <!-- Aquí se cargan los usuarios desde la base de datos -->
                </tbody>
            </table>
        </main>

        <footer>
            <p>&copy; 2024 Sistema de Gestión de Bibliotecas</p>
        </footer>

        <script>
            function crearUsuario() {
                window.location.href = 'crear_usuario.php';
            }

            function eliminarUsuario(id) {

                if (confirm('¿Estás seguro de eliminar este usuario?')) {
                    fetch('metodosPhp/borrar_usuario.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `id=${encodeURIComponent(id)}`
                        })
                        .then(response => response.text())
                        .then(data => {
                            // alert(data);
                            cargarUsuarios();
                        })
                        .catch(error => console.error('Error:', error));
                }
            }

            function editarUsuario(id) {
                window.location.href = `metodosPhp/buscar_usuario.php?id=${id}`;
            }

            function cargarUsuarios() {
                fetch('metodosPhp/listar_usuarios.php')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Error al cargar los usuarios');
                        }
                        return response.json();
                    })
                    .then(data => {
                        const tableBody = document.getElementById('userTable');
                        tableBody.innerHTML = '';
                        if (data.length === 0) {
                            tableBody.innerHTML = '<tr><td colspan="4">No se encontraron usuarios</td></tr>';
                        } else {
                            data.forEach(user => {
                                tableBody.innerHTML += `
                                <tr>
                                    <td>${user.nombre}</td>
                                    <td>${user.apellido}</td>
                                    <td>${user.dni}</td>
                                    <td>${user.correo}</td>
                                    <td>
                                        <i class="icon icon-edit fas fa-edit" onclick="editarUsuario(${user.id})"></i>
                                        <i class="icon icon-trash fas fa-trash" onclick="eliminarUsuario('${user.id}')"></i>
                                    </td>
                                </tr>
                            `;
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        const tableBody = document.getElementById('userTable');
                        tableBody.innerHTML = '<tr><td colspan="4">Error al cargar usuarios</td></tr>';
                    });
            }

            window.onload = cargarUsuarios;
        </script>
    </body>

    </html>

<?php

} else {
    header("location:login.php");
}
?>