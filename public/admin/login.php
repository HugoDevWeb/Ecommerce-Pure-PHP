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

            <?= partial("admin_form_error", ["name" => "credentials"]) ?>

            <?= partial('admin_input', ["label" => 'Nom', "name" => "name"]) ?>

            <?= partial('admin_input', ["type" => "password", "label" => 'Password', "name" => "password"]) ?>


            <p class="mt-6">
                <button class="w-full border py-1">Connexion</button>
            </p>
        </form>
    </div>



</div>





<?php partial('footer') ?>

