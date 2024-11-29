<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Bibliotecas - Usuarios</title>
    <style>
        /* Estilos previamente definidos */
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
            <a class="btn-create" href="crear_usuario.php">Crear Usuario</a>
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
            <tbody>
                <?php
                include("conexion.php");
                $sql = "SELECT * FROM usuarios";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['nombre']}</td>
                                <td>{$row['correo']}</td>
                                <td>{$row['rol']}</td>
                                <td>
                                    <form action='borrar_usuario.php' method='POST' style='display: inline;'>
                                        <input type='hidden' name='dni' value='{$row['dni']}'>
                                        <button type='submit' class='icon icon-trash'>🗑</button>
                                    </form>
                                    <a href='editar_usuario.php?dni={$row['dni']}' class='icon icon-edit'>✏️</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay usuarios registrados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Bibliotecas</p>
    </footer>
</body>

</html>
