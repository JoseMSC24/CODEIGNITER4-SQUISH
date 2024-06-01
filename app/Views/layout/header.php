<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? 'Squishmallows World' ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/country-state-city@1.1.6"></script>
    <style>
        .navbar-brand img {
            width: 30px;
            margin-right: 5px;
        }
    </style>
</head>
<body class="container">
    <header class="mb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand">
                Squishmallows World
            </a>
            <a class="navbar-brand" href="/product">
                Catálogo
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Cerrar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">
                        <img src="/images/carrito.png" alt="Carrito" style="width: 30px; height: auto;">
                            Carrito
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

<?php if (session()->getFlashdata('welcome')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('welcome') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('info')): ?>
    <div class="alert alert-info">
        <?= session()->getFlashdata('info') ?>
    </div>
<?php endif; ?>
