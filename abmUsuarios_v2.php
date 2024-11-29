<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Bibliotecas - Usuarios</title>
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

        table th, table td {
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
                    <th>Email</th>
                    <th>Rol</th>
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
        // Función para agregar un usuario
        function crearUsuario() {
            window.location.href = 'crear_usuario.php'; // Cambia esta URL según sea necesario
        }

        // Función para eliminar un usuario
        function eliminarUsuario(id) {
            if (confirm('¿Estás seguro de eliminar este usuario?')) {
                fetch(`eliminar_usuario.php?id=${id}`, { method: 'POST' })
                    .then(response => response.text())
                    .then(data => {
                        alert(data);
                        cargarUsuarios();
                    });
            }
        }

        // Función para editar un usuario
        function editarUsuario(id) {
            window.location.href = `editar_usuario.php?id=${id}`; // Cambia esta URL según sea necesario
        }

        // Función para cargar los usuarios en la tabla
        function cargarUsuarios() {
            fetch('listar_usuarios.php')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('userTable');
                    tableBody.innerHTML = '';
                    data.forEach(user => {
                        tableBody.innerHTML += `
                            <tr>
                                <td>${user.nombre}</td>
                                <td>${user.email}</td>
                                <td>${user.rol}</td>
                                <td>
                                    <i class="icon icon-edit fas fa-edit" onclick="editarUsuario(${user.id})"></i>
                                    <i class="icon icon-trash fas fa-trash" onclick="eliminarUsuario(${user.id})"></i>
                                </td>
                            </tr>
                        `;
                    });
                });
        }

        // Cargar usuarios al cargar la página
        window.onload = cargarUsuarios;
    </script>
</body>

</html>
