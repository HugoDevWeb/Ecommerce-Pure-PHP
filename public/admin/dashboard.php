<?php
require_once(__DIR__ . '/../../bootstrap.php');
redirect_unless_admin();
?>

<?php partial('header', ['title' => 'Dashboard Admin']) ?>


<h1>Dashboard Admin</h1>


<form action="/admin/logout.php" method="post">
    <button>Logout</button>

</form>


<?php partial('footer') ?>
