<?php if (!empty($alert->type) && !empty($alert->message)): ?>
    <div class="alert alert-<?= $alert->type; ?>" role="alert">
        <?= $alert->message; ?>
    </div>
<?php endif; ?>