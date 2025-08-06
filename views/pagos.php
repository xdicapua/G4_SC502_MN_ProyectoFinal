<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>TRAVEX - Pagos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/styles.css" />
</head>
<body class="d-flex flex-column min-vh-100">

<?php include 'partials/header.php'; ?>

<main class="container mt-5 mb-0 flex-grow-1">
  <h2 class="mb-4 text-center">Formulario de Pago</h2>

  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <form id="formulario-pago">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre del titular</label>
              <input type="text" class="form-control" id="nombre" placeholder="Nombre completo" required />
            </div>

            <div class="mb-3">
              <label for="numeroTarjeta" class="form-label">Número de tarjeta</label>
              <input type="text" class="form-control" id="numeroTarjeta" placeholder="0000 0000 0000 0000" maxlength="19" required />
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="fechaExpiracion" class="form-label">Fecha de expiración</label>
                <input type="text" class="form-control" id="fechaExpiracion" placeholder="MM/AA" maxlength="5" required />
              </div>
              <div class="col-md-6 mb-3">
                <label for="cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cvv" placeholder="123" maxlength="4" required />
              </div>
            </div>

            <div class="mb-3">
              <label for="correo" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="correo" placeholder="tucorreo@ejemplo.com" required />
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
              <h5>Total a pagar: <span class="text-success" id="total-pago">$0</span></h5>
              <button type="submit" class="btn btn-success">Pagar ahora</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Simulación del total desde el backend
  document.addEventListener("DOMContentLoaded", () => {
    const total = localStorage.getItem("totalCarrito") || "125.00";
    document.getElementById("total-pago").textContent = `$${total}`;
  });

  // Prevención de envío real del formulario
  document.getElementById("formulario-pago").addEventListener("submit", (e) => {
    e.preventDefault();
    alert("Pago procesado con éxito. ¡Gracias por tu compra!");
    window.location.href = "index.html";
  });
</script>
<?php include 'partials/footer.php'; ?>
</body>
</html>
