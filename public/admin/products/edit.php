<?php

require_once(__DIR__ . '/../../../bootstrap.php');
redirect_unless_admin();
import("products");
import("categories");



$product = find_product($_GET["slug"]);
$categories = get_all_categories();

if (is_post()) {
    $slug = slugify($_POST["slug"]);

    validate([
        "category_id" => ["required"],
        "slug" => ["required", function() use ($slug) {
            if (find_product_or_null($slug)){
                return "ce nom est déjà utilisé";
            }
        }],
        "name" => ["required"],
        "description" => ["required"]
    ]);


    $query = pdo()->prepare('UPDATE products SET name = ?, description = ?, slug = ?, category_id  = ? WHERE id = ?');
    $query->execute([$_POST['name'], $_POST["description"], $slug, $_POST["category_id"] ,$product->id]);

    flash_success("le produit -{$_POST["name"]}- a bien été modifié");
    redirect("/admin/products/index.php");
}
?>


<?php partial('header_admin', ["title" => "Produits"]) ?>

    <h1 class="text-xl mb-4">Modifier -- <?= $product->name ?> -- </h1>

    <form action="" method="post">
        <?= partial('admin_input', ["label" => 'Nom', "name" => "name", "model" => $product]) ?>
        <?= partial('admin_input', ["label" => 'Nom simplifié (utilisé dans les liens)', "name" => "slug", "model" => $product]) ?>

        <?= partial('admin_textarea', ["label" => 'Description', "name" => "description", "model" => $product]) ?>

        <?= partial('admin_select_model', ["label" => 'Categorie', "name" => "category_id", "model" => $product, "options" => $categories, "option_key_label" => 'name']) ?>

        <p class="mt-6 max-w-sm">
            <button class="w-full border py-1">Modifier</button>
        </p>
    </form>

<?php partial('footer_admin') ?>