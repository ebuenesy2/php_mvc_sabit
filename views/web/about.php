<h1>Hoş Geldiniz!  - Web - About</h1>


<!-- örnek: app/Views/upload.php -->
<h2>Dosya Yükleme Formu</h2>

<form action="<?= base_url('dosya-yukle') ?>" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="adinizi yaziniz" > <br><br>
    <input type="file" name="dosya" required> 
    <button type="submit">Yükle</button>
</form>


