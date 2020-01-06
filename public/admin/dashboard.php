<?php
require_once(__DIR__ . '/../../bootstrap.php');
redirect_unless_admin();
?>

<?php partial('header_admin', ['title' => 'Tableau de bord']) ?>


<h1 class="text-xl mb-4">Tableau de bord</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab corporis debitis ex harum illo inventore molestias
    nostrum qui,7
    quis quos ratione reprehenderit repudiandae, saepe sequi sint temporibus tenetur veritatis voluptatum?
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aperiam at doloremque earum, eligendi fugiat
    illo itaque libero molestiae molestias mollitia numquam optio pariatur quia quibusdam quis quod repellat? Eum!
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus asperiores, autem consequatur corporis cum
    deleniti deserunt eveniet excepturi, facere facilis illo natus neque quasi quidem reiciendis repellendus sapiente
    vitae! Animi!
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, nihil quidem. Accusantium deleniti eaque earum
    explicabo officia placeat porro possimus provident qui quia, quis, quo ratione sed tempora ullam veritatis!</p>


<?php partial('footer_admin') ?>
