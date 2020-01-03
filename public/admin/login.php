<?php
require_once('../../bootstrap.php');


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
        $errors["credentials"] = "Identifiant incorrectes";
    }
}

?>


<?php partial('header', ['title' => 'Connexion Admin']) ?>



<h1>Connexion Admin</h1>

<form action="" method="post">
    <?php if(isset($errors['credentials'])): ?>
    <p>
        <?= $errors["credentials"] ?>
    </p>
    <?php endif ?>

    <p>
        <label for="name">Nom:</label>
        <input type="text" name="name" autocomplete="false" id="name" required>
    </p>

    <p>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
    </p>

    <p>
        <button>Connexion</button>
    </p>
</form>



<?php partial('footer') ?>

