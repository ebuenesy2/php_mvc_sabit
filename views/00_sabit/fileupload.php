<h1>View</h1>


<h2>Dosya Yükleme Formu</h2>

<form action="<?= base_url('file-upload-post') ?>" method="POST" enctype="multipart/form-data">
    <label for="surname">Soyadı</label>
    <input type="text" name="surname" value=""> <br><br>
    <input type="file" name="dosya" required>
    <button type="submit">Yükle</button>
</form>