- İncelediğiniz proje Laravel Framework versiyon 6.2 olup https://laravel.com/docs/6.x adresinde bulunan gereksimlere sahiptir.
- Projede, döviz kurlarını belli api`lerden okuyup minimum değerlere sahip olanların geri döndürülmesi,
  başka bir kaynaktan veri okumak istendiğinde rahatlıkla geliştirme yapabilmek amaç edililmiştir. Bu işlem "Adapter Pattern" ile sağlanmıştır.
- Projeyi çalıştırmak için aşağıda belirtilen adımlar takip edilir;
    - Proje dosyasına console ekranında locate olunur.
    - php artisan serve komutu çalıştırılır (varsayılan olarak 8000 portunda çalıştıracaktır).
        - Farklı bir portta çalıştırmak için php artisan serve --port=8001 komutu,
        - Ağda bulunan diğer bilgisayarlarda da inceleyebilmek için php artisan --host=0.0.0.0 --port=8001 komutunu çalıştırabilirsiniz.
    - Bir tarayıcı penceresinde varsayılan olarak http://localhost:8000/ bağlanılır. Bu sayfa amaca yönelik yapılan çalışmanın genel bir görüntüsüne erişilir.
- Projenin amaca yönelik yapılan çalışmaları aşağıdaki dosya yollarında incelenebilir.
    - Adaptör sınıflarının implement edeceği sınıf app/Library/ExchangeRate yolunda,
    - Adaptör sınıfları app/Library/ExchangeRate yolunda,
    - Sınıfların kullanıldığı ve response`ların hazırlandığı işlemler app/Http/Controllers/ExchangeRate yolunda,
        - Response`ların belli bir standartta olması için yapılan işlemler app/Http/Helpers/CustomResponseBuilder yolunda,
    - Web görünümü için tanımlanan rotaları app/routes/web.php yolunda,
        - Anasayfanın görsel kısmını oluşturan kodları resources/views/exchange-list.blade.php yolunda,
    - Console görünümü için tanımlamaları routes/console.php yolunda inceleyebilirsiniz.
        - Console görünümü için projeye locate olunur ve php artisan compare-result komutu çalıştırılır.
