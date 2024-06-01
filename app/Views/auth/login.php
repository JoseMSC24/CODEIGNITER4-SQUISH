<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión - Squishmallows World</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            max-width: 400px;
            margin: auto;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card p-4">
            <h1 class="text-center mb-4">Iniciar Sesión</h1>
            <p class="text-muted text-center mb-4">Bienvenido a Squishmallow World, tu tienda de confianza. Por favor, inicia sesión o regístrate.</p>
            
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <form method="post" action="/login">
                <div class="form-group">
                    <label for="name">Nombre de usuario:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
            </form>
            <p class="text-center mt-3 mb-0">¿No tienes una cuenta? <a href="/register">Regístrate</a></p>
        </div>
    </div>
</body>
</html>
