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

//
//    $slug = slugify("La gigoteuse trop géniale !! ÉÉÉ");
//    var_dump($slug);
    $query = pdo()->prepare('INSERT INTO products (name, category_id, description, slug) VALUES(?, ?, ?, "")');
    $query->execute([$_POST['name'], $_POST['category_id'], $_POST["description"]]);

    flash_success("Le produit -{$_POST["name"]}-  a bien été ajouté");
    redirect('/admin/products/index.php');
}

?>





<?php partial('header_admin', ["title" => "Produits"]) ?>

    <h1 class="text-xl mb-4">Ajouter un produit</h1>

    <form action="" method="post">
        <div class="mb-3 max-w-sm">
            <label for="name" class="block text-sm px-3 mb-px">Nom:</label>
            <input type="text" name="name" autocomplete="false" id="name"
                   class="border focus:border-black px-3 py-1 w-full"
                   value="<?= get_previous_input("name") ?>" >

            <?php if (get_previous_error("name")): ?>
                <p class="border border-red-900 w-full bg-red-100 text-red-900 mb-4 mt-2 p-1">
                    <?= get_previous_error("name") ?>
                </p>
            <?php endif ?>

        </div>

        <div class="mb-3 max-w-sm">
            <label for="description" class="block text-sm px-3 mb-px">Description:</label>
            <textarea name="description" id="description" class="border focus:border-black px-3 py-1 w-full h-32"><?= get_previous_input('description') ?></textarea>
            <?php if (get_previous_error("description")): ?>
                <p class="border border-red-900 w-full bg-red-100 text-red-900 mb-4 mt-2 p-1">
                    <?= get_previous_error("description") ?>
                </p>
            <?php endif ?>
        </div>

        <div class="mb-3 max-w-sm">
            <label for="category_id" class="block text-sm px-3 mb-px">Catégorie:</label>
            <select name="category_id" id="category_id" class="border focus:border-black px-3 py-1 w-full">
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->id ?>"> <?= $category->name ?></option>
                <?php endforeach ?>
            </select>
            <?php if (get_previous_error("category_id")): ?>
                <p class="border border-red-900 w-full bg-red-100 text-red-900 mb-4 mt-2 p-1">
                    <?= get_previous_error("category_id") ?>
                </p>
            <?php endif ?>
        </div>

        <p class="mt-6 max-w-sm">
            <button class="w-full border py-1">Ajouter</button>
        </p>
    </form>

<?php partial('footer_admin') ?>