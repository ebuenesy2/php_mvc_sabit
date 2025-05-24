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

    fetch("<?= base_url('dosya-yukle') ?>", {
        method: "POST",
        body: formData
    })
    .then(response => response.json()) // JSON dönerse
    .then(data => {
        console.log(data);
        document.getElementById("sonuc").innerHTML = `
            <p><strong>Durum:</strong> ${data.status ? 'Başarılı' : 'Hata'}</p>
            <p><strong>Mesaj:</strong> ${data.msg}</p>
            ${data.fileInfo ? `<p><strong>Dosya:</strong> ${data.fileInfo.name}</p>` : ''}
        `;
    })
    .catch(error => {
        console.error("Hata oluştu:", error);
        document.getElementById("sonuc").innerText = "Sunucu hatası!";
    });
});
</script>
