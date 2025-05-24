// Sayfa yüklendiğinde çalışacak kod
document.addEventListener('DOMContentLoaded', function () {
    // Buton referansını al
    const button = document.getElementById('myButton');
    const message = document.getElementById('message');

    // Butona tıklanınca mesajı değiştir
    button.addEventListener('click', function () {
        message.textContent = "Butona tıkladınız! 🎉";
        message.style.color = "green";
    });
});
