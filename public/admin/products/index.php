<?php

require_once(__DIR__ . '/../../../bootstrap.php');
redirect_unless_admin();

import("products");

$query = pdo()->query('SELECT * FROM products');
$products = $query->fetchAll(PDO::FETCH_CLASS, Product::class)

?>

<?php partial('header_admin', ["title" => "Produits"]) ?>

<div class="flex items-center mb-4">
    <h1 class="text-xl ">Produits</h1>
    <a href="/admin/products/add.php" class="ml-3 border px-2 py-1 uppercase text-xs">Créer produit</a>
</div>


<?php foreach ($products as $product): ?>
    <div class="mb-6">
        <h2 class="text-lg"> <?= $product->name ?> </h2>
        <p> <?= $product->description ?> </p>
        <div class="-mx-2 flex border-t pt-1 mt-1">
            <a href="/admin/products/edit.php?id=<?= $product->id ?>" class="mx-2">Modifier</a>

            <form method="post" action="/admin/products/delete.php?id=<?= $product->id ?>" >
                <button class="mx-2">Supprimer</button>
            </form>
        </div>
    </div>
<?php endforeach ?>

<?php partial('footer_admin') ?>
