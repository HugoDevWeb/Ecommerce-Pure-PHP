<div class="mb-3 max-w-sm">
    <label for="<?= $name ?>" class="block text-sm px-3 mb-px"><?= $label ?></label>
    <select name="<?= $name ?>" id="<?= $name ?>" class="border focus:border-black px-3 py-1 w-full">
        <?php foreach ($options as $option): ?>
            <option value="<?= $option->id ?>" <?= $option->id == (get_previous_input($name) ?? $model->{$name}) ? "selected" : "" ?>>
                <?= $option->{$option_key_label} ?>
            </option>
        <?php endforeach ?>
    </select>
    <?php if (get_previous_error($name)): ?>
        <p class="border border-red-900 w-full bg-red-100 text-red-900 mb-4 mt-2 p-1">
            <?= get_previous_error($name) ?>
        </p>
    <?php endif ?>
</div>