<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>TRAVEX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <!-- TRAVEX alineado completamente a la izquierda -->
        <a class="navbar-brand fw-bold" href="/TRAVEX/public/index.php">TRAVEX</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Menú de navegación a la izquierda -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/TRAVEX/public/index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/TRAVEX/views/categoria.php?accion=categorias">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/TRAVEX/views/calendario.php?accion=calendario">Calendario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/TRAVEX/views/reuniones.php?accion=reuniones">Reuniones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/TRAVEX/views/membresia.php?accion=membresia">Membresia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/TRAVEX/views/reseñas.php?accion=reseñas">Reseñas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/TRAVEX/views/usuarios.php?accion=usuarios">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/TRAVEX/views/esenciales.php?accion=esenciales">Esenciales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/TRAVEX/views/pagos.php?accion=pagos">Pagos</a>
                </li>
            </ul>

            <!-- Botones alineados completamente a la derecha -->
            <div class="d-flex">
                <a href="/TRAVEX/views/login.php" class="btn btn-outline-light rounded-pill px-4 me-2 mb-2">Iniciar Sesión</a>
                <a href="/TRAVEX/views/registro.php" class="btn btn-light text-primary rounded-pill px-4 mb-2">Registrarse</a>
            </div>
        </div>
    </div>
</nav>

    <div class="container mt-4">