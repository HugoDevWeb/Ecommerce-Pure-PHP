<?php

require_once(__DIR__ . '/../../../bootstrap.php');
redirect_unless_admin();
import("categories");

$categories = get_all_categories();

if (is_post()) {
    validate([
        "category_id" => ["required"],
        "name" => ["required"],
        "description" => ["required"]
    ]);


    $slug = slugify($_POST["name"]);
    var_dump($slug); die();
    $query = pdo()->prepare('INSERT INTO products (name, category_id, description, slug) VALUES(?, ?, ?, "")');
    $query->execute([$_POST['name'], $_POST['category_id'], $_POST["description"]]);

    flash_success("Le produit -{$_POST["name"]}-  a bien été ajouté");
    redirect('/admin/products/index.php');
}

?>





<?php partial('header_admin', ["title" => "Produits"]) ?>

    <h1 class="text-xl mb-4">Ajouter un produit</h1>

    <form action="" method="post">
        <?= partial('admin_input', ["label" => 'Nom', "name" => "name"]) ?>

        <?= partial('admin_textarea', ["label" => 'Description', "name" => "description"]) ?>

        <?= partial('admin_select_model', ["label" => 'Categorie', "name" => "category_id", "options" => $categories, "option_key_label" => 'name']) ?>

        <p class="mt-6 max-w-sm">
            <button class="w-full border py-1">Ajouter</button>
        </p>
    </form>

<?php partial('footer_admin') ?>