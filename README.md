Proje Dokümantasyonu: Online Kitap Mağazası

Genel Bakış
Bu proje, kullanıcıların kitapları tarayabileceği, arama yapabileceği ve satın alabileceği bir online kitap mağazası uygulamasıdır. Uygulama, backend için PHP, 
frontend kısmı için JavaScript ve stil için Bootstrap , css kullanılarak geliştirilmiştir.

Dosya Yapısı

index.php: Kitap mağazasının ana sayfası.
sepetim.php: Alışveriş sepeti sayfası.
php/Cart.php: Sepete kitap ekleme ve çıkarma işlemlerini yönetir.
php/details.php: Belirli bir kitabın detaylı bilgilerini getirir.
php/get_all_books.php: Veritabanındaki tüm kitapları getirir.
php/get_book_details.php: Belirli bir kitabın detaylı bilgilerini getirir.
php/Search.php: Kitap arama işlevini yönetir.
Scripts/main.js: Kitap arama, detayları görüntüleme ve sepeti yönetme işlevlerini içerir.
Scripts/details.js: Belirli bir kitabın detaylı bilgilerini görüntüleme işlevlerini içerir.
Dosya Açıklamaları

index.php

Amaç: Kullanıcıların kitapları arayabileceği ve tüm mevcut kitapları görebileceği ana sayfa.
Ana Özellikler:
Arama işlevi.
Tüm kitapların görüntülenmesi.
Alışveriş sepetine bağlantı içeren navigasyon çubuğu.
Kitap detaylarını görüntülemek için modal.
sepetim.php

Amaç: Kullanıcının alışveriş sepetinde bulunan kitapları görüntüler.
Ana Özellikler:
Sepetteki kitapların listelenmesi.
Sepetteki kitapların toplam fiyatının gösterilmesi.
Kullanıcının kitapları sepetten kaldırmasına olanak sağlar.
php/Cart.php

Amaç: Sepete kitap ekleme ve çıkarma işlemlerini yönetir.
Ana Özellikler:
Kitap ekleme.
Kitap çıkarma.
Sepet verilerini oturumda saklama.
php/details.php

Amaç: Belirli bir kitabın detaylı bilgilerini getirir.
Ana Özellikler:
Kitap ID'sine göre detayları getirir.
Kitap detaylarını JSON formatında döner.
php/get_all_books.php

Amaç: Veritabanındaki tüm kitapları getirir.
Ana Özellikler:
Kitapları getirir.
Kitap verilerini JSON formatında döner.
php/get_book_details.php

Amaç: Belirli bir kitabın detaylı bilgilerini getirir.
Ana Özellikler:
Kitap ID'sine göre detayları getirir.
Kitap detaylarını JSON formatında döner.
php/Search.php

Amaç: Kitap arama işlevini yönetir.
Ana Özellikler:
Başlık veya yazara göre kitap arar.
Arama sonuçlarını JSON formatında döner.
Scripts/main.js

Amaç: Kitap arama, kitap detaylarını görüntüleme ve sepet yönetimi için JavaScript işlevlerini içerir.
Ana Özellikler:
searchBooks(): Kullanıcı girişi temelinde kitap arar.
displayBooks(): Kitapları belirtilen HTML öğesinde görüntüler.
viewDetails(): Belirli bir kitabın detaylarını getirir ve görüntüler.
addToCart(): Kitabı sepete ekler.
updateCartCounter(): Sepet sayacını günceller.
removeFromCart(): Kitabı sepetten çıkarır.
Scripts/details.js

Amaç: Belirli bir kitabın detaylı bilgilerini görüntülemek için JavaScript işlevlerini içerir.
Ana Özellikler:
URL'den kitap ID'sine göre kitap detaylarını getirir.
Kitap detaylarını belirtilen HTML öğesinde görüntüler.
Kitabı sepete ekler.
Veritabanı Yapılandırması

Veritabanı Adı: online_bookstore
Tablolar:
books: Kitap bilgilerini (id, başlık, yazar, fiyat, açıklama ve kapak resmi) saklar.
Bağımlılıklar

Bootstrap: Uygulamanın stilini sağlar.
jQuery: AJAX istekleri yapmak için kullanılır.
PHP: Sunucu tarafı betikleme için kullanılır.
MySQL: Kitap bilgilerini saklamak için kullanılır.

Nasıl Çalıştırılır

Yerel bir sunucu ortamı (örneğin XAMPP, WAMP) kurun.
MySQL veritabanında online_bookstore adında bir veritabanı oluşturun.
Veritabanı şemasını ve verileri online_bookstore veritabanına aktarın.
Proje dosyalarını sunucunun kök dizinine yerleştirin.
Uygulamayı başlatmak için index.php dosyasını bir web tarayıcısında açın.

Notlar

PHP dosyalarındaki veritabanı bağlantı detaylarının yerel sunucu yapılandırmanızla uyumlu olduğundan emin olun.
Uygulama, alışveriş sepetini yönetmek için oturumları kullandığından, PHP yapılandırmanızda oturum desteğinin etkin olduğundan emin olun.



https://github.com/user-attachments/assets/582d1f64-ea01-4265-9771-bfb035822a68




