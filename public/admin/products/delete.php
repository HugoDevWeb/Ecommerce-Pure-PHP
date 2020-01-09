<?php

require_once(__DIR__ . '/../../../bootstrap.php');
redirect_unless_admin();
import("products");


if (is_post()){
    $product = find_product($_GET["id"]);

    $query = pdo()->prepare('DELETE FROM products WHERE id= ?');
    $query->execute([$product->id]);

    flash_success("le produit -{$product->name}- a bien été supprimé");
    redirect("/admin/products/index.php");
} else {
    abord_404();
}

