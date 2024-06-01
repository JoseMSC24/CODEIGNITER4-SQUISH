<?php include(APPPATH . 'Views/layout/header.php'); ?>

<h1 class="my-4">Catálogo de Productos</h1>

<?php if (session()->getFlashdata('welcome')): ?>
<?php endif; ?>

<form method="get" action="/product/search">
    <div class="input-group mb-4">
        <input type="text" class="form-control" placeholder="Buscar producto..." name="query" value="<?= esc($query ?? '') ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </div>
</form>

<div class="row">
    <?php if (!empty($products) && is_array($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-img-top-wrapper" style="height: 200px; display: flex; align-items: center; justify-content: center;">
                        <img src="<?= esc($product['image']) ?>" class="img-fluid p-2" style="max-height: 100%; max-width: 100%; object-fit: contain;" alt="<?= esc($product['name']) ?>">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($product['name']) ?></h5>
                        <p class="card-text">Precio: $<?= esc($product['price']) ?></p>
                        <p class="card-text"><?= esc($product['description']) ?></p>
                        <a href="/product/show/<?= $product['id'] ?>" class="btn btn-primary">Ver más...</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12">
            <div class="alert alert-warning" role="alert">
                No hay productos disponibles.
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include(APPPATH . 'Views/layout/footer.php'); ?>
