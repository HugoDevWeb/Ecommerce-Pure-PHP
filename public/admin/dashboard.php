<?php
require_once(__DIR__ . '/../../bootstrap.php');
redirect_unless_admin();
?>

<?php partial('header', ['title' => 'Dashboard Admin']) ?>

<div class="flex max-w-5xl w-full mx-auto mt-8" >
    <nav class="mr-6 w-48 flex-shrink-0">
        <div class="flex flex-col -my-1">
            <a href="#" class="w-full my-1 text-gray-700">Tableau de bord</a>
            <a href="#" class="w-full my-1 text-gray-700">Lien 1</a>
            <a href="#" class="w-full my-1 text-gray-700">Lien 1</a>
            <a href="#" class="w-full my-1 text-gray-700">Lien 1</a>
            <a href="#" class="w-full my-1 text-gray-700">Lien 1</a>
        </div>
    </nav>

    <main class="bg-white shadow-xl">
        <h1>Tableau de bord</h1>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab corporis debitis ex harum illo inventore molestias nostrum qui,7
            quis quos ratione reprehenderit repudiandae, saepe sequi sint temporibus tenetur veritatis voluptatum?
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aperiam at doloremque earum, eligendi fugiat illo itaque libero molestiae molestias mollitia numquam optio pariatur quia quibusdam quis quod repellat? Eum!
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus asperiores, autem consequatur corporis cum deleniti deserunt eveniet excepturi, facere facilis illo natus neque quasi quidem reiciendis repellendus sapiente vitae! Animi!
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, nihil quidem. Accusantium deleniti eaque earum explicabo officia placeat porro possimus provident qui quia, quis, quo ratione sed tempora ullam veritatis!</p>


    </main>
</div>

<form action="/admin/logout.php" method="post">
    <button>Logout</button>

</form>













<?php partial('footer') ?>
