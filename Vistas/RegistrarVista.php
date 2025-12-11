<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Tienda</a>
  </div>
</nav>

<div class="container mt-5">

    <div class="row justify-content-center mt-4">
        <div class="col-md-5">
            <div class="card p-4 shadow-sm">

                <h5 class="card-title text-center mb-3">Registro de Usuario</h5>

                <form action="../Controladores/RegistroControlador.php" method="POST">

                    <!-- NOMBRES -->
                    <div class="mb-3">
                        <label class="form-label">Nombres</label>
                        <input type="text" class="form-control" name="nombres" required>
                    </div>

                    <!-- APELLIDOS -->
                    <div class="mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" required>
                    </div>

                    <!-- DNI -->
                    <div class="mb-3">
                        <label class="form-label">DNI</label>
                        <input type="text" class="form-control" name="dni" required>
                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <!-- CONTRASEÑA -->
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" required>
                    </div>

                    <!-- ESTADO OCULTO -->
                    <input type="hidden" name="estado" value="1">

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Registrarse</button>
                    </div>

                    <?php if (!empty($mensajeRegistro)): ?>
                        <div class="alert alert-success mt-2">
                            <?= $mensajeRegistro ?>
                        </div>
                    <?php endif; ?>

                    <p class="text-center mt-3 mb-0">
                        ¿Ya tienes cuenta? <a href="../Controladores/LoginControlador.php">Inicia sesión</a>
                    </p>

                </form>

            </div>
        </div>
    </div>

</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    &copy; 2025 Mi Página. Todos los derechos reservados.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>