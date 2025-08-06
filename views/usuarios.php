<?php
require_once '../config/Database.php';
require_once '../models/Usuarios.php';

$db = new Database();
$conn = $db->connect();
$usuarioModel = new Usuarios($conn);
$usuarios = $usuarioModel->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
</head>
<body class="p-4">

    <h2>Usuarios</h2>

    <!-- Botón para abrir modal agregar -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">
        Agregar Usuario
    </button>

    <!-- Modal agregar usuario -->
    <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" aria-labelledby="modalAgregarUsuarioLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="../controllers/usuariosController.php" method="POST">
            <input type="hidden" name="accion" value="agregar" />
            <div class="modal-header">
              <h5 class="modal-title" id="modalAgregarUsuarioLabel">Agregar Usuario</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
              <div class="row g-3">
                <div class="col-md-6">
                  <input name="username" placeholder="Username" required class="form-control" />
                </div>
                <div class="col-md-6">
                  <input name="password" placeholder="Password" type="password" required class="form-control" />
                </div>
                <div class="col-md-6">
                  <input name="nombre" placeholder="Nombre" required class="form-control" />
                </div>
                <div class="col-md-6">
                  <input name="apellidos" placeholder="Apellidos" required class="form-control" />
                </div>
                <div class="col-md-6">
                  <input name="correo" placeholder="Correo" type="email" class="form-control" />
                </div>
                <div class="col-md-6">
                  <input name="telefono" placeholder="Teléfono" class="form-control" />
                </div>

                <!-- campo ruta_imagen oculto -->
                <input type="hidden" name="ruta_imagen" value="" />

                <div class="col-12">
                  <div class="form-check">
                    <input type="checkbox" name="activo" class="form-check-input" id="activoCheck" />
                    <label for="activoCheck" class="form-check-label">Activo</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Tabla de usuarios -->
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-light">
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u['username']) ?></td>
                <td><?= htmlspecialchars($u['nombre']) ?></td>
                <td><?= htmlspecialchars($u['apellidos']) ?></td>
                <td><?= htmlspecialchars($u['correo']) ?></td>
                <td><?= htmlspecialchars($u['telefono']) ?></td>
                <td><?= $u['activo'] ? 'Sí' : 'No' ?></td>
                <td>
                    <!-- Botón Editar -->
                    <form action="../controllers/usuariosController.php" method="POST" class="d-inline">
                        <input type="hidden" name="accion" value="editar" />
                        <input type="hidden" name="id_usuario" value="<?= $u['id_usuario'] ?>" />
                        <input type="hidden" name="username" value="<?= htmlspecialchars($u['username']) ?>" />
                        <input type="hidden" name="nombre" value="<?= htmlspecialchars($u['nombre']) ?>" />
                        <input type="hidden" name="apellidos" value="<?= htmlspecialchars($u['apellidos']) ?>" />
                        <input type="hidden" name="correo" value="<?= htmlspecialchars($u['correo']) ?>" />
                        <input type="hidden" name="telefono" value="<?= htmlspecialchars($u['telefono']) ?>" />
                        <input type="hidden" name="ruta_imagen" value="<?= htmlspecialchars($u['ruta_imagen']) ?>" />
                        <input type="hidden" name="activo" value="<?= $u['activo'] ?>" />
                        <button class="btn btn-warning btn-sm">Editar</button>
                    </form>

                    <!-- Botón Eliminar -->
                    <a href="../controllers/usuariosController.php?eliminar=<?= $u['id_usuario'] ?>" 
                       class="btn btn-danger btn-sm" 
                       onclick="return confirm('¿Eliminar usuario?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
