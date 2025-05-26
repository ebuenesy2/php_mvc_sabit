# 📘 PHP MVC Proje Dokümantasyonu

## 📌 Genel Bilgiler

```
Proje Adı     : PHP MVC Yapısı ile Web Uygulaması
Created By    : Ebu Enes Yıldırım
Created At    : 24.05.2025
Versiyon      : v1.0.0
```


## 🗂 Klasör Yapısı

```
├─ index.php               ← Giriş noktası (Front Controller)
├─ router.php              ← Route işlemleri
├─ README.md               ← Genel proje açıklaması
├─ about/                  ← Proje sabit veriler - sql ve resimler

├─ app/
│  ├─ core/                ← Temel sınıflar (BaseController, App, vb.)         
│  ├─ errors/              ← Özel hata sayfaları (404, 500 vs.)
│  ├─ function/            ← Fonksiyonlar ( database kullanımı vs )
│  ├─ router/              ← Route işlemlerinın Kontrolu
      

├─ config/
│  └─ app.php              ← Proje ayarları (site adı vs.)
│  └─ database.php         ← Veritabanı ayarları (db bilgisi, vs.)


├─ controller/             ← Controller sınıfları
│  └─ FileController.php   ← Dosya Kontrolu
│  └─ HomeController.php   ← Anasayfa Kontrolu
│  └─ TestController.php   ← Servis Kontrolu



├─ helpers/                ← Yardımcı fonksiyonlar
│  └─ file_helper.php      ← Dosya İşlemleri ( dosya yükleme / çoklu yükleme vs.)
│  └─ url.php              ← Url Kontrolu Yapıyor ( base_url / path_control )
│  └─ views.php            ← Views Kontrolu - ( Dosya veya Sayfa Kontrolu )

├─ public/                 ← Dış dünyaya açık dizin
│  └─ css/                 ← CSS dosyalar
│  └─ img/                 ← Görsel dosyalar
│  └─ js/                  ← JS dosyalar
│  └─ uploads/             ← Yüklenen dosyalar

├─ view/                   ← Görünümler
│  ├─ admin/               ← Admin paneli görünümleri
│  └─ web/                 ← Web arayüz görünümleri
│  └─ index.php            ← Genel arayüz görünümleri

```


# Changelog

## [1.0.0] - 2025-05-24 - Kıvılcım

### Info
```
- 🎉 Projenin ilk kararlı sürümü yayınlandı.
- 🚀 MVC yapısı kuruldu.
- ✅ Router, Controller ve View sınıfları oluşturuldu.
- Api Servis Yazıldı
```

### Added
```
- Proje temel bileşenleri eklendi.
- [Genel] - Proje Bilgileri
- [Genel] - Config Kullanımı
- [Genel] - Config - Base_Url Kullanımı
- [Genel] - Error Kullanımı
- [Genel] - Function Kullanımı
- [Genel] - Class Kullanımı
- [Genel] - Sayfalandırma
- [Genel] - Mysql Kullanımı
- [Genel] - Cookie Kullanımı
- [Genel] - Session Kullanımı
- [Genel] - Dosya Kullanımı
- [Genel] - Dosya İndirme

- [Genel] - Hata Sayfası - 404 - Sayfa Bulunamadı
- [Genel] - Hata Sayfası - 500 - Veri Tabanı Hatası
- [Genel] - Hata Sayfası - 403 - Yetkisiz Erişim
- [Genel] - Hata Sayfası - 423 - Hesap Askıya Alındı

- [Web] - View Kullanımı - Sayfa Görüntüleme
- [Web] - View Kullanımı - Sabit Css - Js 
- [Web] - View Kullanımı - Sabit Sayfa / Form
- [Web] - View Kullanımı - Ajax - Get / Post
- [Web] - Alert Kullanımı - Alert / SweetAlert / ToastrAlert

- [Api] - Servis Kullanımı

```