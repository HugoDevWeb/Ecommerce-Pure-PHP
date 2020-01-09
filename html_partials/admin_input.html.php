<div class="mb-3 max-w-sm">
    <label for="<?= $name ?>" class="block text-sm px-3 mb-px"><?= $label ?></label>
    <input type="<?= $type ?? "text" ?>" name="<?= $name ?>" id="<?= $name ?>"
           class="border focus:border-black px-3 py-1 w-full"
           value="<?= get_previous_input($name) ?? $model->{$name} ?? "" ?>">

    <?= partial("admin_form_error", ["name" => $name]) ?>

</div>