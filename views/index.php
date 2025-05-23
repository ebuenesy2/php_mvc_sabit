<h1>Hoş Geldiniz!  - Index</h1>

<h1>Merhaba <?= htmlspecialchars($name) ?>!</h1>

<ul>
<?php foreach ($users as $user): ?>
    <li><?= $user['id'] ?> - <?= htmlspecialchars($user['name']) ?></li>
<?php endforeach; ?>
</ul>