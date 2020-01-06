<?php

require_once(__DIR__ . '/../../../bootstrap.php');
redirect_unless_admin();
import("products");
import("flash");

if (is_post()){
    $query = pdo()->prepare("SELECT * FROM products WHERE id= ?");
    $query->setFetchMode(PDO::FETCH_CLASS, Product::class);
    $query->execute([$_GET["id"]]);
    $product = $query->fetch();

    if (! $product){
        abord_404();
    }

    $query = pdo()->prepare('DELETE FROM products WHERE id= ?');
    $query->execute([$product->id]);

    flash_success("le produit a bien été supprimé");
    redirect("/admin/products/index.php");
} else {
    abord_404();
}

