<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Techshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body onload="mostrarTema();">

<?php include 'partials/header.php'; ?>

<section class="my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-header bg-info text-white text-center rounded-top-4">
                    <h2>🔐 Iniciar Sesión</h2>
                </div>
                <div class="card-body bg-light rounded-bottom-4">
                    <!-- CORREGIDO -->
                    <form method="POST" action="../controllers/LoginController.php">
                        <div class="form-group row my-3 align-items-center">
                            <label class="col-md-5 col-form-label text-end" for="username">
                                🙍‍♂ Usuario:
                            </label>
                            <div class="col-md-7">
                                <input class="form-control rounded-3 shadow-sm" type="text" name="username" id="username" required/>
                            </div>
                        </div>
                        <div class="form-group row my-3 align-items-center">
                            <label class="col-md-5 col-form-label text-end" for="password">
                                🔑 Contraseña:
                            </label>
                            <div class="col-md-7">
                                <input class="form-control rounded-3 shadow-sm" type="password" name="password" id="password" required/>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-info px-4 mx-1 rounded-pill">🔓 Iniciar</button>
                            <!-- CORREGIDO -->
                            <a href="registro.php" class="btn btn-outline-secondary px-4 mx-1 rounded-pill">📝 Registrarse</a>
                            <!-- OPCIONAL: desactivado por ahora
                            <a href="recordar.php" class="btn btn-outline-warning px-4 mx-1 rounded-pill">📧 Recordar</a>
                            -->
                        </div>
                    </form>
                </div>
            </div>

            <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger mt-3 text-center rounded-3 shadow-sm">
                ❗ Usuario o contraseña incorrectos. Intenta de nuevo.
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>

<script>
function mostrarTema() {
    console.log("Tema cargado");
}
</script>

</body>
</html>
