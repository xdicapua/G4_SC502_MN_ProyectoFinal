<?php
// Puedes usar include para encabezado y pie
include '../views/partials/header.php';
?>

<div class="container mt-5 text-center">

    <!-- Botones arriba -->
    <div class="mb-4">
        <a href="../views/login.php" class="btn btn-primary rounded-pill px-4 me-2 mb-2">Iniciar Sesión</a>
        <a href="../views/registro.php" class="btn btn-outline-secondary rounded-pill px-4 me-2 mb-2">Registrarse</a>
    </div>

    <!-- Título principal -->
    <h1>🌍 Bienvenido a TRAVEX</h1>
    <p>Tu plataforma de turismo, productos y reservas.</p>

    <!-- Otros botones debajo del título -->
    <div class="mb-4">
        <a href="../views/calendario.php" class="btn btn-outline-primary me-2 mb-2">Calendario</a>
        <a href="/travex/views/membresia.php" class="btn btn-outline-primary me-2 mb-2">Membresía</a>
        <a href="/travex/views/reseñas.php" class="btn btn-outline-primary me-2 mb-2">Reseñas</a>
        <a href="/travex/views/usuarios.php" class="btn btn-outline-primary me-2 mb-2">Usuarios</a>
        <a href="/travex/views/reuniones.php" class="btn btn-outline-primary me-2 mb-2">Reuniones</a>
        <a href="../views/categoria.php" class="btn btn-outline-primary me-2 mb-2">Categorías</a>
        <a href="../views/pagos.php" class="btn btn-outline-primary me-2 mb-2">Pagos</a>
        <a href="/travex/views/esenciales.php" class="btn btn-outline-primary me-2 mb-2">Esenciales al Viajar</a>
    </div>

    <!-- Sección de tours y hoteles -->
    <section class="features container py-5">
        <div class="row justify-content-center">
            <div class="col-12 mb-4">
                <h2 class="fw-bold">¡Explora con TRAVEX! 🌟</h2>
                <p class="lead">Tours inolvidables, hoteles cómodos y experiencias únicas te esperan. ¡Empieza tu aventura ahora!</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div style="font-size: 4rem;">🏖️</div>
                <h4>Tours de Ensueño</h4>
                <p>Explora playas paradisíacas, montañas majestuosas y ciudades vibrantes con guías expertos.</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div style="font-size: 4rem;">🏨</div>
                <h4>Hoteles Confortables</h4>
                <p>Hospédate en hoteles con todas las comodidades para que tu viaje sea relajante y placentero.</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div style="font-size: 4rem;">🎉</div>
                <h4>Eventos y Experiencias</h4>
                <p>Participa en eventos exclusivos, festivales y actividades que harán tu viaje inolvidable.</p>
            </div>
        </div>
    </section>
</div>

<?php include '../views/partials/footer.php'; ?>
