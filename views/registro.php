<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Techshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'partials/header.php'; ?>

<section class="my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-header bg-success text-white text-center rounded-top-4">
                    <h2>📝 Crear Cuenta</h2>
                </div>
                <div class="card-body bg-light rounded-bottom-4">
                    <form method="POST" action="../controllers/RegistroController.php">
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-end">Usuario:</label>
                            <div class="col-md-8">
                                <input type="text" name="username" class="form-control" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-end">Contraseña:</label>
                            <div class="col-md-8">
                                <input type="password" name="password" class="form-control" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-end">Nombre:</label>
                            <div class="col-md-8">
                                <input type="text" name="nombre" class="form-control" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-end">Apellidos:</label>
                            <div class="col-md-8">
                                <input type="text" name="apellidos" class="form-control" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-end">Correo:</label>
                            <div class="col-md-8">
                                <input type="email" name="correo" class="form-control" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-end">Teléfono:</label>
                            <div class="col-md-8">
                                <input type="text" name="telefono" class="form-control" />
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-5 rounded-pill">✅ Registrarse</button>
                            <a href="login.php" class="btn btn-outline-secondary px-5 rounded-pill">Volver</a>
                        </div>
                    </form>
                </div>
            </div>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger mt-3 text-center rounded-3 shadow-sm">
                    ❌ Ocurrió un error al registrar. Intenta de nuevo.
                </div>
            <?php elseif (isset($_GET['registro']) && $_GET['registro'] === 'ok'): ?>
                <div class="alert alert-success mt-3 text-center rounded-3 shadow-sm">
                    ✅ Registro exitoso. Ahora puedes iniciar sesión.
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
</body>
</html>
