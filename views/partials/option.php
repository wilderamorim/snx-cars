<option value="<?= $value ?? null; ?>"<?= (empty($value) ? ' selected disabled hidden' : null); ?>>
    <?= $content ?? 'Selecione...'; ?>
</option>