<?php include(APPPATH . 'Views/layout/header.php'); ?>

<h1 class="text-center">Detalles del producto</h1>
<div class="card mx-auto mb-4" style="max-width: 800px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="<?= esc($product['image']) ?>" class="card-img" alt="<?= esc($product['name']) ?>">
        </div>
        <div class="col-md-8">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <h2 class="card-title"><?= esc($product['name']) ?></h2>
                <p class="card-text text-center"><?= esc($product['description']) ?></p>
                <p class="card-text"><strong>Precio:</strong> $<?= esc($product['price']) ?></p>
                <a href="/product" class="btn btn-primary">Volver al Catálogo</a>
                <a href="/cart/add/<?= $product['id'] ?>" class="btn btn-success mt-2">Agregar al Carrito</a>
            </div>
        </div>
    </div>
</div>

<?php include(APPPATH . 'Views/layout/footer.php'); ?>
