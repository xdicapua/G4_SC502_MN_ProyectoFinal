<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TRAVEX</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
</head>
<body>

    <header>
        <!-- Aquí puedes poner tu barra de navegación u otro encabezado -->
    </header>

    <div class="container mt-5">
        <h2 class="text-center mb-5">✨ ¡Adquiere el plan que más te guste! ✨</h2>
        <div class="row">
            <!-- Plan Personal -->
            <div class="col-md-6 mb-4">
                <div class="card h-100 d-flex flex-column justify-content-between p-4 shadow-sm">
                    <h4 class="card-title text-center">Plan Personal 👤</h4>
                    <ul class="list-unstyled">
                        <li><strong>💵 Precio:</strong> $9.99/mes</li>
                        <li><strong>🎁 Descuento:</strong> 5% en cada reserva de tour</li>
                        <li><strong>✨ Beneficios:</strong></li>
                        <ul>
                            <li>🎯 Acumulación de puntos canjeables por descuentos</li>
                            <li>⏳ Acceso anticipado a experiencias</li>
                            <li>📞 Soporte prioritario</li>
                            <li>🎉 Regalo de bienvenida</li>
                        </ul>
                    </ul>
                    <div class="text-center mt-auto">
                        <button class="btn btn-info" onclick="adquirirMembresia('Plan Personal')">🛒 Adquirir</button>
                    </div>
                </div>
            </div>

            <!-- Plan Familiar -->
            <div class="col-md-6 mb-4">
                <div class="card h-100 d-flex flex-column justify-content-between p-4 shadow-sm">
                    <h4 class="card-title text-center">Plan Familiar 👨‍👩‍👧‍👦</h4>
                    <ul class="list-unstyled">
                        <li><strong>💵 Precio:</strong> $19.99/mes</li>
                        <li><strong>🎁 Descuento:</strong> 10% en cada tour</li>
                        <li><strong>✨ Beneficios:</strong></li>
                        <ul>
                            <li>👥 Hasta 5 usuarios con acceso individual</li>
                            <li>🔁 Puntos acumulados y compartidos</li>
                            <li>🔄 Cambios sin costo y reservas flexibles</li>
                            <li>📜 Historial de compras y soporte prioritario</li>
                            <li>🎁 Acceso a paquetes y beneficios familiares</li>
                        </ul>
                    </ul>
                    <div class="text-center mt-auto">
                        <button class="btn btn-info" onclick="adquirirMembresia('Plan Familiar')">🛒 Adquirir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="mensajeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="mensajeModalLabel">🎉 Membresía adquirida con éxito</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <p id="mensajeFechaAdquisicion">📅 Fecha de adquisición: </p>
                    <p id="mensajeFechaSiguientePago">🔜 Siguiente pago: </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">✨ Entendido</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function adquirirMembresia(plan) {
            const fechaAdquisicion = new Date();
            const fechaSiguientePago = new Date(fechaAdquisicion);
            fechaSiguientePago.setMonth(fechaSiguientePago.getMonth() + 1);

            document.getElementById('mensajeModalLabel').textContent = '🎉 ' + plan + ' adquirido con éxito';
            document.getElementById('mensajeFechaAdquisicion').textContent = '📅 Fecha de adquisición: ' + fechaAdquisicion.toLocaleDateString();
            document.getElementById('mensajeFechaSiguientePago').textContent = '🔜 Siguiente pago: ' + fechaSiguientePago.toLocaleDateString();

            new bootstrap.Modal(document.getElementById('mensajeModal')).show();
        }
    </script>

    <footer>
        <!-- Aquí puedes colocar el pie de página si lo deseas -->
    </footer>

</body>
</html>