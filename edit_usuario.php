<?php
session_start();

// Verifica si se cargaron los datos del usuario desde la sesión
if (!isset($_SESSION['usuario_editar'])) {
    // Si no hay datos en la sesión, redirige a la página de gestión de usuarios
    header("Location: abmUsuarios.php");
    exit();
}

// Carga los datos del usuario
$usuario = $_SESSION['usuario_editar'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
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
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 500px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4CAF50;
        }

        .btn-submit {
            width: 100%;
            padding: 0.75rem;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            text-align: center;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

        .btn-cancel {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #4CAF50;
            text-decoration: none;
            font-size: 1rem;
        }

        .btn-cancel:hover {
            color: #45a049;
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
            <a href="abmUsuarios.php">Volver</a>
        </div>
    </header>

    <main>
        <div class="form-container">
            <h2>Editar Usuario</h2>
            <form action="metodosPhp/editar_usuario.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($usuario['usuario']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" id="contraseña" name="contraseña" placeholder="Ingresa una nueva contraseña">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" value="<?php echo htmlspecialchars($usuario['apellido']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="text" id="dni" name="dni" value="<?php echo htmlspecialchars($usuario['dni']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($usuario['correo']); ?>" required>
                </div>
                <button type="submit" class="btn-submit">Guardar Cambios</button>
                <a href="abmUsuarios.php" class="btn-cancel">Cancelar</a>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Bibliotecas</p>
    </footer>
</body>

</html>