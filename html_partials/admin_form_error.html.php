<?php if (get_previous_error($name)): ?>
    <p class="border border-red-900 w-full bg-red-100 text-red-900 mb-4 mt-2 p-1">
        <?= get_previous_error($name) ?>
    </p>
<?php endif ?>