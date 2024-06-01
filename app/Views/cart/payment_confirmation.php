<!-- app/Views/cart/payment_confirmation.php -->

<?php include(APPPATH . 'Views/layout/header.php'); ?>

<h1 class="my-4">Pago Realizado Correctamente</h1>

<div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
</div>

<a href="/" class="btn btn-primary">Ir al Menú Principal</a>

<?php include(APPPATH . 'Views/layout/footer.php'); ?>
