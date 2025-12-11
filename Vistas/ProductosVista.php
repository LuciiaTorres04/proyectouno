<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - Productos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Tienda</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <span class="nav-link text-white">
                    Bienvenida, <?= $_SESSION["usuarioNombres"]; ?>
                </span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Controladores/LoginControlador.php?logout=1">Salir</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- CONTENIDO -->
    <div class="container mt-5">

        <h2 class="text-center mb-4">Productos disponibles</h2>

        <div class="row">

            <?php foreach ($productos as $prod): ?>

                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">

                        <div class="card-body">
                            <h5 class="card-title"><?= $prod["nombre"]; ?></h5>

                            <!-- Precio -->
                            <p class="card-text">
                                <strong>Precio:</strong> <?= $prod["precio"]; ?> €
                            </p>

                            <!-- Estado -->
                            <?php if ($prod["estado"] == 1): ?>
                                <span class="badge bg-success">Disponible</span>
                            <?php else: ?>
                                <span class="badge bg-danger">No disponible</span>
                            <?php endif; ?>

                            <!-- Botón agregar al carrito -->
                            <?php if ($prod["estado"] == 1): ?>
                                <form action="../Controladores/CarritoController.php" method="POST" class="mt-3">
                                    <input type="hidden" name="producto_id" value="<?= $prod["id"]; ?>">
                                    <button class="btn btn-primary w-100">Añadir al carrito</button>
                                </form>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    </div>


    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        &copy; 2025 Mi Página. Todos los derechos reservados.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>