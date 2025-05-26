<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabit | Sabit Sayfa</title>
    
    <!----- Css ------> 
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/index.css') ?>">  

</head>
<body>
    
    <div class="container">
        <div class="kutu1"></div>
        <div class="kutu2"></div>
    </div>

    <button id="myButton">Bana Tıkla!</button>
    <p id="message"></p>

    <h2>Veri Gönder</h2>
    <form action="<?= base_url('form-gonder') ?>" method="POST">
        <input type="text" name="name" placeholder="adinizi yaziniz">
        <input type="text" name="surname" placeholder="soyadiniz yaziniz">
        <button type="submit">Gönder</button>
    </form>

</body>

<footer>

<!----- JS ------> 
<script src="<?= base_url('public/js/index.js') ?>" ></script>

</footer>

</html>