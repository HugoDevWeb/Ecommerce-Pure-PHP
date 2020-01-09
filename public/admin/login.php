<?php
require_once(__DIR__.'/../../bootstrap.php');


if ($_SESSION['admin'] ?? null) {
    redirect("/admin/dashboard.php");
}

if (is_post()) {
    $query = pdo()->prepare('SELECT * FROM admins WHERE name = ?');
    $query->execute([$_POST['name']]);
    $admin = $query->fetch();

    if ($admin and password_verify($_POST["password"], $admin['password'])){
        $_SESSION['admin'] = $admin;
        redirect('/admin/dashboard.php');
    } else {
        $_SESSION['previous_errors']['credentials'] = 'Identifiants incorrects';
        $_SESSION['previous_inputs']["name"] = $_POST["name"];
        redirect('/admin/login.php');
    }
}

?>





<?php partial('header', ['title' => 'Connexion Admin']) ?>

<div class="w-screen h-screen bg-gray-100 flex justify-center items-center">
    <div class="bg-white shadow-lg p-8">
        <h1 class="text-xl mb-4">Connexion Admin</h1>

        <form action="" method="post">
            <?php if(get_previous_error("category_id")): ?>
                <p class="border border-red-900 w-full bg-red-100 text-red-900 mb-4 p-2">
                    <?= get_previous_error("category_id") ?>
                </p>
            <?php endif ?>

            <p class="mb-3">
                <label for="name" class="block text-sm px-3 mb-px">Nom:</label>
                <input type="text" name="name" autocomplete="false" id="name" required class="border focus:border-black px-3 py-1 w-full"
                value="<?= get_previous_input("name")?>">
            </p>

            <p class="mb-3">
                <label for="password" class="block text-sm px-3 mb-px">Password:</label>
                <input type="password" name="password" id="password" required class="border focus:border-black px-3 py-1 w-full">
            </p>

            <p class="mt-6">
                <button class="w-full border py-1">Connexion</button>
            </p>
        </form>
    </div>



</div>





<?php partial('footer') ?>

