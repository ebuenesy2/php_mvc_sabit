// Sayfa yüklendiğinde çalışacak kod
document.addEventListener('DOMContentLoaded', function () {
    // Buton referansını al
    const button = document.getElementById('myButton');
    
    // Butona tıklanınca mesajı değiştir
    button.addEventListener('click', function () {
        alert("tiklama");
    });
});
