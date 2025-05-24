<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Hoş Geldiniz</title>
    <link rel="stylesheet" href="<?= base_url('public/css/index.css') ?>">
</head>
<body>

    <h1>Hoş Geldiniz!  - Index</h1>

   <div class="container">

        <h1>Merhaba, <?= $name ?>!</h1>

        <ul>
            <?php foreach ($users as $user): ?>
                <li><?= $user['id'] ?> - <?= $user['name'] ?></li>
            <?php endforeach; ?>
        </ul>

        
    </div>


</body>
</html>