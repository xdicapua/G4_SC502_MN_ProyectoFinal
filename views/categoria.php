
<?php
require_once '../config/Database.php';
require_once '../models/Categoria.php';

$db = new Database();
$conn = $db->connect();
$categoriaModel = new Categoria($conn);

$tours = $categoriaModel->obtenerPorTipo('tour');
$hoteles = $categoriaModel->obtenerPorTipo('hotel');
?>

<?php include 'partials/header.php'; ?>

<body class="d-flex flex-column min-vh-100">
<main class="flex-grow-1">
<div class="container mt-5">
    <h2>Categorías de Tours</h2>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAgregarTour">Agregar Categoría</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($tours as $cat): ?>
            <tr>
                <td><?= htmlspecialchars($cat['nombre']) ?></td>
                <td><?= htmlspecialchars($cat['descripcion']) ?></td>
                <td><?= $cat['activo'] ? 'Sí' : 'No' ?></td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditar<?= $cat['id_categoria'] ?>">Editar</button>
                    <a href="../controllers/CategoriaController.php?eliminar=<?= $cat['id_categoria'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta categoría?')">Eliminar</a>
                </td>
            </tr>

            <!-- Modal Editar Tour -->
            <div class="modal fade" id="modalEditar<?= $cat['id_categoria'] ?>" tabindex="-1">
                <div class="modal-dialog">
                    <form action="../controllers/CategoriaController.php" method="post" class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Categoría</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="accion" value="editar">
                            <input type="hidden" name="id" value="<?= $cat['id_categoria'] ?>">
                            <input type="hidden" name="tipo" value="tour">
                            <div class="mb-3">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($cat['nombre']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Descripción</label>
                                <textarea name="descripcion" class="form-control" required><?= htmlspecialchars($cat['descripcion']) ?></textarea>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="activo" <?= $cat['activo'] ? 'checked' : '' ?>>
                                <label class="form-check-label">Activo</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Agregar Tour -->
<div class="modal fade" id="modalAgregarTour" tabindex="-1">
    <div class="modal-dialog">
        <form action="../controllers/CategoriaController.php" method="post" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Categoría de Tour</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="accion" value="agregar">
                <input type="hidden" name="tipo" value="tour">
                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control" required></textarea>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="activo" checked>
                    <label class="form-check-label">Activo</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
    </div>
</div>

<!-- ---------------- HOTELS ---------------- -->

<div class="container mt-5">
    <h2>Categorías de Hoteles</h2>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAgregarHotel">Agregar Categoría</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($hoteles as $cat): ?>
            <tr>
                <td><?= htmlspecialchars($cat['nombre']) ?></td>
                <td><?= htmlspecialchars($cat['descripcion']) ?></td>
                <td><?= $cat['activo'] ? 'Sí' : 'No' ?></td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarHotel<?= $cat['id_categoria'] ?>">Editar</button>
                    <a href="../controllers/CategoriaController.php?eliminar=<?= $cat['id_categoria'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta categoría?')">Eliminar</a>
                </td>
            </tr>

            <!-- Modal Editar Hotel -->
            <div class="modal fade" id="modalEditarHotel<?= $cat['id_categoria'] ?>" tabindex="-1">
                <div class="modal-dialog">
                    <form action="../controllers/CategoriaController.php" method="post" class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Categoría</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="accion" value="editar">
                            <input type="hidden" name="id" value="<?= $cat['id_categoria'] ?>">
                            <input type="hidden" name="tipo" value="hotel">
                            <div class="mb-3">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($cat['nombre']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Descripción</label>
                                <textarea name="descripcion" class="form-control" required><?= htmlspecialchars($cat['descripcion']) ?></textarea>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="activo" <?= $cat['activo'] ? 'checked' : '' ?>>
                                <label class="form-check-label">Activo</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Agregar Hotel -->
<div class="modal fade" id="modalAgregarHotel" tabindex="-1">
    <div class="modal-dialog">
        <form action="../controllers/CategoriaController.php" method="post" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Categoría de Hotel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="accion" value="agregar">
                <input type="hidden" name="tipo" value="hotel">
                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control" required></textarea>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="activo" checked>
                    <label class="form-check-label">Activo</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
    </div>
</div>
</main>
</body>

<?php include 'partials/footer.php'; ?>
