<?php partial('header', ["title" => "$title - Admin"]) ?>

<?php
import('flash')

?>

<div class="flex max-w-5xl w-full mx-auto mt-8">
    <nav class="mr-6 w-48 flex-shrink-0">
        <div class="-my-1">
            <div class="w-full my-1 py-2 px-3 <?= is_on_page("/admin/dashboard.php") ?  'bg-gray-300' : '' ?>">
                <a href="/admin/dashboard.php" class=" text-gray-700 hover:text-black">Tableau de bord</a>
            </div>

            <div class="w-full my-1 py-2 px-3 <?= is_on_directory("/admin/products") ?  'bg-gray-300' : '' ?>">
                <a href="/admin/products/index.php" class=" text-gray-700 hover:text-black ">Produits</a>
            </div>

            <div class="w-full my-1 py-2 px-3 <?= is_on_page("/admin/stats.php") ?  'bg-gray-300' : '' ?>">
                <a href="/admin/stats.php" class=" text-gray-700 hover:text-black ">Statistiques</a>
            </div>

            <div class="w-full my-1 py-2 px-3">
                <form action="/admin/logout.php" method="post">
                    <button class="text-gray-700 hover:text-black">Logout</button>
                </form>
            </div>


        </div>
    </nav>

    <main class="bg-white shadow-xl p-8 w-full relative">
        <?php if ($flash = get_flash()): ?>
        <div class="absolute right-0">
            <p class="shadow-lg -mt-12 p-3 -mr-3 py-3 max-w-sm <?=$flash['type'] === "success" ? 'bg-green-100 text-green-900' : '' ?>">
                <?= $flash["message"] ?>
            </p>
        </div>
        <?php endif ?>
