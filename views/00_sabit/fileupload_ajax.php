<h2>AJAX ile Dosya Yükleme</h2>

<form id="uploadForm">
    <input type="file" name="dosya" required>
    <input type="text" name="aciklama" placeholder="Dosya açıklaması">
    <button type="submit">Yükle</button>
</form>

<div id="sonuc"></div>

<script>
document.getElementById('uploadForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Formun normal gönderimini engelle

    const formData = new FormData(this);

    fetch("<?= base_url('file-upload-post') ?>", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);

        let html = `
            <p><strong>Başlık:</strong> ${data.title}</p>
            <p><strong>Durum:</strong> ${data.status == 1 ? 'Başarılı' : 'Hata'}</p>
            <p><strong>Mesaj:</strong> ${data.msg}</p>
        `;

        if (data.post && data.post.aciklama) {
            html += `<p><strong>Açıklama:</strong> ${data.post.aciklama}</p>`;
        }

        if (data.fileInfo) {
            html += `
                <p><strong>Yüklenen Dosya:</strong> ${data.fileInfo.name}</p>
                <p><strong>Yeni Ad:</strong> ${data.fileInfo.new_name}</p>
                <p><strong>Dosya Türü:</strong> ${data.fileInfo.type}</p>
                <p><strong>Boyut:</strong> ${(data.fileInfo.size / 1024).toFixed(2)} KB</p>
                <p><strong>Dosya Yolu:</strong> ${data.fileInfo.pathUrl}</p>
            `;
            // Görselse önizleme
            if (data.fileInfo.type.startsWith("image/")) {
                html += `<p><img src="${data.fileInfo.fileUrl}" alt="Yüklenen Görsel" style="max-width:200px; margin-top:10px;"></p>`;
            }
        }

        document.getElementById("sonuc").innerHTML = html;
    })
    .catch(error => {
        console.error("Hata oluştu:", error);
        document.getElementById("sonuc").innerText = "Sunucu hatası!";
    });
});
</script>
