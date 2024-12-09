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

        main {
            flex: 1;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: #fafafa;
            gap: 2rem;
        }

        .hero-section {
            background: #4CAF50;
            color: white;
            border-radius: 10px;
            padding: 2rem;
            width: 80%;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .hero-section h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .hero-section p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            color: #f1f1f1;
        }

        .cta-button {
            background-color: white;
            color: #4CAF50;
            padding: 1rem 2rem;
            border: 2px solid #4CAF50;
            border-radius: 25px;
            font-size: 1.2rem;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s, color 0.3s;
        }

        .cta-button:hover {
            background-color: #45a049;
            color: white;
            transform: scale(1.1);
        }

        .section-title {
            font-size: 1.6rem;
            margin-bottom: 1.5rem;
            color: #4CAF50;
        }

        .info-cards {
            display: flex;
            gap: 2rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .info-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            width: 250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .info-card:hover {
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
            .hero-section {
                width: 90%;
                padding: 1.5rem;
            }

            .info-cards {
                flex-direction: column;
                gap: 1rem;
            }

            .info-card {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- <header>
        <h1>Sistema de Gestión de Bibliotecas</h1>
        <div class="header-button">
            <a href="login.php">Entrar</a>
        </div>
    </header> -->

    <main>
        <section class="hero-section">
            <h2>Bienvenido al Sistema de Gestión de Bibliotecas</h2>
            <p>Accede a herramientas que te permitirán gestionar libros, usuarios, y mucho más de una forma eficiente y fácil.</p>
            <a href="login.php" class="cta-button">Comenzar</a>
        </section>

        <section>
            <h2 class="section-title">Características Principales</h2>
            <div class="info-cards">
                <div class="info-card">
                    <h3>Fácil Catalogación</h3>
                    <p>Organiza los libros de manera eficiente y categorizada.</p>
                </div>
                <div class="info-card">
                    <h3>Gestión de Préstamos</h3>
                    <p>Controla el registro de préstamos y devoluciones con facilidad.</p>
                </div>
                <div class="info-card">
                    <h3>Consultas Rápidas</h3>
                    <p>Permite a los usuarios buscar y consultar libros de forma sencilla.</p>
                </div>
            </div>
        </section>
    </main>
<!-- 
    <footer>
        <p>&copy; 2024 Sistema de Gestión de Bibliotecas. Todos los derechos reservados.</p>
    </footer> -->

</body>

</html>
