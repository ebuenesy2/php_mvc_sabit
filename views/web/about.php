<h2>AJAX ile Çoklu Dosya Yükleme</h2>

<form id="uploadForm" enctype="multipart/form-data">
    <input type="file" name="dosyalar[]" multiple required>
    <input type="text" name="aciklama" placeholder="Açıklama giriniz">
    <button type="submit">Yükle</button>
</form>

<div id="sonuc"></div>

<script>
document.getElementById('uploadForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch("<?= base_url('dosya-yukle') ?>", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        let html = `<p><strong>Durum:</strong> ${data.status ? 'Başarılı' : 'Hata'}</p>`;
        html += `<p><strong>Mesaj:</strong> ${data.msg}</p>`;

        if (data.fileInfo && Array.isArray(data.fileInfo)) {
            html += "<ul>";
            data.fileInfo.forEach(file => {
                html += `<li>${file.name} (${file.size} byte)</li>`;
            });
            html += "</ul>";
        }

        document.getElementById("sonuc").innerHTML = html;
    })
    .catch(error => {
        console.error("Hata oluştu:", error);
        document.getElementById("sonuc").innerText = "Sunucu hatası!";
    });
});
</script>
