<div class="mb-3 max-w-sm">
    <label for="<?= $name ?>" class="block text-sm px-3 mb-px"><?= $label ?></label>
    <textarea name="<?= $name ?>" id="<?= $name ?>"
              class="border focus:border-black px-3 py-1 w-full h-32"²><?= get_previous_input($name) ?? $model->{$name} ?? "" ?></textarea>

    <?= partial("admin_form_error", ["name" => $name]) ?>
</div>