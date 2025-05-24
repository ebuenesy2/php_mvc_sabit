<h2>Veri Gönder (AJAX)</h2>
<form id="myForm">
    <input type="text" name="name" placeholder="adinizi yaziniz" required>
    <input type="text" name="surname" placeholder="soyadiniz yaziniz" required>
    <button type="submit">Gönder</button>
</form>

<div id="response"></div>

<script>
document.getElementById('myForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Formun normal submitini engelle

    const form = e.target;
    const formData = new FormData(form);

    // FormData'yı JSON formatına çevir
    let object = {};
    formData.forEach((value, key) => object[key] = value);
    const json = JSON.stringify(object);

    fetch('<?= base_url('form-gonder') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'  // JSON olarak gönderiyoruz
        },
        body: json
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('response').innerHTML = data;
    })
    .catch(error => {
        document.getElementById('response').innerHTML = "Hata: " + error;
    });
});
</script>
