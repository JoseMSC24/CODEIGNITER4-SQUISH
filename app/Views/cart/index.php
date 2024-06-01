<?php include(APPPATH . 'Views/layout/header.php'); ?>

<h1 class="my-4">Carrito de Compras</h1>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<ul class="list-group mb-4">
    <?php if (!empty($cart) && is_array($cart)): ?>
        <?php 
            $total = 0;
            foreach ($cart as $item): 
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
        ?>
            <li class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <img src="<?= esc($item['image']) ?>" class="img-thumbnail" alt="<?= esc($item['name']) ?>">
                    </div>
                    <div class="col-md-8">
                        <?= esc($item['name']) ?> - $<?= esc($item['price']) ?> x <?= esc($item['quantity']) ?>
                    </div>
                    <div class="col-md-2">
                        <a href="/cart/remove/<?= $item['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li class="list-group-item">Tu carrito está vacío.</li>
    <?php endif; ?>
</ul>

<?php if (!empty($cart) && is_array($cart)): ?>
    <h3 class="text-right">Total: $<?= number_format($total, 2) ?></h3>
<?php endif; ?>

<a href="/product" class="btn btn-primary">Seguir comprando</a>
<a href="/cart/checkout" class="btn btn-success">Pagar</a>

<?php include(APPPATH . 'Views/layout/footer.php'); ?>
