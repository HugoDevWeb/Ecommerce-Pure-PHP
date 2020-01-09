<div class="mb-3 max-w-sm">
    <label for="<?= $name ?>" class="block text-sm px-3 mb-px"><?= $label ?></label>
    <select name="<?= $name ?>" id="<?= $name ?>" class="border focus:border-black px-3 py-1 w-full">
        <?php foreach ($options as $option): ?>
            <option value="<?= $option->id ?>" <?= $option->id == (get_previous_input($name) ?? $model->{$name} ?? null) ? "selected" : "" ?>>
                <?= $option->{$option_key_label} ?>
            </option>
        <?php endforeach ?>
    </select>

   <?= partial("admin_form_error", ["name" => $name]) ?>
</div>