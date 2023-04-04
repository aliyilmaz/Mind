# Mind nedir?

Mind, geliştiriciler için tasarlanmış PHP kod çerçevesidir. Tasarım desenleri, uygulamalar ve kod çerçeveleri oluşturmak için çeşitli çözümler sunar. 
 
--- 

## Edinme

Mind sınıfını edinmenin iki yolu vardır;

- Mind [deposu](https://github.com/aliyilmaz/Mind/archive/refs/heads/main.zip)
- Project [deposu](https://github.com/aliyilmaz/project/archive/refs/heads/main.zip)

--- 

## Kurulum

##### Mind deposu için:
* Yerel veya web sunucunuzda bulunan proje ana dizinine, edindiğiniz **Zip** dosyası içindeki **src** yolunda yeralan **Mind.php** dosyasını çıkarın.

* **Mind.php** dosyasını **include** ya da **require_once** gibi bir yöntemle projenizin **index.php** dosyasına dahil edin ve **extends** veya **new Mind()** komutu yardımıyla kurulum işlemini tamamlayın. 

```php 
require_once('./Mind.php');
$Mind = new Mind();
```

_**veya**_

```php
require_once('./Mind.php');
class ClassName extends Mind{
    public function __construct($conf = array())
    {
        parent::__construct($conf);
    }
}
```
   

##### Project deposu için:
* Yerel veya web sunucunuzda bulunan proje ana dizinine, edindiğiniz **Zip** dosyası içeriğini olduğu gibi çıkarın.


---

## Veritabanı Ayarları

Veritabanı metotlarını kullanmak için veritabanı bilgilerini sınıf çağrılırken veya **Mind.php** dosyasında tanımlamak gerekir.  


```php
$conf = array(
    'db'=>[
        'drive'     =>  'mysql', // mysql, sqlite, sqlsrv
        'host'      =>  'localhost', // sqlsrv için: www.example.com\\MSSQLSERVER,'.(int)1433
        'dbname'    =>  'mydb', // mydb, app/migration/mydb.sqlite
        'username'  =>  'root',
        'password'  =>  '',
        'charset'   =>  'utf8mb4'
    ]
);
$Mind = new Mind($conf);
```
_**veya**_

```php
private $db =  [
    'drive'     =>  'mysql', // mysql, sqlite, sqlsrv
    'host'      =>  'localhost', // sqlsrv için: www.example.com\\MSSQLSERVER,'.(int)1433
    'dbname'    =>  'mydb', // mydb, app/migration/mydb.sqlite
    'username'  =>  'root',
    'password'  =>  '',
    'charset'   =>  'utf8mb4'
];
```

**Bilgi:**
Mind'ın **5.3.3** sürümü ve üstü versiyonlarında veritabanı bağlantısı zorunluluğu bulunmamaktadır. Eğer Mind'ı, veritabansız kullanmak isterseniz sınıfı çağırırken aşağıdaki örneğe göre kodunuzu güncellemeniz yeterlidir.

```php
$conf = array(
    'db'=>[]
);
$Mind = new Mind($conf);
```

**veya**

```php
$conf = array(
    'db'=>''
);
$Mind = new Mind($conf);
```

---

## Oturum Ayarları
Projeyi kullanan kullanıcıların oturum(`$_SESSION`) dosyalarının barındığı konumu güncellemek için bu ayarı güncelleyebilirsiniz. Varsayılan olarak sunucu geçici dizini kullanılmaktadır. Oturum dosyalarının belirtilen yolda barındırılması için bir dizin yolunu `string` olarak belirtilmeniz yeterlidir. Örneğin: `./session/`.  Dışarıdan erişime izin vermek için `$this->session_path` değişkenine `public` özelliği tanımlanmıştır. 

**Not:** Eğer dizin yoksa oluşturulur.

**Mind.php** içinden:
```php
public $session_path    = null ; // ./session/ or null(system path)
```

**Mind** sınıfını çağırırken:
```php
$Mind = new Mind([
    'db'=>null,
    'session_path'=>'./sessions/'
]);

```

---

## Zaman Dilimi Ayarı

İçeriğin doğru zaman damgasıyla işaretlenebilmesi için zaman dilimini kişiselleştirmek mümkündür. Varsayılan olarak `Europe/Istanbul` tanımlanmıştır. Sınıf dışından erişime izin vermek için `public` özelliği tanımlanmıştır. Daha fazla bilgi için [Desteklenen zaman dilimlerinin listesi](https://secure.php.net/manual/tr/timezones.php) bölümüne bakabilirsiniz.

**Bilgi:** Gerektiği kadar kişiselleştirilmemiş sunucular proje zaman diliminden farklı zaman dilimi kullanabilmektedir, bu kısımda ki yapılan düzenleme farklı sunucularda doğru zaman damgasına sahip olmayı sağlar. 

```php
public $timezone    = 'Europe/Istanbul';
```

---


## Etkin Metotlar

Projenin gerektirdiği temel yöntemler varsayılan olarak etkindir ve aşağıda bilgilerinize sunulmuştur.

-   ob_start()
-   error_reporting(-1)
-   error_reporting(E_ALL) 
-   ini_set('display_errors', 1)   
-   set_time_limit(0)
-   ini_set('memory_limit', '-1')
-   date_default_timezone_set
-   [dbConnect()](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#dbconnect)
-   [request()](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#request)
-   [session_check()](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#session_check)
-   [firewall()](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#firewall)

---

## Etkin Değişkenler

##### public $post

Sınıfın dahil edildiği projede yapılan `$_GET`, `$_POST`, `$_FILES` ve `JSON POST` istekleri, `$this->post` dizi değişkeninde tutulur. Sınıf dışından erişime müsaade etmek için `public` özelliği tanımlanmıştır.

##### public $base_url

**Mind.php** dosyasının içinde bulunduğu klasörün yolu `$this->base_url` değişkeninde tutulur. Sınıf dışından erişime izin vermek için `public` özelliği tanımlanmıştır.

##### public $page_current

Görüntülenmekte olan sayfa yolu `$this->page_current` değişkeninde tutulur. Sınıf dışından erişime izin vermek için `public` özelliği tanımlanmıştır.

##### public $page_back

Önceki sayfa yolu `$this->page_back` değişkeninde tutulur. Sınıf dışından erişime izin vermek için `public` özelliği tanımlanmıştır.

##### public $timezone

Projenin zaman dilimi bu değişkende tutulur, varsayılan olarak `Europe/Istanbul` olarak belirtilmiştir. Sınıf dışından erişime izin vermek için `public` özelliği tanımlanmıştır.

##### public $timestamp

Projenin zaman damgası, **yıl-ay-gün saat:dakika:saniye** biçiminde `$this->timestamp` değişkeninde tutulur. Sınıf dışından erişime izin vermek için `public` özelliği tanımlanmıştır.

##### public $lang

Çoklu dil desteği için ayarların tutulduğu değişkendir, Sınıf dışından erişime izin vermek için `public` özelliği tanımlanmıştır. Söz konusu ayarlar, `table`, `column`, `haystack`, `return`, `lang` sütunlarında taşınır.

##### private $conn

Veritabanı bağlantısının tutulduğu değişkendir. Sınıf sonunda `null` parametresi atanarak bağlantı sonlandırılır. Varsayılan olarak `private` özelliği tanımlanmıştır.

##### public $monitor

Projede gerçekleşen veritabanı sorgularını, katman, hata, rota ve istek hareketlerini tutmaya yarar. Katmanlar `['layer']` anahtarında, rotalar `['route']` anahtarında, sistem hataları `['error']` anahtarında barınır. Sınıf dışından erişime izin vermek için `public` özelliği tanımlanmıştır.

##### public $parent_class

Mind sınıfını kullanan sınıfların, Mind sınıfı içinde oluşturulan CSRF TOKEN'ları kullanmasını mümkün kılmak amacıyla oluşturulmuş bir değişkendir. Mind'ın extends ile eklenip eklenmediğini kontrol etmeye yardım eder.

##### public $conf

Mind sınıfı seçilirken kullanılan kurucu(`__construct`) metoduna belirtilen konfigürasyon bilgileri bu değişkene tanımlanır. Sınıf dışından erişimi engellemek için `public` özelliği tanımlanmıştır.

##### public $error_status

Hata durumlarını `true` veya `false` olarak taşıyan değişkendir, varsayılan olarak `false` belirtilmiştir. Sınıf dışından erişime izin vermek için `public` özelliği tanımlanmıştır.

#### public  $errors

Hata mesajlarının tutulduğu değişkendir, dışarıdan erişime izin vermek için `public` özelliği tanımlanmıştır. 

---

## Metotlar

##### Temel

-   [__construct](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#__construct)
-   [__destruct](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#__destruct)

##### Veritabanı

-   [dbConnect](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#dbConnect)
-   [selectDB](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#selectDB)
-   [dbList](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#dbList)
-   [tableList](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#tableList)
-   [columnList](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#columnList)
-   [dbCreate](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#dbCreate)
-   [tableCreate](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#tableCreate)
-   [columnCreate](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#columnCreate)
-   [dbDelete](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#dbDelete)
-   [tableDelete](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#tableDelete)
-   [columnDelete](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#columnDelete)
-   [dbClear](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#dbClear)
-   [tableClear](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#tableClear)
-   [columnClear](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#columnClear)
-   [insert](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#insert)
-   [update](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#update)
-   [delete](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#delete)
-   [getData](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#getData)
-   [samantha](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#samantha)
-   [theodore](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#theodore)
-   [amelia](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#amelia)
-   [matilda](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#matilda)
-   [do_have](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#do_have)
-   [getId](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#getId)
-   [newId](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#newId)
-   [increments](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#increments)
-   [tableInterpriter](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#tableInterpriter)
-   [backup](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#backup)
-   [restore](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#restore)
-   [pagination](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#pagination)
-   [translate](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#translate)

##### Doğrulayıcı

-   [is_db](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_db)
-   [is_table](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_table)
-   [is_column](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_column)
-   [is_phone](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_phone)
-   [is_date](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_date)
-   [is_email](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_email)
-   [is_type](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_type)
-   [is_size](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_size)
-   [is_color](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_color)
-   [is_url](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_url)
-   [is_http](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_http)
-   [is_https](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_https)
-   [is_json](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_json)
-   [is_age](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_age)
-   [is_iban](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_iban)
-   [is_ipv4](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_ipv4)
-   [is_ipv6](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_ipv6)
-   [is_blood](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_blood)
-   [is_latitude](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_latitude)
-   [is_longitude](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_longitude)
-   [is_coordinate](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_coordinate)
-   [is_distance](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_distance)
-   [is_md5](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_md5)
-   [is_ssl](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_ssl)
-   [is_htmlspecialchars](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_htmlspecialchars)
-   [is_morse](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_morse)
-   [is_binary](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_binary)
-   [is_timecode](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_timecode)
-   [is_browser](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_browser)
-   [is_decimal](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_decimal)
-   [is_isbn](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_isbn)
-   [is_slug](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#is_slug)
-   [timecodeCompare](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#timecodeCompare)
-   [validate](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#validate)

##### Yardımcı

-   [policyMaker](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#policyMaker)
-   [print_pre](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#print_pre)
-   [arraySort](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#arraySort)
-   [info](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#info)
-   [request](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#request)
-   [filter](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#filter)
-   [firewall](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#firewall)
-   [redirect](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#redirect)
-   [permalink](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#permalink)
-   [timeForPeople](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#timeForPeople)
-   [timezones](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#timezones)
-   [languages](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#languages-1)
-   [currencies](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#currencies)
-   [morsealphabet](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#morsealphabet)
-   [session_check](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#session_check)
-   [remoteFileSize](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#remoteFileSize)
-   [addLayer](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#addLayer)
-   [columnSqlMaker](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#columnSqlMaker)
-   [wayMaker](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#wayMaker)
-   [generateToken](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#generateToken)
-   [coordinatesMaker](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#coordinatesMaker)
-   [encodeSize](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#encodeSize)
-   [decodeSize](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#decodeSize)
-   [toSeconds](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#toSeconds)
-   [toTime](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#toTime)
-   [summary](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#summary)
-   [getIPAddress](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#getipaddress)
-   [getLang](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#getlang)
-   [getAddressCode](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#getAddressCode)
-   [addressCodeList](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#addressCodeList)
-   [addressGenerator](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#addressGenerator)
-   [committe](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#committe)

##### Sistem

-   [getOS](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#getOS)
-   [getSoftware](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#getsoftware)
-   [getBrowser](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#getBrowser)
-   [route](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#route)
-   [write](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#write)
-   [upload](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#upload)
-   [download](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#download)
-   [get_contents](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#get_contents)
-   [distanceMeter](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#distanceMeter)
-   [evalContainer](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#evalContainer)
-   [safeContainer](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#safeContainer)
-   [lifetime](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#lifetime-1)
-   [morse_encode](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#morse_encode)
-   [morse_decode](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#morse_decode)
-   [stringToBinary](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#stringtobinary)
-   [binaryToString](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#binarytostring)
-   [hexToBinary](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#hexToBinary)
-   [siyakat_encode](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#siyakat_encode)
-   [siyakat_decode](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#siyakat_decode)
-   [abort](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#abort)
-   [captcha](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#captcha)
-   [rm_r](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#rm_r)
-   [ffsearch](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#ffsearch)
-   [json_encode](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#json_encode)
-   [json_decode](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#json_decode)
-   [saveAs](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#saveAs)
-   [mime_content_type](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#mime_content_type)
-   [popup](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#popup)

---

## __construct()

[Kurulum](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#kurulum) aşamasında belirtilen bilgiler ışığında veri tabanı bağlantısı sağlamak ve [Etkin Metotlar](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#etkin-metotlar) kısmında yeralan metotların etkinleştirilmesi için kullanılır. 

---

## __destruct()

Metotlar içerisinde değişen istek ve durumların akıbetini belirlemek için kullanılır. Ayrıca herhangi bir kısımda hata durumu varsa hata sayfasının görüntülenmesini de sağlar.

---

## dbConnect()

Veritabanı bağlantısı gerçekleştirmek amacıyla kullanılır. `mysql`, `sqlite` ve `sqlsrv` veritabanı türlerini desteklemektedir. Varsayılan olarak `__construct()` içinde çalıştırılarak etkinleştirilmiştir.

kod:
```php
$conf = [
    'db'=>[
        'drive'     =>  'mysql', // mysql, sqlite, sqlsrv
        'host'      =>  'localhost',  // sqlsrv için: www.example.com\\MSSQLSERVER,'.(int)1433
        'dbname'    =>  'mydb', // mydb, app/migration/mydb.sqlite
        'username'  =>  'root',
        'password'  =>  '',
        'charset'   =>  'utf8mb4'
    ]
];
$this->dbConnect($conf);
```

**Bilgi:** Bağlantı bilgilerinin gönderilme zorunluluğu yoktur. Bilgilerin gönderilmemesi durumunda `Mind.php` içinde tanımlanan aşağıdaki bilgiler dikkate alınarak veritabanı bağlantısı gerçekleştirilir.

kod:
```php
private $db             =  [
    'drive'     =>  'mysql', // mysql, sqlite, sqlsrv
    'host'      =>  'localhost',  // sqlsrv için: www.example.com\\MSSQLSERVER,'.(int)1433
    'dbname'    =>  'mydb', // mydb, app/migration/mydb.sqlite
    'username'  =>  'root',
    'password'  =>  '',
    'charset'   =>  'utf8mb4'
];
```
---
## selectDB()

[Kurulum](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#kurulum) aşamasında belirtilen kullanıcının yetkili olduğu veritabanını seçmek için kullanılır. Veritabanı adı `string` olarak belirtilmelidir.

kod:
```php
$this->selectDB('blog');
$this->print_pre($this->getData('users', array('limit'=>array('end'=>2))));
```

çıktı:
```php
Array
(
    [0] => Array
        (
            [id] => 1
            [username] => aliyilmaz
            [password] => e10adc3949ba59abbe56e057f20f883e
            [email] => ali@example.com
            [lang] => TR
            [created_at] => 2021-08-25 18:51:56
            [updated_at] => 2021-08-30 23:50:12
            [status] => 1
        )

    [1] => Array
        (
            [id] => 2
            [username] => denizyilmaz
            [password] => e10adc3949ba59abbe56e057f20f883e
            [email] => deniz@example.com
            [lang] => EN
            [created_at] => 2021-08-25 18:51:56
            [updated_at] => 2021-10-08 19:36:57
            [status] => 1
        )

)
```

---

## dbList()

[Kurulum](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#kurulum) aşamasında belirtilen kullanıcının yetkilendirildiği veritabanlarını listelemek amacıyla kullanılır. Veritabanları `array` olarak geri döndürülür.

kod:
```php
$this->print_pre($this->dbList());
```

çıktı:
```php
Array
(
    [0] => blog
    [1] => information_schema
    [2] => irfanli
    [3] => mydb
    [4] => mysql
    [5] => newblog
    [6] => performance_schema
    [7] => phpmyadmin
    [8] => test
)
```
---

## tableList()

Belirtilen veritabanına ait tabloları listelemek için kullanılır. Veritabanı adı `string` olarak belirtilmelidir. Sonuçlar dizi olarak geri döndürülür.

kod:
```php
$this->print_pre($this->tableList('blog'));
```

çıktı:
```php
Array
(
    [0] => categories
    [1] => contents
    [2] => menu
    [3] => products
    [4] => settings
    [5] => translations
    [6] => users
)
```

---

## columnList()

Belirtilen veritabanı tablosuna ait sütunları listelemek amacıyla kullanılır. Veritabanı tablo adı `string` olarak belirtilmelidir. Sütunlar dizi olarak geri döndürülür.

kod:
```php
$this->print_pre($this->columnList('translations'));
```

çıktı:
```php
Array
(
    [0] => id
    [1] => name
    [2] => text
    [3] => lang
    [4] => user_id
    [5] => _token
    [6] => status
    [7] => created_at
    [8] => updated_at
)
```

---

## dbCreate()

Yeni bir veya daha fazla veritabanı oluşturmak amacıyla kullanılır. Oluşturulacak veritabanı isimleri `string` veya `array` olarak gönderilebilir. İşlem başarılıysa `true`, başarılı değilse `false` yanıtı döndürülür. Eğer projeye tanımlanan veritabanı adı `dbCreate()` metoduna gönderilmişse, oluşturulduktan sonra o veritabanı seçilir.


kod:
```php
$this->dbCreate('mydb');
```

çıktı:
```php
Veritabanı oluşturuldu.
```

_**veya**_


kod:
```php
$this->dbCreate(array('mydb','mydb1'));
```

çıktı:
```php
Veritabanları oluşturulamadı.
```

---

## tableCreate()

Yeni bir veritabanı tablosu oluşturmak amacıyla kullanılır. İşlem başarılıysa `true`, değilse `false` yanıtı döndürülür. 


##### Özellikler

-   int - (`int`)
-   decimal - (`decimal`)
-   string - (`varchar`)
-   small - (`text`)
-   medium - (`mediumtext`)
-   large - (`longtext`)
-   increments - (`auto_increment`)

##### Örnek
```php
$scheme = array(
    'id:increments',
    'username:small',
    'password',
    'address:medium',
    'about:large',
    'amount:decimal@6,2',
    'title:string@120',
    'age:int'
);
$this->tableCreate('phonebook', $scheme);
```
**Bilgi:** Bir sütun oluşturma hakkında daha fazla bilgi için [columnCreate](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#columnCreate) metotuna bakın.

---

## columnCreate()

Veritabanı tablosunda bir veya daha fazla sütun oluşturmak amacıyla kullanılır, Sütun adı ve özelliği `array` olarak gönderilebilir. İşlem başarılıysa `true`, değilse `false` yanıtı döndürülür. 

##### Özellikler

-   int - (`int`)
-   decimal - (`decimal`)
-   string - (`varchar`)
-   small - (`text`)
-   medium - (`mediumtext`)
-   large - (`longtext`)
-   increments - (`auto_increment`)

#### Örnek
```php
$scheme = array(
    'id:increments',
    'username:small',
    'password',
    'address:medium',
    'about:large',
    'amount:decimal@6,2',
    'title:string@120',
    'age:int'
);
$this->columnCreate('phonebook', $scheme);
```

#### int

Sayıları tutmak için kullanılır. 3 parametre alır. `number`:`int`@`11` ilk parametre sütun adıdır. ikinci parametre sütun türüdür. Üçüncü parametre sütun değerlerinin maksimum limitidir. Üçüncü parametre zorunlu değildir, eğer belirtilmezse varsayılan olarak `11` değerini alır.

##### Örnek
```php
$scheme = array(
    'number:int@12'
);
$this->columnCreate('phonebook', $scheme);
```
veya
```php
$scheme = array(
    'number:int'
);
$this->columnCreate('phonebook', $scheme);
 ```
 
#### decimal
 
Parasal değerleri tutmak için kullanılır, 3 parametre alır. `amount`:`decimal`@`6,2` ilk parametre sütun adıdır. İkinci parametre sütun türüdür. Üçüncü parametreyse sütunun aldığı değerdir.  Üçüncü parametre zorunlu değildir, eğer belirtilmezse varsayılan olarak `6,2` değerini alır.
 
##### Örnek
```php 
$scheme = array(
    'amount:decimal@6,2'
);
$this->columnCreate('phonebook', $scheme);
```     
veya
```php 
$scheme = array(
    'amount:decimal'
);
$this->columnCreate('phonebook', $scheme);
```
#### string (varchar)

Belirtilen karakter uzunluğuna sahip string veri tutmak için kullanılır. 3 parametre alır. `title`:`string`@`120` ilk parametre sütun adıdır. İkinci parametre sütun türüdür. Üçüncü parametreyse sütunun taşıyacağı string değerin maksimum karakter sayısını temsil etmektedir. Üçüncü parametre zorunlu değildir, eğer belirtilmezse varsayılan olarak `255` değerini alır.

##### Örnek
```php
$scheme = array(
    'title:string@120'
);
$this->columnCreate('phonebook', $scheme);
```
  veya
```php
$scheme = array(
    'title:string'
);
$this->columnCreate('phonebook', $scheme);
```
#### small (text)

`65535` karakterlik string yapıda ki veriyi tutmak amacıyla kullanılır. 2 parametre alır. `content`:`small` ilk parametre sütunun adı, ikinci parametre sütunun türüdür. İkinci parametre zorunlu değildir. Eğer ikinci parametre belirtilmezse sütun varsayılan olarak `small` türünü alır.

##### Örnek
```php
$scheme = array(
    'content:small'
);
$this->columnCreate('phonebook', $scheme);
``` 
  veya
```php
$scheme = array(
    'content'
);
$this->columnCreate('phonebook', $scheme);
```

#### medium (mediumtext)

`16777215` karakterlik string yapıda ki veriyi tutmak amacıyla kullanılır. 2 parametre alır. `description`:`medium` ilk parametre sütun adı, ikinci parametre sütun türüdür. Her iki parametrenin de belirtilme zorunluluğu bulunmaktadır.


##### Örnek
```php
$scheme = array(
    'description:medium'
);
$this->columnCreate('phonebook', $scheme);
```
#### large (longtext)

`4294967295` karakterlik string yapıda ki veriyi tutmak amacıyla kullanılır. 2 parametre alır. `content`:`large` ilk parametre sütun adı, ikinci parametre sütun türüdür. Her iki parametrenin de belirtilme zorunluluğu bulunmaktadır.

##### Örnek
```php
$scheme = array(
    'content:large'
);
$this->columnCreate('phonebook', $scheme);     
```
#### increments (auto_increment)

Veritabanı tablosuna her eklenen kaydın otomatik artan bir numaraya sahip olması amacıyla kullanılır. 3 parametre alır. `id`:`increments`@`11` ilk parametre sütun adıdır. İkinci parametre sütun türüdür. Üçüncü parametreyse artışın basamaksal maksimum limitini temsil etmektedir. Üçüncü parametre zorunlu değildir, eğer belirtilmezse varsayılan olarak `11` değerini alır.

##### Örnek
```php
$scheme = array(
    'id:increments@12'
);
$this->columnCreate('phonebook', $scheme);
```    
  veya
```php   
$scheme = array(
    'id:increments'
);
$this->columnCreate('phonebook', $scheme);
```
---

## dbDelete()

Bir veya daha fazla veritabanını silmek amacıyla kullanılır, `mydb0` ve `mydb1` veritabanı adlarını temsil etmektedir, `string` veya `array` olarak veritabanı isimleri gönderildiğinde veritabanı silme işlemi gerçekleşir. İşlem başarılıysa `true`, değilse `false` yanıtı döndürülür.

##### Örnek
```php
$this->dbDelete('mydb0');
```
veya
```php
$this->dbDelete(array('mydb0','mydb1'));
```
---

## tableDelete()

Bir veya daha fazla veritabanı tablosunu silmek amacıyla kullanılır, `my_table0` ve `my_table1` veritabanı tablo isimlerini temsil etmektedir, `string` veya `array` olarak tablo isimleri gönderildiğinde silme işlemi gerçekleşir. İşlem başarılıysa `true`, değilse `false` yanıtı döndürülür.

##### Örnek
```php
$this->tableDelete('my_table0');
```
veya
```php
$this->tableDelete(array('my_table0', 'my_table1'));
```
---

## columnDelete()

Veritabanı tablosunda bulunan bir veya daha fazla sütunu silmek için kullanılır. `users` tablo adını, `username` ve `password` silinmesi istenen sütunları temsil eder. `string` veya `array` olarak sütun isimleri gönderildiğinde silme işlemi gerçekleşir. İşlem başarılıysa `true`, değilse `false` yanıtı döndürülür.

users:
```php
$columns = [
    'id',
    'username',
    'password',
    'email',
    'status',
    'created_at',
    'updated_at'
];
```


kod:
```php
$this->columnDelete('users', 'username');
```

çıktı:
```php
Array
(
    [0] => id
    [1] => password
    [2] => email
    [3] => status
    [4] => created_at
    [5] => updated_at
)
```

kod:
```php
$this->columnDelete('users', array('username', 'password'));
```

çıktı:
```php
Array
(
    [0] => id
    [1] => email
    [2] => status
    [3] => created_at
    [4] => updated_at
)
```


---

## dbClear()

Bir veya daha fazla veritabanı içeriğini (auto_increment değerleri dahil) silmek amacıyla kullanılır, `mydb0` ve `mydb1` veritabanı adlarını temsil etmektedir. Veritabanı isimleri `string` veya `array` olarak gönderildiğinde silme işlemi gerçekleşir. İşlem başarılıysa `true`, değilse `false` yanıtı döndürülür.

##### Örnek
```php
$this->dbClear('mydb0');
```
veya
```php
$this->dbClear(array('mydb0','mydb1'));
```

---

## tableClear()

Bir veya daha fazla veritabanı tablosu içindeki kayıtların tamamını(auto_increment değerleri dahil) silmek amacıyla kullanılır. Veritabanı tablo isimleri `string` veya `array` olarak gönderilebilir. `my_table0` ve `my_table1` veritabanı tablo isimlerini temsil etmektedir. İşlem başarılıysa `true`, değilse `false` yanıtı döndürülür.

##### Örnek

```php
$this->tableClear('my_table0');
```
veya
```php
$this->tableClear(array('my_table0', 'my_table1'));
```
---

## columnClear()

Bir veritabanı tablosunda bulunan bir veya daha fazla sütuna ait kayıtların tamamını silmek amacıyla kullanılır. `string` veya `array` olarak sütun isimleri gönderilebilir. `username` ve `password` sütun isimlerini temsil eder. İşlem başarılıysa `true`, değilse `false` yanıtı döndürülür.

##### Örnek

```php
$this->columnClear('username');
```
veya
```php
$this->columnClear(array('username', 'password'));
```
    
---

## insert()

Veritabanı tablosuna bir veya daha fazla kayıt eklemek amacıyla kullanılır. 3 parametre alır, ilk parametre veritabanı tablo adı, ikincisi verilerin bulunduğu `array` veya `array`'ler içindir. 3'ncü parametre ise `trigger` yani tetikleyici görevleri içindir ve kullanım şekli aşağıda bilgilerinize sunulmuştur. Tüm işlem(ler) başarılıysa `true`, değilse `false` yanıtı döndürülür.

##### Örnek
```php
$values = array(
    'title'     => 'test user',
    'content'   => '123456',
    'tag'       => 'test@mail.com'
);
$query = $this->insert('my_table', $values);

if($query){
    // true
} else {
    // false
}
```
veya
```php
$values = array(
    array(
        'name'        => 'Ali Yılmaz',
        'phone'       => '10101010101',
        'email'       => 'aliyilmaz.work@gmail.com',
        'created_at'  =>  date('d-m-Y H:i:s')
    ),
    array(
        'name'        => 'Deniz Yılmaz',
        'phone'       => '20202020202',
        'email'       => 'deniz@gmail.com',
        'created_at'  =>  date('d-m-Y H:i:s')
    ),
    array(
        'name'        => 'Hasan Yılmaz',
        'phone'       => '30303030303',
        'email'       => 'hasan@gmail.com',
        'created_at'  =>  date('d-m-Y H:i:s')
    )
)
$query = $this->insert('my_table', $values);

if($query){
    // true
} else {
    // false
}
```
veya
```php
$values = array(
    'username' => 'aliyilmaz1',
    'password' => '1111111111'
);
$trigger = array(
    'users' => array(
        'username' => 'aliyilmaz2',
        'password' => '2222222222'
    ),
    'log' => array(
        'data' => 'test'
    )
);
$query = $this->insert('users', $values, $trigger);

if($query){
    // true
} else {
    // false
}
```
veya 
```php
$values = array(
    'username' => 'aliyilmaz1',
    'password' => '1111111111'
);
$trigger = array(
    'users'=>array(
        array(
            'username' => 'ali1',
            'password' => 'pass1'
        ),
        array(
            'username' => 'ali2',
            'password' => 'pass2'
        )
    ),
    'log'=>array(
        'data' => 'test'
    )
);
$query = $this->insert('users', $values, $trigger);

if($query){
    // true
} else {
    // false
}
```
---

## update()

Veritabanı tablosunda bulunan bir kaydı güncellemek amacıyla kullanılır. `my_table` veritabanı tablo adını temsil eder. `title`, `content` ve `tag` ise `my_table` tablosu içinde ki sütunları temsil eder. `17` güncellenmesi istenen kaydın `id`'sini temsil eder. 

Yeni değerler `array` şeklinde gönderildiğinde güncelleme işlemi gerçekleşir. `id` parametresini `auto_increment` özelliği tanımlanmayan bir sütunda aramak için sütun adını 4'ncü parametre de belirtmek gerekir. İşlem başarılıysa `true`, değilse `false` yanıtı döndürülür.

##### Örnek
```php
$values = array(
    'title'   => 'test user',
    'content' => '123456',
    'tag'     => 'example@mail.com'
);
$query = $this->update('my_table', $values,17);

if($query){
    // true
} else {
    // false
}
```
veya
```php
$values = array(
    'title'   => 'test user',
    'content' => '123456',
    'tag'     => 'example@mail.com'
);
$query = $this->update('my_table', $values,'test user', 'title');

if($query){
    // true
} else {
    // false
}
```
---

## delete()

Veritabanı tablosunda bulunan bir veya daha fazla kaydı silmek amacıyla kullanılır. Bu silme işlemini yaparken başka tablolarda kayıt silmesi de mümkündür. Geliştirici alışkanlıklarına göre çeşitli kullanım şekiller sunar. İşlem başarılıysa `true`, değilse `false` yanıtı döndürülür.

#### auto_increment değer(ler)i göndererek kayıt(ları) silmek

Bu kullanım şeklinde, auto_increment özelliği tanımlanmış bir sütunda belirtilen parametre(ler) aranır ve bulunan kayıtlar silinir, tablo adı ve parametre(ler) belirtmek zorunludur. 3'ncü parametrede belirtilen `boolean` türündeki değer, parametrenin varlığına bakmaksızın silmeye zorlar. İşlem başarılıysa `true`, değilse `false` yanıtı döndürülür.

##### Örnek

```php
if($this->delete('users', 73)){
    // true
} else {
    // false
}
```
veya
```php
if($this->delete('users', 66, true)){
    // true
} else {
    // false
}
```
veya

```php
$query = $this->delete('users', array(74,75));

if($query){
    // true
} else {
    // false
}
```
veya 
```php
$query = $this->delete('users', array(76,77), true);

if($query){
    // true
} else {
    // false
}
```

#### Sütun adı belirterek kayıt(ları) silmek
Bu kullanım şeklinde, `auto_increment` özelliği tanımlanmayan bir sütunda parametre(ler) aranır, bulunan kayıt(lar) silinir. Sütun adını 3'ncü parametrede belirtmek gerekir. 4'ncü parametrede belirtilen `boolean` türündeki değer, parametrenin varlığına bakmaksızın silmeye zorlar. İşlem başarılıysa `true`, değilse `false` yanıtı döndürülür.

##### Örnek
```php
$query = $this->delete('users', 'fikret', 'username');

if($query){
    // true
} else {
    // false
}
```
veya 
```php
$query = $this->delete('users', 'fikret', 'username', true);

if($query){
    // true
} else {
    // false
}
```
veya
```php
$query = $this->delete('users', array('julide', 'Fatih'), 'username');

if($query){
    // true
} else {
    // false
}
```
veya
```php
$query = $this->delete('users', array('julide', 'Fatih'), 'username', true);

if($query){
    // true
} else {
    // false
}
```


#### Bağlantılı kayıtlarla birlikte silmek
Söz konusu parametreyi taşıyan başka tablo sütunları varsa bu tablo ve sütun isimlerinin belirtilmesi halinde, eşleşen ilintili kayıtların silinmesi sağlanır. Aşağıdaki kullanım şekline göre 4 ve 5'nci parametrede belirtilen `boolean` türündeki değer, parametrenin varlığına bakmaksızın silmeye zorlar. İşlem başarılıysa `true`, değilse `false` yanıtı döndürülür.

##### Örnek
```php
$trigger = array('log'=>'user_id');
$query = $this->delete('users', 1, $trigger)

if($query){
    // true
} else {
    // false
}
```
veya 
```php
$trigger = array('log'=>'user_id');
$query = $this->delete('users', 1, $trigger, true);

if($query){
    // true
} else {
    // false
}
```

veya 

```php
$trigger = array('log'=>'user_id');
$query = $this->delete('users', array(2,3), $trigger);

if($query){
    // true
} else {
    // false
}
```
veya
```php
$trigger = array('log'=>'user_id');
$query = $this->delete('users', array(4,5), $trigger, true);

if($query){
    // true
} else {
    // false
}
```
veya
```php
$trigger = array('log'=>'username');
$query = $this->delete('users', 'Fatih', 'username', $trigger);

if($query){
    // true
} else {
    // false
}
```
veya
```php
$trigger = array('log'=>'username');
$query = $this->delete('users', 'Fatih', 'username', $trigger, true);

if($query){
    // true
} else {
    // false
}    
```
veya
```php
$trigger = array('log'=>'username');
$query = $this->delete('users', array('Fatih','aliyilmaz'), 'username', $trigger);

if($query){
    // true
} else {
    // false
}
```
veya
```php
$trigger = array('log'=>'username');
$query = $this->delete('users', array('Fatih','aliyilmaz'), 'username', $trigger, true);

if($query){
    // true
} else {
    // false
}
```
---

## getData()

Bir veritabanı tablosundaki kayıtları olduğu gibi veya filtreleyerek elde etmek için kullanılır. `my_table` tablo ismini temsil etmektedir, `$options` parametreleri ve kullanım örneklerine aşağıda yer verilmiştir.



#### Tüm kayıtlara ulaşmak

Bir veritabanı tablosunun tüm kayıtlarını elde etmek için kullanılır. Ek bir parametreye ihtiyaç duymadan kullanmak mümkündür, ancak bir kerede çok sayıda veri elde etmek, sunucu ve kullanıcı tarafında bir yük oluşturarak proje performansını düşürebilir.

##### Örnek

```php
$this->print_pre($this->getData('my_table'));
```


#### column: Tablo sütunlarına ulaşmak

Bir veritabanı tablosundaki belirtilen sütun verilerini elde etmek için kullanılır. Tüm sütun verilerini almadığından, daha hafif bir sorgulamaya izin verir. `column`, özelliğin adını, `title` ve `tag`, sütun adlarını temsil eder.

##### Örnek
```php
$options = array(
    'column' => array(
        'title',
        'tag'
    )
);
$this->print_pre($this->getData('my_table', $options));
```
veya
```php
$options = array(
    'column' => 'title'
);
$this->print_pre($this->getData('my_table', $options));
```


#### limit: Kayıt aralığına ulaşmak

Veritabanındaki kayıtları belirtilen limitlere göre elde etmek için kullanılır. `limit`, özelliğin adını, `start` ve `end` alt özellik adlarını temsil eder. Kayıt aralığını elde etmek için `start` ve `end` belirtilmelidir.

##### Örnek
```php
$options = array(
    'limit' => array('start'=>'1', 'end'=>'10')
);
$this->print_pre($this->getData('my_table', $options));
```


#### limit:start Belirtilen miktarda ilk kaydı gözardı etmek

Veritabanı tablosunda bulunan kayıtların ilk eklenenden son eklenene doğru belirtilen sayı kadarının gözardı edilmesi amacıyla kullanılır. `limit` özelliğin adını, `start` gözardı edilecek kayıt miktarını temsil etmektedir.

##### Örnek
```php
$options = array(
    'limit' => array('start' => '2')
);
$this->print_pre($this->getData('my_table', $options));
```


#### limit:end Belirtilen miktar kadar kayda ulaşmak

Veritabanı tablosunda, belirtilen sayı kadar kaydı elde etmek amacıyla kullanılır. `limit` özelliğin adını, `end` elde edilmek istenen kayıt miktarını temsil etmektedir.

##### Örnek
```php
$options = array(
    'limit' => array('end' => '10')
);
$this->print_pre($this->getData('my_table', $options));
```


#### sort: Kayıtları sıralamak

Veritabanı tablosundaki kayıtları belirtilen sütun içeriğine göre küçükten büyüğe veya büyükten küçüğe doğru sıralamak amacıyla kullanılır. `sort` özelliğin adını, `columnname` sıralamanın yapılacağı sütun adını, `ASC` küçükten büyüğe sıralama talebini, `DESC` ise büyükten küçüğe doğru sıralama talebini temsil etmektedir.

##### Örnek
```php
$options = array(
    'sort' => 'columnname:ASC'
);
$this->print_pre($this->getData('my_table', $options));
```
veya
```php
$options = array(
    'sort' => 'columnname:DESC'
);
$this->print_pre($this->getData('my_table', $options));
```


#### search: Arama yapmak

Anahtar kelimeleri bir veritabanı tablosunda aramak için kullanılır. Anahtar kelimeler `string` veya `array` olarak gönderilebilir. `search`, özelliğin adını, `keyword` aranan anahtar kelimeleri temsil eder.   

##### Örnek
```php
$options = array(
    'search' => array(
        'scope'=>'like',
        'keyword' => array(
            'hello world!',
            'merhaba dünya'
        )
    )
);
$this->print_pre($this->getData('my_table', $options));
```
veya
```php
$options = array(
    'search' => array(
        'scope'=>'like',
        'keyword' => 'merhaba dünya'
    )
);
$this->print_pre($this->getData('my_table', $options));
```

#### search: Her yerde aramak

Veritabanı tablosundaki anahtar kelimeleri geniş eşlemeli olarak aramak için kullanılır. Kelimeler `string` veya `array` olarak gönderilebilir. 

Kelime veya kelimeler, `%kelime%` biçiminde belirtilirse cümle içinde geçen `kelime` aranır, eğer belirtilmezse sadece `kelime` değeriyle birebir örtüşen kayıtlar aranır. 

Sonu **kelime**yle biten içeriği aramak için `%kelime`, başı **kelime**yle başlayan içeriği aramak için ise `kelime%`şeklinde bir ifade kullanmak gerekir.

##### Örnek
```php
$options = array(
    'search' => array(
        'scope'=>'like',
        'keyword' => array(
            '%hello world!%',
            '%merhaba dünya'
        )
    )
);
$this->print_pre($this->getData('my_table', $options));
```
veya
```php
$options = array(
    'search' => array(
        'scope'=>'like',
        'keyword' => 'merhaba dünya%'
    )
);
$this->print_pre($this->getData('my_table', $options));
```

#### search:column Sütunlarda aramak

Bir veritabanı tablosunun belirtilen sütunlarını tam veya genel bir eşleme politikası ile aramak için kullanılır, kelimeler ve sütunlar `string` veya `array` olarak gönderilebilir. `column` özellik adını,`id`, `title`, `content` ve `tag` sütun adlarını temsil eder.

##### Örnek
```php
$options = array(
    'search' => array(
        'scope'=>'like',
        'column' => array('id', 'title', 'content', 'tag'),
        'keyword' => array(
            'hello world!',
            'merhaba dünya'
        )
    )
);
$this->print_pre($this->getData('my_table', $options));
```
veya
```php
$options = array(
    'search' => array(
        'scope'=>'like',
        'column' => 'title',
        'keyword' => array(
            'hello world!',
            'merhaba dünya'
        )
    )
);
$this->print_pre($this->getData('my_table', $options));
```

#### search:and Sütuna özel kelime aramak

Kayda ait birden çok sütunda yapılan arama sonuçlarının tümünde bulgu tespit edilmesi halinde, bunların `array` olarak geri döndürülmesini sağlar.

***Bilgi:*** getData:column kısmında sütun tanımlama yapılmışsa bu sütunların içinde aranması istenen sütunlarında olması zorunludur.


##### Örnek
```php
$params = array(
    'username' => 'admin', 
    'password' => 'root'
);
$options = array(
    'search' => array(
        'and' => $params
    )
);
$tblname = 'users';
$this->print_pre($this->getData($tblname, $options));
```
veya
```php
$params = array(
    array(
        'username' => 'admin', 
        'password' => 'root'
    ),
    array(
        'username' => 'user', 
        'password' => 'password'
    )
);
$options = array(
    'search' => array(
        'and' => $params
    )
);
$tblname = 'users';
$this->print_pre($this->getData($tblname, $options));
```


#### search:or Sütuna özel kelime aramak

Kayda ait birden çok sütunda yapılan arama sonuçlarının herhangi birinde bulgu tespit edilmesi halinde, bunların `array` olarak geri döndürülmesini sağlar.

##### Örnek
```php
$params = array(
    'username' => 'admin', 
    'password' => 'root'
);
$options = array(
    'search' => array(
        'or' => $params
    )
);
$tblname = 'users';
$this->print_pre($this->getData($tblname, $options));
```
veya
```php
$params = array(
    array(
        'username' => 'admin', 
        'password' => 'root'
    ),
    array(
        'username' => 'user', 
        'password' => 'password'
    )
);
$options = array(
    'search' => array(
        'or' => $params
    )
);
$tblname = 'users';
$this->print_pre($this->getData($tblname, $options));
```
***Bilgi:*** getData:column kısmında sütun tanımlama yapılmışsa bu sütunların içinde aranması istenen sütunlarında olması zorunludur.


#### search:delimiter Sütuna özel kelime dizisi ayracı

Sütuna özel kelime aramak için kullanılan `search:and` ve `search:or` yöntemlerinde kullanılması amacıyla tasarlanmış özelliktir.


Örneğin `search:and` alt özelliğine çoklu dizi olarak bir şema gönderildiğini varsayalım, bu şema içinde yer alan her bir dizi kümesinin diğer kardeş kümelerle arasına konulması istenen ifade, delimiter özelliğinde belirtilir.

Örneği daha iyi anlamak için, iki kişi arasındaki yazışmaların elde edilmesi amacıyla yazılması icap eden şemayı inceleyebilirsiniz.

```php
$params = array(
    array(
        'sender_id' => '3', 
        'reciver_id' => '15'
    ),
    array(
        'sender_id' => '15', 
        'reciver_id' => '3'
    )
);

$options = array(
    'search' => array(
        'delimiter'=>array(
            'and'=>'OR' //or, OR, and, AND
        ),
        'and' => $params
    )
);
$tblname = 'messages';
$this->print_pre($this->getData($tblname, $options));
```

#### search:scope Özelleştirilebilen hassasiyet

Aramaların, büyük küçük harf fark duyarlılığı olmadan yapılabilmesi için `string` olarak `like` veya `LIKE` parametresi belirtilmelidir. Bu yöntem tercih edildiğinde `%` gibi kapsam ifade eden işaretler gönderilebilir. `scope`  belirtilmez ise büyük küçük harf duyarlılığını gözeterek aramalar yapılır.

****Bilgi:**** Bu özellik `search:and`, `search:or`, `search:delimiter`, `search:keyword` gibi tüm search alt özellikleriyle beraber kullanılabilir.

##### Örnek
```php
$options = array(
    'search'=>array(
        'scope'=>'LIKE', // like veya LIKE
        'keyword'=>'%ali%'
    )
);

$this->print_pre($this->getData('users', $options));
```

veya 

```php
$options = array(
    'search'=>array(
        'keyword'=>'aliyilmaz'
    )
);

$this->print_pre($this->getData('users', $options));
```

#### join: Tabloları eşitleme

Farklı tablolarda bulunan sütunların birbirleriyle eşlenerek sonuçların elde edilmesini sağlar, `INNER JOIN`, `LEFT JOIN`, `RIGHT JOIN`, `FULL OUTER JOIN` eşleme türlerini desteklemekte olup küçük büyük harf duyarlılığı bulunmamaktadır. Kullanım örneği aşağıda bilgilerinize sunulmuştur. `name` eşleme türünü, `tables` eşlenecek tabloları, `primary`, referans tablosundaki sütun karşılığını, `secondary` söz konusu tablodaki sütun karşılığını, `fields` ise görüntülenmesi istenen sütun isimlerini temsil etmektedir. `fields` boş bırakılırsa tüm sütunlar görüntülenir.

##### Örnek

```php
$options = [
    'join'=>[
        'name' => 'INNER JOIN',
        'tables'=>[
            'contents'=>[
                'primary'=>'id',
                'secondary'=>'user_id',
                'fields'=>[
                    'id',
                    'user_id',
                    'title',
                    'content',
                    'created_at',
                    'updated_at'
                ]
            ],
            'categories'=>[
                'primary'=>'id',
                'secondary'=>'user_id',
                'fields'=>[
                    'id',
                    'user_id',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ]
        ]
    ]
];
$this->print_pre($this->getData('users', $options));
```


#### format: Sonuçların formatı

Sonuç çıktı formatlarını belirlemek için kullanılır. Şu an için `array` formatı dışında `json` formatını desteklemektedir.

##### Örnek
```php
$options = array(
    'format' => 'json'
);
$this->print_pre($this->getData('my_table', $options));
```


#### Özelliklerin bir arada kullanımı

`getData()` özelliklerinin bir çoğu birlikte kullanılabilir, bu tür kullanımlar herhangi bir yük oluşturmadığı gibi yüksek performans gerektiren projeler için hayat kurtarıcı olabilirler.

##### Örnek
```php
$options = array(
    'search' => array(
        'column' => array(
            'id',
            'title',
            'content',
            'tag'
        ),
        'keyword' => array(
            'merhaba',
            'hello'
        )
    ),
    'format' => 'json',
    'sort' => 'id:ASC',
    'limit' => array(
        'start' => '1',
        'end' => '5'
    ),
    'column' => array(
        'id',
        'title'
        )
);
$this->print_pre($this->getData('my_table', $options));
```
veya
```php
$options = array(
    'search' => array(
        'and' => array(
            'username' => 'aliyilmaz',
            'password' => '123456'
        )
    ),
    'format' => 'json',
    'sort' => 'id:ASC',
    'limit' => array(
        'start' => '1',
        'end' => '5'
    ),
    'column' => array(
        'username'
        )
);
$this->print_pre($this->getData('users', $options));
```

veya
```php
$options = array(
    'search' => array(
        'or' => array(
            'username' => 'aliyilmaz',
            'password' => '123456'
        )
    ),
    'format' =>'json',
    'sort' => 'id:ASC',
    'limit' => array(
        'start' => '1',
        'end' => '5'
    ),
    'column' => array(
        'username'
        )
);
$this->print_pre($this->getData('users', $options));
```
---

## samantha()

Spike Jonze imzası taşıyan **Her** filminde bulunan `samantha` karakterinden esinlenerek oluşturulmuştur. Sütun adları ve o sütunlarda bakılması istenen veriler belirtildiğinde, bulunan tüm veriler geri döndürülür. Bu işlem sırasında tüm veri kümelerinin hangi sütunları barındırması gerektiği bilgisi, 3'ncü parametre ile belirlenebilir.

#### 3 parametre alır; 

* İlki tablo adının string biçiminde tanımlanabildiği kısımdır ve belirtilmesi zorunludur.

* İkincisi çoklu şartın bir dizi içinde tanımlanabildiği kısımdır ve belirtilmesi zorunludur.

* Üçüncüsü ise görüntülenmesi istenen sütunların string veya dizi biçiminde tanımlanabildiği kısımdır ve belirtilmesi zorunlu değildir.


##### Örnek
```php
// Array
// (
//     [0] => Array
//         (
//             [group_id] => 10
//         )
// )

$this->print_pre($this->samantha('permission', array('user_id'=>15), 'group_id'));
```
veya
```php
// Array
// (
//     [0] => Array
//         (
//             [id] => 208
//             [group_id] => 10
//         )

// )
$this->print_pre($this->samantha('permission', array('user_id'=>15), array('id', 'group_id')));
```
veya
```php
// Array
// (
//     [0] => Array
//         (
//             [id] => 208
//             [user_id] => 15
//             [group_id] => 10
//             [_token] => 
//             [status] => 
//             [created_at] => 
//             [updated_at] => 
//         )

// )

$this->print_pre($this->samantha('permission', array('user_id'=>15)));
```
---


## theodore()

Tıpkı samantha gibi, bu metot da Her filminde hayat bulmuş Theodore Twombly karakterinden esinlenerek oluşturulmuştur. Kesin olarak bir adet olduğu bilinen bir kaydı  bir dizi olarak elde etmek amacıyla kullanılır.

#### 3 parametre alır; 

* İlki tablo adının string biçiminde tanımlanabildiği kısımdır ve belirtilmesi zorunludur.

* İkincisi çoklu şartın bir dizi içinde tanımlanabildiği kısımdır ve belirtilmesi zorunludur.

* Üçüncüsü ise görüntülenmesi istenen sütunların string veya dizi biçiminde tanımlanabildiği kısımdır ve belirtilmesi zorunlu değildir.


##### Örnek
```php
// Array
// (
//     [group_id] => 10
// )

$this->print_pre($this->theodore('permission', array('user_id'=>15), 'group_id'));
```
veya
```php
// Array
// (
//     [id] => 208
//     [group_id] => 10
// )

$this->print_pre($this->theodore('permission', array('user_id'=>15), array('id', 'group_id')));
```
veya
```php
// Array
// (
//     [id] => 208
//     [user_id] => 15
//     [group_id] => 10
//     [_token] => 
//     [status] => 
//     [created_at] => 
//     [updated_at] => 
// )

$this->print_pre($this->theodore('permission', array('user_id'=>15)));
```

---

## amelia()

samantha ve theodore metotlarında olduğu gibi amelia da Her filminden esinlenerek oluşturulmuştur. Görevi sadece bir adet olduğu bilinen bir kaydın belirtilen sütun verisini elde etmek, şartları sağlamadığında ise boş bir yanıt döndürmektedir.

#### 3 parametre alır; 

* İlki tablo adının string biçiminde tanımlanabildiği kısımdır ve belirtilmesi zorunludur.

* İkincisi çoklu şartın bir dizi içinde tanımlanabildiği kısımdır ve belirtilmesi zorunludur.

* Üçüncüsü ise görüntülenmesi istenen sütunun string biçimde tanımlanabildiği kısımdır ve belirtilmesi zorunludur.


##### Örnek
```php
// 208

$this->print_pre($this->amelia('permission', array('user_id'=>15), 'id'));
```
---

## matilda()

1996 yapımı Matilda filminin kurgusal karakteri olan Matilda'nın adından esinlenilerek oluşturulan bu metot, bir veya daha çok parametreyi, `like` kapsayıcısıyla aramaya yarar, bu vesileyle `%` operatörünün kullanılmasına izin verir. 

Elde edilen verilerin;

Hangi sütunlarının görüntüleneceği
Kaç adet verinin görüntüleneceği
Kaç adet verinin gözardı edileceği
Hangi kayıt aralığının elde edileceği
Verilerin sıralanması (sütuna göre de sıralama mümkündür)
Verilerin formatı (return array | json)

gibi isterler belirtilebilir.

İlk parametre tablo adıdır ve `string` olarak belirtilmesi zorunludur, ikinci parametre kayıt seçmek için kullanılır ve `array` türünde belirtilmelidir, seçim yapılmayacaksa ve diğer parametreler gönderilmek isteniyorsa ikinci parametreye `null`, `[]` veya `''` değerlerinden biri atanabilir.


Üçüncü parametre `string` veya `array` türünde belirtilen kelimelerdir ve belirtilmesi zorunludur, dördüncü parametre `string` veya `array` türünde belirtilen görüntülenmesi istenen sütun isimleridir ve belirtilmesi zorunlu değildir, eğer belirtilmeyecek ise `null`, `[]` veya `''` değerlerinden biri atanarak tüm sütunların görüntülenmesi sağlanmış olur. 

Beşinci parametre gözardı edilecek kayıt sayısını belirtmek için kullanılır ve belirtimesi zorunlu değildir eğer belirtilmeyecek ise `0`, `null`, `[]` veya `''` değerlerinden biri atanabilir. Altıncı parametre, kayıt sayısını sınırlamak için kullanır ve belirtilmesi zorunlu değildir, eğer belirtilmeyecek ise `0`, `null`, `[]` veya `''` değerlerinden biri atanabilir.

Yedinci parametre elde edilen kayıtların yeniden eskiye ya da eskiden yeniye göre sıralanması amacıyla kullanılır ve zorunlu değildir, eğer belirtilmeyecek ise `0`, `null`, `[]` veya `''` değerlerinden biri atanabilir, varsayılan olarak kayıtlar `ASC` ilkesiyle küçükten büyüğe sıralanmaktadır eğer sadece `sutunadi` gönderilirse buna göre sıralanacaktır. Bir diğer kullanımı ise `sutunadi:desc` şeklindedir, bu kullanımda da sütun adına göre sıralama ilkesiyle sıralanır. Sıralama ilkesi `asc` veya `desc` olarak belirtilebilir olup büyük küçük harf duyarlılığı bulunmamaktadır.

Sekizinci parametre kayıtlar kümesinin çıktı formatını barındırır ve zorunlu değildir. Varsayılan olarak verilerin `array` olarak geri döndürülmesi sağlanmıştır, `json` türünde temini arzu ediliyorsa `json` değerini göndermek yeterlidir. Eğer belirtilmeyecek ise ayrıca bir değer göndermeye gerek yoktur lakin yine de belirtmek isterseniz `0`, `null`, `[]` veya `''` değerlerinden birisi atanabilir.



```php
$data = $this->matilda('users', null, 'ali%', null, 0);
$this->print_pre($data);
```

veya

```php
$data = $this->matilda('users', null, 'a%', 'username', null, 4);
$this->print_pre($data);
```

veya

```php
$data = $this->matilda('users', [['id'=>1]], ['%a%'], ['username','avatar'], 4);
$this->print_pre($data);
```

veya

```php
$data = $this->matilda('users', [['id'=>1],['id'=>2]], ['%a%'], ['username','avatar'], null, 2);
$this->print_pre($data);
```

veya

```php
$data = $this->matilda('users', [['id'=>1],['id'=>2]], ['%a%'], ['username','avatar'], 0, 2, 'id:desc');
$this->print_pre($data);
```

veya

```php
$data = $this->matilda('users', [['id'=>1],['id'=>2]], ['%a%'], ['username','avatar'], 0, 2, 'username', 'json');
$this->print_pre($data);
```

---

## do_have()

Bir veya daha fazla verinin, tam eşleşme prensibiyle veritabanı tablosunda bulunup bulunmadığını kontrol etmek amacıyla kullanılır. 

Bu tür bir kontrolü, aynı üye bilgileriyle tekrar kayıt olunmasını istemediğimiz durumlarda veya Select box'dan gönderilen verilerin gerçekten select box'ın edindiği kaynakla aynılığını kontrol etmemiz gereken durumlarda kullanırız. 

`$tblname` tablo adını, `$str` veriyi, `$column` verinin olup olmadığına bakılan sütunu temsil etmektedir, eğer `$column` değişkeni boş bırakılırsa veri, tablo'nun tüm sütunlarında aranır. `$str` string olarak belirtilebildiği gibi, sütun adını anahtar olarak kullanan bir dizi yapısıyla da belirtilebilir.

Arama sonucunda eşleşen kayıt bulunursa yanıt olarak `true` değeri döndürülür, bulunmazsa da `false` değeri döndürülür.

##### Örnek
```php
$tblname = 'users';
$str = 'aliyilmaz.work@gmail.com';
$column = 'email_address';
if($this->do_have($tblname, $str, $column)){
    echo 'Bu E-Posta adresi kullanılmaktadır';
} else {
    echo 'Bu E-Posta adresi kullanılmamaktadır.';
}
```
veya
```php
$tblname = 'users';
$str = 'aliyilmaz.work@gmail.com';
if($this->do_have($tblname, $str)){
    echo 'Bu E-Posta adresi kullanılmaktadır';
} else {
    echo 'Bu E-Posta adresi kullanılmamaktadır.';
}
```
veya
```php
if($this->do_have('users', 'aliyilmaz.work@gmail.com', 'email_address')){
    echo 'Bu E-Posta adresi kullanılmaktadır';
} else {
    echo 'Bu E-Posta adresi kullanılmamaktadır.';
}
```
veya
```php
if($this->do_have('users', 'aliyilmaz.work@gmail.com')){
    echo 'Bu E-Posta adresi kullanılmaktadır';
} else {
    echo 'Bu E-Posta adresi kullanılmamaktadır.';
}
```
veya

```php
if($this->do_have('users', array('email'=>'aliyilmaz.work@gmail.com'))){
    echo 'Bu E-Posta adresi kullanılmaktadır';
} else {
    echo 'Bu E-Posta adresi kullanılmamaktadır.';
}
```


---

## getId()

Bir veritabanı tablosunda belirtilen koşulları sağlayan ve sadece bir adet bulunan kaydın `auto_increment` özelliği tanımlanmış sütununda bulunan değeri göstermeye yarar. `$tblname` tablo adını, `$needle` koşulları temsil etmektedir.

##### Örnek

```php
$needle = array(
    'username'=>'burcu',
    'password'=>md5(123123)
);

echo $this->getId('users', $needle);
```


**Bilgi:** `insert` metotunun `boolean` türünde bir yanıt döndürüyor olması, `amelia` metotunun `auto_increment` özelliği tanımlanmış sütunu kendiliğinden hedeflememesi ve daha anlamlı isme sahip `id` temin edici bir metot ihtiyacı bu metotun oluşmasını sağlamıştır.

---

## newId()

Bir veritabanı tablosuna eklenmesi planlanan kayda tahsis edilecek `auto_increment` değerini göstermeye yarar. `$tblname` tablo adını temsil etmektedir.

##### Örnek
```php
$tblname  = 'users';
echo $this->newId($tblname);
```

---

## increments()

Veritabanı tablosunda ki `auto_increment` görevine sahip sütun adını göstermek amacıyla kullanılır. `$tblname` veritabanı tablo adını temsil etmektedir.

##### Örnek

```php
$tblname = 'users';
echo $this->increments($tblname);
```

---

## tableInterpriter()

Mind ile oluşturulmuş veritabanı tablosunu, Mind'ın veritabanı tablosu oluşturma şemasına dönüştüren yorumlayıcı bir metotdur. Veritabanı tablo adı `string` bir yapıda belirtilmelidir. 

Eğer görmezden gelinmesi istenen sütunlar varsa `string` veya `array` türünde belirtilmelidir. Söz konusu tablo oluşturucu şema, dizi yapısında geri döndürülür. Bu metot'a ihtiyaç duyulmasının nedeni, veritabanı tablolarının yeniden oluşturma imajının üretilme ihtiyacıdır.

**Not:** Veritabanı tablosu yoksa veya tablo boş ise, boş bir dizi yanıt olarak geri döndürülür.



kod:
```php
$this->print_pre($this->tableInterpriter('users'));
```

çıktı:
```php
Array
(
    [0] => id:increments@11
    [1] => username:string@255
    [2] => password:string@255
    [3] => description:medium
    [4] => address:large
    [5] => amount:decimal@10,0
    [6] => age:int@11
)
```


kod:
```php
$this->print_pre($this->tableInterpriter('users', 'address'));
```

çıktı:
```php
Array
(
    [0] => id:increments@11
    [1] => username:string@255
    [2] => password:string@255
    [3] => description:medium
    [4] => amount:decimal@10,0
    [5] => age:int@11
)
```

kod:
```php
$this->print_pre($this->tableInterpriter('users', ['address', 'age']));
```

çıktı:
```php
Array
(
    [0] => id:increments@11
    [1] => username:string@255
    [2] => password:string@255
    [3] => description:medium
    [4] => amount:decimal@10,0
)
```



---

## backup()

Bir veya daha fazla veritabanını yedeklemek için kullanılır. İki parametre alır, ilki veritabanı isimlerini temsil eder ve belirtilmesi zorunludur, bu isimler `string` ve `array` biçiminde gönderilebilir, ikinci parametre ise yedeğin konumlanması istenen dizin yolunu temsil eder ve zorunlu değildir, bu yol `string` olarak belirtilmelidir. 

Yedek `JSON` yapısındadır, tarayıcı üzerinden bilgisayara kaydedilmek istenirse, ikinci parametre gönderilmez.

##### Örnek

```php
$this->backup('mydb');
```

veya 

```php
$this->backup(array('mydb', 'trek'));
```

veya

```php
$this->backup('mydb', 'restore/');
```

veya

```php
$this->backup(array('mydb', 'trek'), './');
```

---

## restore()

Bir veya daha fazla veritabanını yedeğini geri yüklemek için kullanılır. `JSON` dosyalarına ait `string` veya `array` yapısındaki yolları temsil eden bir parametre alır ve zorunludur.

##### Örnek

    
```php
$this->restore('backup_2020_11_06_17_40_21.json');
```
    
veya

```php
$this->restore(array('backup_2020_11_06_17_40_21.json', 'backup_2020_11_06_17_41_22.json'));
```

---

## pagination()

Veritabanı tablosunda bulunan verileri sayfalamak amacıyla kullanılır. 

#### prefix

Sayfa ön eki'ni temsil etmekte olup zorunlu değildir, varsayılan olarak `p` belirtilmiştir. 

###### Rotasız url yapısında kullanımı

`pagination.php`  adında bir dosya olduğunu varsayalım, bu dosyanın tam yoluna ön eki dahil ederek şu şekilde `pagination.php?p` veya şu şekilde `pagination.php?p=1` kullanarak ilk sayfa verilerini görüntülemiş oluruz.


###### Rotalı url yapısında kullanımı

Parametreli rota gerektiren bu kullanım şekli, rotaların tanımlandığı dosyada rota `users:p` olarak tanımlandığında adres satırına `users` veya `users/1` şekilde yazılırsa ilk sayfa verilerini görüntülemiş oluruz.


#### limit 

Her sayfada görüntülenmesi istenen kayıt adedini temsil etmekte olup zorunlu değildir, varsayılan olarak `25` adet belirtilmiştir. 

#### search, column, format, sort

Bu kurallar hakkında daha fazla bilgi edinmek için, doğrudan [getData](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#getData) metotuna göz atabilirsiniz.

#### navigation

Sayfalanan verilerin listelendiği sayfalarda gezinebilmek için ihtiyaç duyulan navigasyon menüsü bu kısım tarafından yönetilmektedir. 

* `route_path` : Navigasyon menüsünde yer alan sayfa bağlantıları, sayfa numarası dışında bir rota yoluna da ihtiyaç duyar, bu yolu `$options['navigation']['route_path']` söz diziminde göndermek mümkündür. Varsayılan olarak `page` kullanılmıştır.

* `prev` : Navigasyon menüsünde önceki sayfa bağlantısının arzu edilen metnini bu kısımda göndermek mümkündür. Varsayılan olarak `Prev` ifadesi kullanılmıştır.

* `next` : Navigasyon menüsünde sonraki sayfa bağlantısının arzu edilen metnini bu kısımda göndermek mümkündür. Varsayılan olarak `Next` ifadesi kullanılmıştır.


#### Geriye dönen değerlerin kullanım amaçları

* `data` anahtarı yardımıyla elde edilen verilere ulaşılır. 
* `prefix` anahtarı yardımıyla sayfa numarası ön ekine ulaşılır.
* `limit` anahtarıyla o sayfada kaç adet verinin elde edildiği bilgisine ulaşılır.
* `totalPage` anahtarı yardımıyla toplam sayfa sayısına ulaşılır.
* `totalRecord` anahtarı yardımıyla toplam kayıt sayısına ulaşılır.
* `route_path` anahtarı yardımıyla rota yoluna ulaşılır.
* `navigation` anahtarı yardımıyla sayfalama menüsünün gömme kodlarına ulaşılır.
* `page` anahtarı yardımıyla hangi sayfada olunduğu bilgisine ulaşılır.

##### Örnek

```php
$data = $this->pagination('messages');

// kayıtlar gösteriliyor
$this->print_pre($data['data']);

// sayfalama navigasyon menüsü gösteriliyor
echo $data['navigation'];
```

veya


```php
$options = array(
    'prefix'=>'page', // Default p
    'search'=>array(
        'scope'=>'like',
        'keyword'=>'%a%',
        'column'=>'text',
        'delimiter'=>array(
            'or'=>'AND'
        ),
        'or'=>array(
            array(
                'sender_id'=>1,
                'reciver_id'=>1
            ),
            array(
                'sender_id'=>3,
                'reciver_id'=>3
            )
        )
    ),
    'column'=>array('sender_id','reciver_id','text'), // array / string
    'limit'=>2, // Default 5
    'format'=>'json', // json 
    'sort'=>'id:asc' // asc / ASC / desc / DESC
);
$options['navigation'] = [
    'route_path'=>'page',
    'prev'=>'Önceki',
    'next'=>'Sonraki'
];
$data = $this->pagination('messages', $options);

// kayıtlar gösteriliyor
$this->print_pre($data['data']);

// sayfalama navigasyon menüsü gösteriliyor
echo $data['navigation'];
```


---

## translate()

Bu fonksiyon, veritabanı altyapısına dayanan çoklu çeviri desteğini sağlamayı amaçlar. Kullanıma hazır hale gelmesi için veritabanı tablosunun oluşturulması ve Mind'a tanımlanması gerekir. 

### Veritabanı tablosunun tasarlanması

```php
$scheme = array(
    'id:increments',
    'name:small',
    'text:small',
    'lang:small',
    'user_id:small',
    '_token:small',
    'status:string',
    'created_at:string',
    'updated_at:string'
);
```

### Veritabanı tablosunun ve içeriğinin oluşturulması

```php
if($this->tableCreate('translations', $scheme)){
    $data = array(
            array(
                "name" => "dashboard",
                "text" => "Dashboard",
                "lang" => "EN",
                "user_id" => 1,
                "_token" => $this->generateToken(),
                "status" => 1,
                "created_at" => $this->timestamp
            ),
            array(
                "name" => "profile-signout",
                "text" => "Sign out",
                "lang" => "EN",
                "user_id" => 1,
                "_token" => $this->generateToken(),
                "status" => 1,
                "created_at" => $this->timestamp
            ),
            array(
                "name" => "dashboard",
                "text" => "Başlangıç",
                "lang" => "TR",
                "user_id" => 1,
                "_token" => $this->generateToken(),
                "status" => 1,
                "created_at" => $this->timestamp
            ),
            array(
                "name" => "profile-signout",
                "text" => "Oturumu kapat",
                "lang" => "TR",
                "user_id" => 1,
                "_token" => $this->generateToken(),
                "status" => 1,
                "created_at" => $this->timestamp
            )
        );
        
    $this->insert('translations', $data);
}
```

### Çeviri kullanımı

İki parametre alan `translate()` metotunun ilk parametresi, çevirisi istenen kaydın anahtarının belirtildiği kısımdır, ikinci parametresi ise Mind içinde bulunan languages() metotundaki kısaltmalardan birinin belirtildiği kısımdır. İkinci parametrenin belirtilme zorunluluğu yoktur, eğer belirtilmez ise varsayılan olarak tanımlanan Dil kısaltmasının çevirisini geri döndürür.

```php
echo $this->translate('dashboard'); // Varsayılan olarak TR belirtildiği için Başlangıç geri döndürülür.
echo '<br />';
echo $this->translate('dashboard', 'TR'); // Başlangıç
echo '<br />';
echo $this->translate('dashboard', 'EN'); // Dashboard
```

### Çeviri ayarlarının Mind'a tanımlanması

`table` tablo adını, `column` dil kısaltmalarının tutulduğu sütun adını, `haystack` çevirisi istenen kaydın benzersiz isminin tutulduğu sütun adını, `return` geri döndürülmesi istenen verinin sütun adını ve `lang` varsayılan dilin kısaltmasının tutulduğu sütun adını temsil eder.

Varsayılan olarak aşağıdaki tanımlamalar yapılmıştır, eğer bu dökümanda belirtilen kullanım yönergesinden başka isimlendirmeler belirlemeyi düşünürseniz aşağıdaki kısmı Mind'ı çağırırken ya da Mind.php dosyası içinden güncellemeniz yeterlidir.

```php
$conf = array(
    'translate'=>array(
        'table'                 =>  'translations',
        'column'                =>  'lang',
        'haystack'              =>  'name',
        'return'                =>  'text',
        'lang'                  =>  'TR'
    )
);

$Mind = new Mind($conf);
```

---

## is_db()

Bu fonksiyon veritabanının varlığını sorgulamak amacıyla kullanır,`mydb` veritabanı adını temsil etmektedir. Veritabanı ismi `string` olarak gönderilebilir. Eğer veritabanı varsa `true` değeri döndürülür, yoksa `false` değeri döndürülür.

##### Örnek

```php
if($this->is_db('mydb')){
    echo 'Veritabanı var';
} else {
    echo 'Veritabanı yok';
}
```

---

## is_table()

Bu fonksiyon veritabanı tablosunun varlığını sorgulamak amacıyla kullanır, `users` veritabanı tablo adını temsil etmektedir. Tablo ismi `string` olarak gönderilebilir. Eğer söz konusu tablo varsa `true` değeri döndürülür, yoksa `false` değeri döndürülür.

##### Örnek

```php
if($this->is_table('users')){
    echo 'Tablo var';
} else {
    echo 'Tablo yok';
}
```

---

## is_column()

Bu fonksiyon veritabanı tablosunda belirtilen sütunun varlığını sorgulamak amacıyla kullanır, `users` tablo adını, `username` sütun adını temsil etmektedir. Sütun ismi `string` olarak gönderilebilir. Eğer söz konusu sütun varsa `true` değeri döndürülür, yoksa `false` değeri döndürülür.

##### Örnek

```php
if($this->is_column('users', 'username')){
    echo 'Tablo var';
} else {
    echo 'Tablo yok';
}
```

---

## is_phone()

Bu fonksiyon kendisiyle paylaşılan verinin geçerli bir telefon numarası söz diziminde yazılıp yazılmadığını kontrol etmek amacıyla kullanılır, telefon numarası `string` olarak gönderilebilir. Eğer söz konusu veri geçerli bir numaraysa yanıt olarak `true` değeri döndürülür, değilse `false` değeri döndürülür, `$str` kendisiyle paylaşılan veriyi temsil etmektedir.
##### Örnek
```php
$str = '05555555555';
if($this->is_phone($str)){
    echo 'Bu numara geçerli bir telefon numarasıdır.';
} else {
    echo 'Bu numara geçerli bir telefon numarası değildir.';
}
```

veya

```php
$str = '0555 555 55 55';
if($this->is_phone($str)){
    echo 'Bu numara geçerli bir telefon numarasıdır.';
} else {
    echo 'Bu numara geçerli bir telefon numarası değildir.';
}
```

veya

```php
$str = '+905555555555';
if($this->is_phone($str)){
    echo 'Bu numara geçerli bir telefon numarasıdır.';
} else {
    echo 'Bu numara geçerli bir telefon numarası değildir.';
}
```

veya

```php
$str = '905555555555';
if($this->is_phone($str)){
    echo 'Bu numara geçerli bir telefon numarasıdır.';
} else {
    echo 'Bu numara geçerli bir telefon numarası değildir.';
}
```

---

## is_date()

Bu fonksiyon kendisiyle paylaşılan tarih biçiminin gerçek olup olmadığını kontrol etmek amacıyla kullanılır, tarih ve format `string` olarak gönderilebilir. `$date` ve `01.02.1987` tarihi, `$format` ve `d.m.Y` tarihin hangi formatta kontrol edilmesi gerektiği bilgisini temsil etmektedir. Format parametresinin belirtilmesi isteğe bağlıdır, belirtilmediğinde tarih formatının varsayılan olarak `Y-m-d H:i:s` olduğu varsayılır. Eğer tarih geçerliyse yanıt olarak `true` değeri döndürülür, geçerli değilse `false` değeri döndürülür.
##### Örnek

```php
$date = '01.02.1987';
$format = 'd.m.Y';
if($this->is_date($date, $format)){
    echo 'Bu tarih bir doğum tarihidir';
} else {
    echo 'Bu tarih bir doğum tarihi değildir.';
}
```

veya

```php
if($this->is_date('01.02.1987', 'd.m.Y')){
    echo 'Bu tarih bir doğum tarihidir';
} else {
    echo 'Bu tarih bir doğum tarihi değildir.';
}
```

---

## is_email()

Bu fonksiyon kendisiyle paylaşılan verinin e-mail adresi söz dizimine sahip olup olmadığını kontrol etmek amacıyla kullanılır, veri `string` olarak gönderilebilir. Eğer veri e-mail adresi söz dizimine sahip ise yanıt olarak `true` değeri döndürülür, geçerli değilse `false` değeri döndürülür.
##### Örnek
```php
$str = 'aliyilmaz.work@gmail.com';
if($this->is_email($str)){
    echo 'Bu bir email adresidir.';
} else {
    echo 'Bu bir email adresi değildir.';
}
```

---

## is_type()

Bu fonksiyon özellikle dosya yükleme işlemleri sırasında yüklenmek istenen dosyanın formatını kontrol etmek amacıyla kullanılır, Dosya adı `string` olarak belirtilmelidir, Dosya uzantıları ise `string` veya `array` olarak belirtilebilir. `$this->post['photo']['name']` dosya adını, `$list` müsaade edilen dosya uzantılarını temsil etmektedir. Eğer dosya müsaade edilen uzantıya sahip ise yanıt olarak `true` değeri döndürülür, değilse `false` değeri döndürülür.
##### Örnek

```php
$list = 'jpg';
if($this->is_type($this->post['photo']['name'], $list)){
    echo 'Yüklemek istediğiniz dosya müsaade edilen bir uzantıya sahiptir.';
} else {
    echo 'Yüklemek istediğiniz dosya müsaade edilen bir uzantıya sahip değildir.';
}
```

veya

```php
$list = array('jpg', 'jpeg', 'png', 'gif');
if($this->is_type($this->post['photo']['name'], $list)){
    echo 'Yüklemek istediğiniz dosya müsaade edilen bir uzantıya sahiptir.';
} else {
    echo 'Yüklemek istediğiniz dosya müsaade edilen bir uzantıya sahip değildir.';
}
```

---

## is_size()

Bu fonksiyon, dosya dizisinde bulunan `size` değerinin ya da `string` veya `integer` yapısında belirtilen `byte` cinsinden değerin kontrol edilmesi amacıyla kullanılır. İlk parametre kontrol edilmesi istenen boyut bilgisini, ikici parametre ise kontrol edilmesi istenen boyutu temsil etmektedir. Eğer dosya veya belirtilen değer müsaade edilen boyutun altında veya eşitse yanıt olarak `true` değeri döndürülür, değilse `false` değeri döndürülür. Daha iyi anlamak için aşağıdaki örnekleri inceleyebilirsiniz.
 
 **Bilgi:** Dosyalarla çalışırken `php.ini` ayarlarında bulunan `upload_max_filesize` parametresine en az `$size` değişkeninde belirtilen miktar kadar boyutun belirtilmesi gereklidir. 

##### Örnek

```php
$second_size = '35 KB';
$this->post['photo'] = array(
    'size'=>35840
);
if($this->is_size($this->post['photo'], $second_size)){
    echo 'ilk boyut belirtilen ikinci boyuttan küçük veya eşittir.';
} else {
    echo 'ilk boyut belirtilen ikinci boyuttan büyüktür.';
}
```

veya

```php
$this->post['photo'] = array(
    'size'=>36700160
);
if($this->is_size($this->post['photo'], '35 MB')){
    echo 'ilk boyut belirtilen ikinci boyuttan küçük veya eşittir.';
} else {
    echo 'ilk boyut belirtilen ikinci boyuttan büyüktür.';
}
```

veya

```php
$this->post['photo'] = array(
    'size'=>37580963840
);
if($this->is_size($this->post['photo'], '35 GB')){
    echo 'ilk boyut belirtilen ikinci boyuttan küçük veya eşittir.';
} else {
    echo 'ilk boyut belirtilen ikinci boyuttan büyüktür.';
}
```

veya

```php
$this->post['photo'] = array(
    'size'=>1099511627776
);
if($this->is_size($this->post['photo'], '1 TB')){
    echo 'ilk boyut belirtilen ikinci boyuttan küçük veya eşittir.';
} else {
    echo 'ilk boyut belirtilen ikinci boyuttan büyüktür.';
}
```

veya

```php
$this->post['photo'] = array(
    'size'=>1125899906842624
);
if($this->is_size($this->post['photo'], '1 PB')){
    echo 'ilk boyut belirtilen ikinci boyuttan küçük veya eşittir.';
} else {
    echo 'ilk boyut belirtilen ikinci boyuttan büyüktür.';
}

```
veya

```php
$second_size = 35839;
$first_size = 35839;
if($this->is_size($first_size, $second_size)){
    echo 'Değer belirtilen boyuttan küçüktür';
} else {
    echo 'ilk boyut belirtilen ikinci boyuttan büyüktür.';
}
```

veya

```php
$second_size = '35 KB';
$first_size = '35840';
if($this->is_size($first_size, $second_size)){
    echo 'ilk boyut belirtilen ikinci boyuttan küçük veya eşittir.';
} else {
    echo 'ilk boyut belirtilen ikinci boyuttan büyüktür.';
}
```

veya

```php
$second_size = '1024 KB';
$first_size = '1023 KB';
if($this->is_size($first_size, $second_size)){
    echo 'ilk boyut belirtilen ikinci boyuttan küçük veya eşittir.';
} else {
    echo 'ilk boyut belirtilen ikinci boyuttan büyüktür.';
}
```


---

## is_color()

Bu fonksiyon kendisiyle paylaşılan değerin geçerli bir renk olup olmadığını kontrol etmeye yarar, eğer söz konusu değer transparent veya tüm tarayıcılar ile uyumlu olan 148 renk isminden biriyse ya da HEX, RGB, RGBA, HSL, HSLA ise yanıt olarak `true` değeri döndürülür, değilse `false` değeri döndürülür. `$color` renk değerini temsil etmektedir.

##### Örnek

##### TRANSPARENT

```php
$color = 'transparent';
if($this->is_color($color)){
    echo 'Geçerli bir renk parametresidir.';
} else {
    echo 'Geçerli bir renk parametresi değildir.';
}
```

##### COLOR NAME

```php
$color = 'AliceBlue';
if($this->is_color($color)){
    echo 'Geçerli bir renk parametresidir.';
} else {
    echo 'Geçerli bir renk parametresi değildir.';
}
```

##### HEX

```php
$color = '#000000';
if($this->is_color($color)){
    echo 'Geçerli bir renk parametresidir.';
} else {
    echo 'Geçerli bir renk parametresi değildir.';
}
```

##### RGB

```php
$color = 'rgb(10, 10, 20)';
if($this->is_color($color)){
    echo 'Geçerli bir renk parametresidir.';
} else {
    echo 'Geçerli bir renk parametresi değildir.';
}
```

##### RGBA

```php
$color = 'rgba(100,100,100,0.9)';
if($this->is_color($color)){
    echo 'Geçerli bir renk parametresidir.';
} else {
    echo 'Geçerli bir renk parametresi değildir.';
}
```

##### HSL

```php
$color = 'hsl(10,30%,40%)';
if($this->is_color($color)){
    echo 'Geçerli bir renk parametresidir.';
} else {
    echo 'Geçerli bir renk parametresi değildir.';
}
```

##### HSLA

```php
$color = 'hsla(120, 60%, 70%, 0.3)';
if($this->is_color($color)){
    echo 'Geçerli bir renk parametresidir.';
} else {
    echo 'Geçerli bir renk parametresi değildir.';
}

```
---

## is_url()

Kendisiyle paylaşılan verinin bir bağlantı olup olmadığını kontrol etmek amacıyla kullanılır, `$url` bağlantı verisini temsil etmekte olup `string` olarak belirtilmelidir. Eğer söz konusu veri bir bağlantıysa `true` değeri döndürülür, değilse `false` değeri döndürülür.

##### Örnek

```php
$str = 'http://localhost';
if($this->is_url($str)){
    echo 'Bu bir bağlantıdır.';
} else {
    echo 'Bu bir bağlantı değildir.';
}
```

veya

```php
$str = 'example.com';
if($this->is_url($str)){
    echo 'Bu bir bağlantıdır.';
} else {
    echo 'Bu bir bağlantı değildir.';
}
```
veya

```php
$str = 'www.example.com';
if($this->is_url($str)){
    echo 'Bu bir bağlantıdır.';
} else {
    echo 'Bu bir bağlantı değildir.';
}
```

veya

```php
$str = 'http://example.com/';
if($this->is_url($str)){
    echo 'Bu bir bağlantıdır.';
} else {
    echo 'Bu bir bağlantı değildir.';
}
```

veya

```php
$str = 'http://www.example.com/';
if($this->is_url($str)){
    echo 'Bu bir bağlantıdır.';
} else {
    echo 'Bu bir bağlantı değildir.';
}
```


---


## is_http()

Kendisiyle paylaşılan `string` yapıdaki verinin HTTP söz diziminde yazılıp yazılmadığını kontrol etmek amacıyla kullanılır, Eğer söz konusu veri bir HTTP söz dizimine sahip ise `true` değeri döndürülür, değilse `false` değeri döndürülür.

##### Örnek

```php
$url = 'http://www.google.com/';
if($this->is_http($url)){
    echo 'Bu bir HTTP bağlantısıdır.';
} else {
    echo 'Bu bir HTTP bağlantısı değildir.';
}
```

---


## is_https()

Kendisiyle paylaşılan `string` yapıdaki verinin HTTPS sözdiziminde yazılıp yazılmadığını kontrol etmek amacıyla kullanılır, Eğer söz konusu veri bir HTTPS sözdizimine sahip ise `true` değeri döndürülür, değilse `false` değeri döndürülür.

##### Örnek

```php
$url = 'http://www.google.com/';
if($this->is_http($url)){
    echo 'Bu bir HTTP bağlantısıdır.';
} else {
    echo 'Bu bir HTTP bağlantısı değildir.';
}
```

    
---

## is_json()

Kendisiyle paylaşılan `string` türde ki verinin json formatında olup olmadığını kontrol etmek amacıyla kullanılır, `$schema` json verisini temsil etmektedir. Eğer söz konusu veri bir json sözdizimine sahip ise `true` değeri döndürülür, değilse `false` değeri döndürülür.

##### Örnek

```php
$schema = array(
    'test'=>'ali'
);

if($this->is_json(json_encode($schema))){
    echo 'Bu bir json sözdizimidir.';
} else {
    echo 'Bu bir json sözdizimi değildir.';
}
```

    
        
---

## is_age()

Yaş sınırlamasına ihtiyaç duyulan yerlerde kullanılır. Kendisiyle paylaşılan doğum tarihini mevcut tarihten çıkarır, elde edilen sonuç eğer belirtilen yaş ile aynı veya o yaştan büyük ise `true` yanıtı döndürülür, değilse `false` yanıtı döndürülür. 

3 parametre alır ve ilk ikisi zorunludur. ilk parametre, Yıl-Ay-Gün söz diziminde belirtilen tarih parametresidir, ikincisi minumum veya maksimum yaş sınırı parametresidir, üçüncüsü ise sınırlamanın minumum (`min`) veya maksimum (`max`) türde olup olmadığını ifade eden parametredir. 3'ncü parametre varsayılan olarak minumum(`min`) olarak belirtilmiştir.

##### Örnek

```php
if($this->is_age('1987-03-17', 35)){
    echo 'Yaş uygun.';
} else {
    echo 'Yaş uygun değil.';
}
```

veya

```php
if($this->is_age('1987-03-17', 32)){
    echo 'Yaş uygun.';
} else {
    echo 'Yaş uygun değil.';
}
```

veya

```php
if($this->is_age('1987-03-17', 35, 'min')){
    echo 'Yaş uygun.';
} else {
    echo 'Yaş uygun değil.';
}
```

veya

```php
if($this->is_age('1987-03-17', 32, 'max')){
    echo 'Yaş uygun.';
} else {
    echo 'Yaş uygun değil.';
}
```


        
---
    
## is_iban()

Kendisiyle paylaşılan değerin geçerli bir IBAN numarası olup olmadığını kontrol etmek amacıyla kullanılır. Eğer değer bir IBAN numarası söz dizimine sahipse `true` yanıtı döndürülür, değilse `false` yanıtı döndürülür.

##### Örnek

```php
if($this->is_iban('SE35 500 0000 0549 1000 0003')){
    echo 'Bu bir IBAN numarasıdır.';
} else {
    echo 'Bu bir IBAN numarası değildir.';
}
```


---

## is_ipv4()

Kendisiyle paylaşılan değerin `ipv4` söz diziminde olup olmadığını kontrol etmek için kullanılır. Eğer değer `ipv4` söz diziminde ise true yanıtı döndürülür, değilse `false` yanıtı döndürülür.

##### Örnek

```php
echo '<br>';
if($this->is_ipv4('208.111.171.236')){
    echo 'Bu bir ipv4 adresdir.';
} else {
    echo 'Bu bir ipv4 adres değildir.';
}
```
        
veya 


```php
echo'<br>';
if($this->is_ipv4('256.111.171.236')){
    echo 'Bu bir ipv4 adresdir.';
} else {
    echo 'Bu bir ipv4 adres değildir.';
}
```


---


## is_ipv6()

Kendisiyle paylaşılan değerin `ipv6` söz diziminde olup olmadığını kontrol etmek için kullanılır. Eğer değer `ipv6` söz diziminde ise true yanıtı döndürülür, değilse `false` yanıtı döndürülür.

##### Örnek

```php
echo '<br>';
if($this->is_ipv6('2001:0db8:85a3:08d3:1319:8a2e:0370:7334')){
    echo 'Bu bir ipv6 adresdir.';
} else {
    echo 'Bu bir ipv6 adres değildir.';
}
```
        
veya 


```php
echo'<br>';
if($this->is_ipv6('2001:0db8:85a3:08d3:1319:8a2e:0370:7334dsdsd')){
    echo 'Bu bir ipv6 adresdir.';
} else {
    echo 'Bu bir ipv6 adres değildir.';
}
```


---


## is_blood()

Kendisiyle paylaşılan değerin bir kan grubu olup olmadığını kontrol etmek için kullanıldığı gibi bir  kan grubunun başka bir kan grubu için uygun donör olup olmadığını kontrol etmek amacıyla da kullanılır. 

İki parametre alır, ilk parametre zorunludur, İkinci parametre zorunlu değildir. Sadece ilk parametre belirtilirse o kan grubunun geçerliliği kontrol edilir. İkinci parametre de belirtilirse, ikincisinin ilk kan grubu için uygun donör olup olmadığı kontrol edilir.

Eğer geçerli bir kan grubu belirtilmiş ise ya da uyumlu kan grupları belirtilmiş ise `true` yanıtı döndürülür, aksi halde `false` yanıtı döndürülür.

##### Örnek


```php
echo '<br>';

if($this->is_blood('0+')){
    echo 'Evet, bu bir kan grubudur.';
} else {
    echo 'Hayır, bu bir kan grubu değildir.';
}
```
    
veya

```php
echo '<br>';

if($this->is_blood('0+', '0+')){
    echo 'Evet, bu uyumlu bir kan grubudur.';
} else {
    echo 'Hayır, bu uyumsuz bir kan grubudur.';
}
```


---


## is_latitude()

Kendisiyle paylaşılan `float`, `int` ya da `string` yapıdaki verinin geçerli bir enlem bilgisi olup olmadığını kontrol etmek amacıyla kullanılır. Eğer kendisiyle paylaşılan veri geçerli bir enlem bilgisiyse `true` yanıtı döndürülür, değilse `false` yanıtı döndürülür.

##### Örnek

```php
$latitude = 41.008610;
if($this->is_latitude($latitude)){
    echo 'Geçerli enlem.';
} else {
    echo 'Geçersiz enlem.';
}
```

---


## is_longitude()

Kendisiyle paylaşılan  `float`, `int` ya da `string` yapıdaki verinin geçerli bir boylam bilgisi olup olmadığını kontrol etmek amacıyla kullanılır. Eğer kendisiyle paylaşılan veri geçerli bir boylam bilgisiyse `true` yanıtı döndürülür, değilse `false` yanıtı döndürülür.

```php
$longitude = 28.971111;
if($this->is_longitude($longitude)){
    echo 'Geçerli boylam.';
} else {
    echo 'Geçersiz boylam.';
}
```


---


## is_coordinate()

Kendisiyle paylaşılan koordinatın geçerliliğini kontrol etmek amacıyla kullanılır.  `float`, `int` ya da `string` yapıda iki parametre alır, bunlar enlem ve boylam bilgisidir ve her ikisinin belirtilmesi zorunludur.

##### Örnek

```php
$point1 = array(
    'lat' => 41.008610, 
    'long' => 28.971111
);
    
if($this->is_coordinate($point1['lat'], $point1['long'])){
    echo 'Geçerli koordinat.';
} else {
    echo 'Geçersiz koordinat.';
}
```
    
veya

```php
$point2 = array(
    'lat' => 39.925018, 
    'long' => 32.836956
);
        
if($this->is_coordinate($point2['lat'], $point2['long'])){
    echo 'Geçerli koordinat.';
} else {
    echo 'Geçersiz koordinat.';
}
```


---


## is_distance()

Bir koordinat noktası için, başka bir koordinat noktasının belirtilen menzil içinde kalıp kalmadığını sorgulamak amacıyla kullanılır.

3 parametre alır, ilk iki parametre iki farklı koordinat noktasını, 3'ncüsü ise menzil ve mesafe ölçü birimini temsil eder. 

3'ncü parametre iki nokta üst üste `:` işareti ile ikiye ayrılır, ilki menzil ikincisi mesafe ölçü birimini temsil eder. (örneğin: `300:m` )

ilk iki parametrede bulunan koordinat verileri `array` olarak, menzil ve menzil ölçü birimini temsil eden 3'ncü parametre ise `string` olarak belirtilmelidir.

`array` olarak belirtilen koordinat bilgisi `enlem,boylam` söz diziminde, `float`, `string` ya da `int` türünde belirtilmelidir.

Eğer menzil içinde bir mesafe söz konusuysa `true` yanıtı döndürülür, değilse `false` yanıtı döndürülür.

**Bilgi:**

Ölçü birimleri ve kısaltmaları aşağıdaki gibidir.

* m (Metre)
* km (Kilometre)
* mi (Mil)
* ft (Feet)
* yd (Yard)

##### KOORDİNATLAR

```php
$point1 = array(41.008610,28.971111); 
$point2 = array(39.925018,32.836956); 
```
    
##### Örnek

```php
if($this->is_distance($point1, $point2, '349:km')){
    echo 'Menzil içindedir.';
} else {
    echo 'Menzil içinde değildir.';
}
```

veya

```php
if($this->is_distance($point1, $point2, '347:km')){
    echo 'Menzil içindedir.';
} else {
    echo 'Menzil içinde değildir.';
}
```


---

## is_md5()

Kendisiyle paylaşılan verinin kriptografik özet söz diziminde olup olmadığını kontrol etmek amacıyla kullanılır. Söz konusu veri string olarak belirtilmelidir. Eğer veri bir md5 ise `true` değilse `false` yanıtı geri döndürülür.

##### Örnek

```php
$str = '123456';

if($this->is_md5($str)){
    echo 'Bu bir md5.';
} else {
    echo 'Bu bir md5 değil.';
}
```

veya

```php
$str = md5('123456');

if($this->is_md5($str)){
    echo 'Bu bir md5.';
} else {
    echo 'Bu bir md5 değil.';
}
```
---

## is_ssl()

Bu fonksiyon, projeye ait SSL Sertifikasının varlığını sorgulamak amacıyla kullanılır. Eğer SSL bağlantısı etkinse `true` değilse `false` yanıtı döndürülür.

##### Örnek


```php
if($this->is_ssl($str)){
    echo 'SSL bağlantısı var.';
} else {
    echo 'SSL bağlantısı yok.';
}
```


---

## is_htmlspecialchars()

Bu fonksiyon kendisiyle paylaşılan verinin HTML özel karakterleri içerip içermediğini kontrol etmeye yarar. Veri `string` türünde belirtilmelidir. Eğer HTML özel karakterleri içeriyorsa `true` değilse `false` yanıtı döndürülür.

##### Örnek

```php
$code = 'merhaba &lt;?=$this-&gt;timestamp;?&gt;';

if($this->is_htmlspecialchars($code)){
    echo 'HTML özel karakterleri içeriyor.';
} else {
    echo 'HTML özel karakterleri içermiyor.';
}
```

---

## is_morse()

Bu fonksiyon, kendisiyle paylaşılan verinin [morsealphabet()](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#morsealphabet) metotunda ki karakterlerle oluşturulmuş bir mors kodu olup olmadığını kontrol etmeye yarar. Veri `string` türünde belirtilmelidir. Eğer mors kodu ise `true` değilse `false` yanıtı döndürülür.

##### Örnek

```php
$data = '-- ..- ... - .- ..-. .- / -.- . -- .- .-.. / .- - .- - ..-- .-. -.- / --.-. ..-- .--.. -.-.. ---.';
if($this->is_morse($data)){
    echo 'Mors kodudur. ( '.$this->morse_decode($data).' )';
} else {
    echo 'Mors kodu değildir.';
}
```

veya

```php
$data = '.';
if(!$this->is_morse($data)){
    echo 'Mors kodu değildir.';
}  else {
    echo 'Mors kodudur. ( '.$this->morse_decode($data).' )';
}
```

veya

```php
$data = 'p';
if(!$this->is_morse($data)){
    echo 'Mors kodu değildir.';
} else {
    echo 'Mors kodudur. ( '.$this->morse_decode($data).' )';
}
```


---

## is_binary()

Belirtilen parametrenin bir Binary kodu olup olmadığını kontrol etmeye yarar.

##### Örnek

```php
$data = '1000001 1101100 1101001 100000 1011001 11000100 10110001 1101100 1101101 1100001 1111010';
if($this->is_binary($data)){
    echo 'Binary kodudur.';
} else {
    echo 'Binary kodu değildir.';
}
```


---

## is_timecode()

Belirtilen parametrenin bir zaman kodu olup olmadığını kontrol etmeye yarar.

##### Örnek

```php
if($this->is_timecode('59:00:00')){
    echo 'true';
}
```

---

## is_browser()

Belirtilen tarayıcı adının, belirtilen tarayıcı isimleri içinde olup olmadığını kontrol etmek amacıyla kullanılır. İki parametre alır. 

Sadece ilk parametre belirtilirse, belirtilen tarayıcı adının [getBrowser()](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#getbrowser) metodunda desteklenen tarayıcı adlarından biri olup olmadığı kontrol edilir.

Eğer her iki parametre belirtilirse, birinci parametrenin ikinci parametrede `string` veya `array` türünde belirtilen tarayıcı isimlerinden biri olup olmadına bakılır.

Eşleşme durumunda `true`, aksi durumda ise `false` yanıtı döndürülür. ikinci parametrede belirtilen tarayıcı adları büyük küçük harf duyarlılığına sahiptir ve [getBrowser()](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#getbrowser) metodunda desteklenen tarayıcı adlarını dikkate alarak çalışır.

##### Örnek

```php

if($this->is_browser($this->getBrowser())){
    echo 'TRUE';
} else {
    echo 'FALSE';
}


echo '<br>';

if($this->is_browser($this->getBrowser(), ['Firefox', 'Chrome'])){
    echo 'TRUE';
} else {
    echo 'FALSE';
}


echo '<br>';

if($this->is_browser('Firefox', ['Firefox', 'Chrome'])){
    echo 'TRUE';
} else {
    echo 'FALSE';
}

echo '<br>';

if($this->is_browser('Edge', ['Firefox', 'Chrome', 'Edge', 'Safari', 'Opera'])){
    echo 'TRUE';
} else {
    echo 'FALSE';
}

```

---

## is_decimal()
Kendisiyle paylaşılan `string` veya `integer` türündeki bir verinin ondalık bir sayı olup olmadığını kontrol etmeye yarar. Eğer söz konusu veri ondalık bir sayı ise `true`, değilse `false` yanıtı geri döndürülür.

##### Örnek

```php
if($this->is_decimal(1.2)){
    echo '1.2 ondalık bir sayıdır';
}else{
    echo '1.2 ondalık bir sayı değildir';
}
```
veya

```php
if($this->is_decimal('1.2')){
    echo '1.2 ondalık bir sayıdır';
}else{
    echo '1.2 ondalık bir sayı değildir';
}
```
veya

```php
if($this->is_decimal('1')){
    echo '1 ondalık bir sayıdır';
}else{
    echo '1 ondalık bir sayı değildir';
}
```
veya

```php
if($this->is_decimal(1)){
    echo '1 ondalık bir sayıdır';
}else{
    echo '1 ondalık bir sayı değildir';
}
```

---

## is_isbn()
Kendisiyle paylaşılan `string` türündeki bir verinin geçerli bir ISBN numarası olup olmadığını kontrol etmeye yarar. Eğer söz konusu veri ISBN numarası ise `true`, değilse `false` yanıtı geri döndürülür. Belirtilen verinin, ISBN-13 veya ISBN-10 versiyonuna göre değerlendirilmesi için ikinci parametre 13 veya 10 olarak belirtilmelidir.

##### Örnek

```php
var_dump($this->is_isbn('ISBN:0-306-40615-2'));     // return 1
var_dump($this->is_isbn('0-306-40615-2'));          // return 1
var_dump($this->is_isbn('ISBN:0306406152'));        // return 1
var_dump($this->is_isbn('0306406152'));             // return 1
var_dump($this->is_isbn('ISBN:979-1-090-63607-1')); // return 2
var_dump($this->is_isbn('979-1-090-63607-1'));      // return 2
var_dump($this->is_isbn('ISBN:9791090636071'));     // return 2
var_dump($this->is_isbn('9791090636071'));          // return 2
var_dump($this->is_isbn('ISBN:97811'));             // return false
```

---

## is_slug()

Belirtilen parametrenin seo dostu bir url yapısında olup olmadığını kontrol etmeye yarar. Eğer parametre seo dostu bir url ise `true` değilse `false` yanıtı geri döndürülür.

##### Örnek
```php
$str = $this->permalink('Hello world');
if($this->is_slug($str)){
    echo 'Bu bir slug\'dır.';
} else {
    echo 'Bu bir slug değildir.';
}
echo '<hr>';
$str = '*';
if($this->is_slug($str)){
    echo 'Bu bir slug\'dır.';
} else {
    echo 'Bu bir slug değildir.';
}

```

---

## timecodeCompare()

İki zaman damgasını karşılaştırmak amacıyla kullanılır, ilk parametre ikincisine eşit veya küçük ise `true` değilse `false` yanıtı geri döndürülür.

```php
$duration = '02:02:00';
$timecode = '02:02:02';
if($this->timecodeCompare($duration, $timecode)){
    echo 'küçük veya eşit';
}else{
    echo 'büyük';
}
```

---

## validate()

Farklı türdeki verilerin belirtilen kurallara uygunluğunu tek seferde kontrol etmek amacıyla kullanılır. Kuralları ihlal eden veriler varsa ve hata mesajı belirtilmişse `$this->errors` dizi değişkenine hata mesajları tanımlanır, hata mesajı belirtilmemişse verilerin dizi anahtarları `$this->errors` dizi değişkenine tanımlanır ve `false` yanıtı döndürülür. Herhangi bir kural ihlali yok ise `true` yanıtı döndürülür. 

İstisnai olarak, özel veri tipine ihtiyaç duyan kurallarda uygunsuz veri tipi tespit edilmesi halinde, bir hata mesajı belirtilip belirtilmediğine bakılmaksızın bu durumu ifade eden bir hata mesajı `$this->errors` dizi değişkenine tanımlanarak `false` yanıtı döndürülür.    

Her anahtar adına birden çok kural tanımlamak için kurallar `|` sembolü yardımıyla ayrılmalıdır. Parametrelerde bulunan veri anahtarlarının eşleşmesi gerekmektedir.

##### Örnek


```php
//  Veri
$data = array(
    'username'          =>  'aliyilmaz',
    'title'             =>  'Merhaba dünya1',
    'email'             =>  'aliyilmaz.work@gmail.com',
    'phone_number'      =>  '05554248988',
    'background_color'  =>  '#ffffff',
    'webpage'           =>  'http://google.com',
    'https_webpage'     =>  'https://google.com',
    'http_webpage'      =>  'http://google.com',
    'json_data'         =>  '{ "name":"John", "age":30, "car":null }',
    'content'           =>  'merhaba',
    'summary'           =>  'merhab',
    'quentity'          =>  '4',
    'numeric_str'       =>  12,
    'birthday'          =>  '1987-02-14',
    'register_date'     =>  '2020-02-18 14:34:22',
    'status'            =>  1,
    'ibanNumber'        =>  'SE35 5000 0000 0549 1000 0003',
    'ipv4Address'       =>  '127.0.0.1',
    'ipv6Address'       =>  '2001:0db8:85a3:08d3:1319:8a2e:0370:7334',
    'bloodGroup'        =>  '0+',
    'coordinates'       =>  '41.008610,28.971111',
    'distances'         =>  '41.008610,28.971111@39.925018,32.836956',
    'language'          =>  'TR',
    'morse_code'        =>  '.- .-.. .-..- / -.-- .. .-.. -- .- --..', // ali yılmaz
    'binary_code'       =>  '1000001 1101100 1101001 100000 1011001 11000100 10110001 1101100 1101101 1100001 1111010', // Ali Yılmaz
    'timecode'          =>  '59:59:59',
    'product_currency'  =>  'USD',
    'product_price'     =>  '10.00',
    'book_isbn'         =>  'ISBN:0-306-40615-2',
    'type'              =>  'countable',
    'post_slug'         =>  'merhaba-dunya' // veya Merhaba-dunya



);

// Kural
$rule = array(
    'username'          =>  'available:users',
    // 'username'          =>  'knownunique:users:username:aliyilmaz'
    // 'username'          =>  'knownunique:users:aliyilmaz'
    'title'             =>  'required|unique:posts',
    'email'             =>  'email|unique:users',
    'phone_number'      =>  'phone',
    'background_color'  =>  'color',
    'webpage'           =>  'url',
    'https_webpage'     =>  'https',
    'http_webpage'      =>  'http',
    'json_data'         =>  'json',
    'content'           =>  'max-char:7',
    'summary'           =>  'min-char:6|max-char:10',
    'quentity'          =>  'min-num:2|max-num:4',
    'numeric_str'       =>  'numeric',
    'birthday'          =>  'min-age:33|max-age:40',
    'register_date'     =>  'date:Y-m-d H:i:s',
    'status'            =>  'bool:true',
    'ibanNumber'        =>  'iban',
    'ipv4Address'       =>  'ipv4',
    'ipv6Address'       =>  'ipv6',
    'bloodGroup'        =>  'blood:0+',
    'coordinates'       =>  'required|coordinate',
    'distances'         =>  'distance:349 km',
    'language'          =>  'languages',
    'morse_code'        =>  'morse',
    'binary_code'       =>  'binary',
    'timecode'          =>  'timecode',
    'product_currency'  =>  'currencies',
    'product_price'     =>  'decimal',
    'book_isbn'         =>  'isbn',
    'type'              =>  'in:countable', // single
    // 'type'              =>  'in:ponderable,countable,measurable' // multi
    'post_slug'         =>  'slug'
);


// Mesaj
$message = array(
    'username'=>array(
        'available'=>'Bu kullanıcı adı bulunmamaktadır'
    ),
    'title'=>  array(
        'required'=>'Boş bırakılmamalıdır.',
        'unique'=>'Benzersiz bir kayıt belirtilmelidir.'
    ),
    'email'=>array(
        'email'=>'Geçerli bir e-mail adresi belirtilmelidir.',
        'unique'=>'Benzersiz bir kayıt belirtilmelidir.'
    ),
    'phone_number'=>array(
        'phone'=>'Geçerli bir telefon numarası belirtilmelidir.'
    ),
    'background_color'=>array(
        'color'=>'Geçerli bir renk belirtilmelidir.'
    ),
    'webpage'=>array(
        'url'=>'Geçerli bir URL belirtilmelidir.'
    ),
    'https_webpage'=>array(
        'https'=>'Geçerli bir https adresi belirtilmelidir.'
    ),
    'http_webpage'=>array(
        'http'=>'Geçerli bir http adresi belirtilmelidir.'
    ),
    'json_data'=>array(
        'json'=>'Geçerli bir json verisi belirtilmelidir.'
    ),
    'content'=>array(
        'max-char'=>'Maksimum karakter limiti aşılmamalıdır.'
    ),
    'summary'=>array(
        'min-char'=>'Minumum karakter limiti belirtilmelidir.',
        'max-char'=>'Maksimum karakter limiti aşılmamalıdır.'
    ),
    'quentity'=>array(
        'min-num'=>'Minumum sayı belirtilmelidir.',
        'max-num'=>'Maksimum sayı aşılmamalıdır.'
    ),
    'numeric_str'=>array(
        'numeric'=>'Numerik karakter belirtilmelidir.'
    ),
    'birthday'=>array(
        'min-age'=>'Minumum yaştan küçük bir yaş belirtilmelidir.',
        'max-age'=>'Maksimum yaştan büyük bir yaş belirtilmelidir.'
    ),
    'register_date'=>array(
        'date'=>'Yıl-Ay-Gün biçiminde tarih belirtilmelidir.'
    ),
    'status'=>array(
        'bool'=>'Doğrulama başarısız.'
    ),
    'ibanNumber'=>array(
        'iban'=>'IBAN hesabı doğrulanamadı.'
    ),
    'ipv4Address'=>array(
        'ipv4'=>'ipv4 söz diziminde bir IP adresi belirtilmelidir.'
    ),
    'ipv6Address'=>array(
        'ipv6'=>'ipv6 söz diziminde bir IP adresi belirtilmelidir.'
    ),
    'bloodGroup'=>array(
        'blood'=>'Talimatlara göre kan grubu belirtilmelidir.'
    ),
    'coordinates'=>array(
        'coordinate'=>'Geçerli bir koordinat belirtilmelidir.'
    ),
    'distances'=>array(
        'distance'=>'Menzil içinde bulunan koordinat noktası belirtilmelidir.'
    ),
    'language'=>array(
        'languages'=>'Dil seçimi yapılmalıdır.'
    ),
    'morse_code'=>array(
        'morse'=>'Geçerli bir mors kodu belirtilmelidir.'
    ),
    'binary_code'=>array(
        'binary'=>'Geçerli bir binary kodu belirtilmelidir.'
    ),
    'timecode'=>array(
        'timecode'=>'Geçerli bir zaman kodu belirtilmelidir.'
    ),
    'product_currency'=>array(
        'currencies'=>'Geçerli bir para birimi kodu belirtilmelidir.'
    ),
    'product_price'=>array(
        'decimal'=>'Geçerli bir ondalık sayı belirtilmelidir.'
    ),
    'book_isbn'=>array(
        'isbn'=>'Geçerli bir ISBN numarası belirtilmelidir.'
    ),
    'type'=>array(
        'in'=>'Geçerli bir tip belirtilmelidir.'
    ),
    'post_slug'=>array(
        'slug'=>'Geçerli bir slug belirtilmelidir'
    )

);

if($this->validate($rule, $data, $message)){
    echo 'Her şey yolunda!';
} else {
    $this->print_pre($this->errors);

}
```


#### Kurallar

##### min-num

Minumum belirtilmesi arzu edilen sayı miktarını ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duyar ve bu parametre integer bir değer olmak zorundadır, bu değerin tırnak işaretleri arasında ya da olduğu gibi yazılması bu kuralın doğru çalışmasını engellemez.

```php
min-num:5
```

##### max-num

Maksimum belirtilmesi arzu edilen sayı miktarını ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duyar ve bu parametre integer bir değer olmak zorundadır, bu değerin tırnak işaretleri arasında ya da olduğu gibi yazılması bu kuralın doğru çalışmasını engellemez.

```php
max-num:10
```

##### min-char

Verinin karakter uzunluğunun minumum belirtilen sayı kadar olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duyar ve bu parametre integer bir değer olmak zorundadır, bu değerin tırnak işaretleri arasında ya da olduğu gibi yazılması bu kuralın doğru çalışmasını engellemez.

```php
min-char:200
```

##### max-char

Verinin karakter uzunluğunun maksimum belirtilen sayı kadar olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duyar ve bu parametre integer bir değer olmak zorundadır, bu değerin tırnak işaretleri arasında ya da olduğu gibi yazılması bu kuralın doğru çalışmasını engellemez.

```php
max-char:500
```

##### email

Verinin bir e-email adresi olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `email` yazarak kullanılabilir.

```php
email
```

##### required

Veri belirtilmenin zorunlu olduğunu ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `required` yazarak kullanılabilir.

```php
required
```
    
##### phone

Verinin bir telefon numarası olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `phone` yazarak kullanılabilir.
 
```php
phone
```

##### date 

Verinin geçerli bir zaman bilgisi olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametre belirtilmeden kullanıldığında `Y-m-d` biçimini referans alarak veriyi kontrol eder, eğer zaman bilgisinin belirtilen formatta kontrol edilmesi arzu edilirse, kabul edilebilir zaman formatı belirtilmelidir.

```php
// 2020-02-18
date:Y-m-d  
```

veya

```php
// 2020-02-18 14
date:Y-m-d H 
```
veya

```php
// 2020-02-18 14:34
date:Y-m-d H:i 
```

veya

```php
// 2020-02-18 14:34:22
date:Y-m-d H:i:s 
```

gibi.

##### json

Veri formatının JSON söz diziminde olduğunu ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `json` yazarak kullanılabilir.

```php
json
```

##### color

Belirtilen değerin HEX, RGB, RGBA, HSL, HSLA veya 148 güvenli renkten biri olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `color` yazarak kullanılabilir.

```php
color
```

##### url

Belirtilen parametrenin geçerli bir bağlantı olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `url` yazarak kullanılabilir.

```php
url
```
    

##### https

Belirtilen parametrenin SSL bağlantısı olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `https` yazarak kullanılabilir.

```php
https
```

##### http

Belirtilen parametrenin HTTP bağlantısı olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `http` yazarak kullanılabilir.

```php
http
```

##### numeric

Belirtilen verinin rakam olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `numeric` yazarak kullanılabilir.

```php
numeric
```

##### min-age

Belirtilen doğum tarihine sahip kimsenin yine belirtilen yaş ya da üstü bir yaşta olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duyar ve bu parametre integer bir değer olmak zorundadır, bu değerin tırnak işaretleri arasında ya da olduğu gibi yazılması bu kuralın doğru çalışmasını engellemez.

```php
min-age:18
```

##### max-age

Belirtilen doğum tarihine sahip kimsenin yine belirtilen yaş ya da altında bir yaşta olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duyar ve bu parametre integer bir değer olmak zorundadır, bu değerin tırnak işaretleri arasında ya da olduğu gibi yazılması bu kuralın doğru çalışmasını engellemez.

```php
max-age:18
```

##### unique

Veritabanı tablosunda olmayan bir verinin belirtilmesi gerektiğini ifade eder. 



```php
unique:users
```

veya


```php
unique:posts
```

##### available

Veritabanı tablosunda olan bir verinin belirtilmesi gerektiğini ifade eder. 



```php
available:users
```

veya


```php
available:users:username
```


##### knownunique

Belirtilen parametrenin, veritabanı tablosunda olan bir kaydın mevcut parametresi veya kendisi dışındaki herhangi bir kayıt ile eşleşmeyen bir parametre olması gerektiğini belirtmek için kullanılır. Sadece 3'ncü parametre belirtilirse, veri anahtarıyla aynı isme sahip sütunda kontrol edilir, 4'ncü parametre belirtilirse 3'ncü parametre sütun adı, 4'ncü parametre ise değer olarak algılanır.



```php
knownunique:users:aliyilmaz
```

veya


```php
knownunique:users:username:aliyilmaz
```



##### bool

Parametrenin boolean türünde olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametre gönderilmeden kullanıldığında geçerli bir boolean verisi olup olmadığını kontrol eder. Ekstra bir parametre gönderilirse bu parametrenin boolean türüyle aynı olup olmadığını kontrol eder. (Veri şu söz dizimlerinden birinde gönderilebilir. `true`, `false`, `'true'`, `'false'`, `0`, `1`, `'0'` veya `'1'`)

```php
bool
```
    
veya

```php
bool:true
```
    
veya

```php
bool:false
```
    
veya

```php
bool:1
```
    
veya

```php
bool:0
```
    
##### iban

Verinin bir IBAN numarası olması gerektiğini ifade etmek için kullanılır.  Ekstra bir parametreye ihtiyaç duymadığından `iban` yazarak kullanılabilir.

```php
iban
```

##### ipv4

Verinin `ipv4` söz diziminde olması gerektiğini ifade etmek için kullanılır.  Ekstra bir parametreye ihtiyaç duymadığından `ipv4` yazarak kullanılabilir.

```php
ipv4
```

##### ipv6

Verinin `ipv6` söz diziminde olması gerektiğini ifade etmek için kullanılır.  Ekstra bir parametreye ihtiyaç duymadığından `ipv6` yazarak kullanılabilir.

```php
ipv6
```


##### blood

Belirtilen parametrenin geçerli bir kan grubu olması gerektiğini ifade etmek için kullanılır. Ekstra bir kan grubu parametresi belirtilirse,  ekstra parametrenin ilk parametre için uygun donör olup olmadığı kontrol edilir.

```php
blood
```
    
veya

```php
blood:0+ 
```


##### coordinate

Virgül ile ayrılmış Enlem ve Boylam parametresinin geçerli bir koordinat noktasını işaret etmesi gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `coordinate` yazarak kullanılabilir.

```php
coordinate
```


##### distance

`@` işareti ile ayrılmış iki farklı koordinat noktası arasındaki mesafenin extra parametrede belirtilen miktar kadar olması gerektiğini ifade etmek için kullanılır. Rakam ve ölçü birimi arasında bir boşluk bırakılmalıdır. Kullanımına izin verilen ölçü birimleriyle ilgili daha fazla bilgi için [distanceMeter](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#distancemeter) metotunu inceleyebilirsiniz.

```php
distance:349 km
```


##### languages

Verinin `languages()` metotunda bulunan dil kısaltmalarından biri olması gerektiğini ifade etmek için kullanılır.  Ekstra bir parametreye ihtiyaç duymadığından `languages` yazarak kullanılabilir.

```php
languages
```


##### morse

Verinin geçerli bir mors kodu olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `morse` yazarak kullanılabilir.

```php
morse
```


##### binary

Verinin geçerli bir Binary kodu olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `binary` yazarak kullanılabilir.

```php
binary
```


##### timecode

Verinin geçerli bir zaman kodu olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `timecode` yazarak kullanılabilir.

```php
timecode
```


##### currencies

Verinin geçerli bir para birimi kodu olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `currencies` yazarak kullanılabilir.

```php
currencies
```

##### decimal

Verinin geçerli bir ondalık sayı olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `decimal` yazarak kullanılabilir.

```php
decimal
```

##### isbn

Verinin geçerli bir ISBN numarası olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `isbn` yazarak kullanılabilir.

```php
isbn
```

##### slug

Verinin geçerli bir slug olması gerektiğini ifade etmek için kullanılır. Ekstra bir parametreye ihtiyaç duymadığından `slug` yazarak kullanılabilir.

```php
slug
```

##### in
Belirtilen verinin bir listede bulunması gerektiğini ifade etmek için kullanılır. Birden çok liste elemanı belirtilmek istenirse virgül ile ayrılmış olmalıdır.

```php
in:countable
```
veya 

```php
in:ponderable,countable,measurable
```

---


## policyMaker()

Bu fonksiyon rotaları karşılayan sunucu yazılımına özgü erişim yönetmeliği dosyalarını (.htaccess, web.config) oluşturmaya yarar. 

`/` rotası bir defa kullanıldığında fonksiyon tetiklenir. `Apache`, `Microsoft IIS`, `LiteSpeed` ve `Nginx` sunucu yazılımları desteklenmektedir. Bu fonksiyon, `route()` metotu içinde çalıştırılarak etkinleştirilmiştir. Sadece `Nginx` için aşağıdaki adımlar uygulanmalıdır, diğer sunucu yazılımlarında müdahaleye gerek yoktur.

**Nginx için:**
Projeyi etkileyen .conf uzantılı dosya içindeki `server {}` kapsayıcısı içine aşağıdaki kuralları ekleyin ve sunucuyu yeniden başlatın.
```nginx
error_page 404 /index.php;
location / {
    try_files $uri $uri/ /index.php$is_args$args;
    autoindex on;
}
location ~ \.php$ {
    include snippets/fastcgi-php.conf;
    fastcgi_pass php_upstream;		
}
location ~ /(app)/ {
    deny all;
    return 403;
}
```

**Bilgi:** Erişimini kısıtlayacağınız dizinleri `location ~ /(app)/ ` kısmında bulunan parantez içine `(app|special)` gibi **|** ayracıyla girmeniz gerekmektedir.

---

## print_pre()

Bu fonksiyon `array` ya da `json` biçiminde gönderilen verileri okunabilir şekilde ekrana yansıtmak amacıyla kullanılır.

##### Örnek

```php
// ARRAY
$data = array(
        'username'=>'aliyilmaz',
        'password'=>md5(123456)
);
$this->print_pre($data);
```

veya

```php
// JSON
$data = json_encode(array(
    'username'=>'aliyilmaz',
    'password'=>md5(123456)
));

$this->print_pre($data);
```
---

## arraySort()

Bu fonksiyon Dizi veya JSON biçiminde tutulan veri kümelerini sıralamak amacıyla kullanılır. 3 parametre alır, sadece ilk parametrenin belirtilmesi zorunludur. İlk parametre, `ARRAY` ya da `JSON` türünde belirtilen veri kümesi içindir, 2'nci parametre, veri türü `string` olan `asc`,`desc`,`ASC` veya `DESC` sıralama tiplerinden birini belirtmek içindir. Üçüncü parametreyse anahtarlı veri kümelerinde anahtar değerlerine göre sıralama yapmak içindir. Varsayılan olarak 2'nci parametre `ASC` değerine sahiptir.

##### Örnek


```php
// ARRAY
echo '<h1>ARRAY</h1>';
echo '<hr>';

// 1 KADEMELİ DİZİLERDE SIRALAMA YAPMAK
$data = array(
    2021,
    2020,
    2019
);
echo '<h4>2021 üstte</h4>';
$this->print_pre($this->arraySort($data, 'DESC'));


// 2 KADEMELİ DİZİLERDE ANAHTAR BELİRTEREK SIRALAMA YAPMAK
$data = array(
    array(
        'username'=>'aliyilmaz',
        'age'=>33
    ),
    array(
        'username'=>'eylül',
        'age'=>30
    )
);
echo '<hr>';
echo '<h4>eylül üstte</h4>';
$this->print_pre($this->arraySort($data, 'ASC', 'age'));


// 2 KADEMELİ DİZİLERDE ANAHTAR BELİRTMEDEN SIRALAMA YAPMAK
// İLK ANAHTAR DEĞERİNİ REFERANS ALIR
$data = array(
    array(
        'username'=>'aliyilmaz',
        'age'=>33
    ),
    array(
        'username'=>'aliyilmaz1',
        'age'=>29
    ),
    array(
        'username'=>'eylül',
        'age'=>30
    )
);
echo '<hr>';
echo '<h4>aliyilmaz üstte</h4>';
$this->print_pre($this->arraySort($data, 'ASC'));

// JSON
echo '<h1>JSON</h1>';
echo '<hr>';

// 1 KADEMELİ DİZİLERDE SIRALAMA YAPMAK
$data = json_encode(array(
    2021,
    2020,
    2019
));
echo '<h4>2021 üstte</h4>';
$this->print_pre($this->arraySort($data, 'DESC'));


// 2 KADEMELİ DİZİLERDE ANAHTAR BELİRTEREK SIRALAMA YAPMAK
$data = json_encode(array(
    array(
        'username'=>'aliyilmaz',
        'age'=>33
    ),
    array(
        'username'=>'eylül',
        'age'=>30
    )
));
echo '<hr>';
echo '<h4>eylül üstte</h4>';
$this->print_pre($this->arraySort($data, 'ASC', 'age'));


// 2 KADEMELİ DİZİLERDE ANAHTAR BELİRTMEDEN SIRALAMA YAPMAK
// İLK ANAHTAR DEĞERİNİ REFERANS ALIR
$data = json_encode(array(
    array(
        'username'=>'aliyilmaz',
        'age'=>33
    ),
    array(
        'username'=>'aliyilmaz1',
        'age'=>29
    ),
    array(
        'username'=>'eylül',
        'age'=>30
    )
));
echo '<hr>';
echo '<h4>aliyilmaz üstte</h4>';
$this->print_pre($this->arraySort($data, 'ASC'));
```

---

## info()

Bu fonksiyon dosya barındıran bir yola ait bilgilere ulaşmak amacıyla kullanılır. Aldığı her iki parametre `string` olarak belirtilmelidir. `$str` yolu, `$type` bilgi türü parametresini temsil etmektedir.

#### Parametreler

-   dirname
-   basename
-   extension
-   filename

##### dirname: Dosyanın bulunduğu dizini öğrenmek

```php
$str  = $this->post['logo']['name'];
$type = 'dirname';

echo $this->info($str, $type);
```

##### basename: Uzantısıyla birlikte dosyanın adını öğrenmek

```php
$str  = $this->post['logo']['name'];
$type = 'basename';

echo $this->info($str, $type);
```

##### extension: Yalnız dosya uzantısını öğrenmek

```php
$str  = $this->post['logo']['name'];
$type = 'extension';

echo $this->info($str, $type);
```

##### filename: Yalnız dosya adını öğrenmek

```php
$str  = $this->post['logo']['name'];
$type = 'filename';

echo $this->info($str, $type);
```

---

## request()

`$_GET`, `$_POST`, `$_FILES` ve `JSON POST` isteklerini güvenli ve düzenli bir yapıya kavuşturmak amacıyla kullanılır, Verilere `$this->post` dizi değişkeni içinden erişilir,**Mind.php** dosyasında bulunan `__construct()` metotu içinde çalıştırılarak etkin hale getirilmiştir.

##### type="text" kullanımı

```html
<form action="new" method="post">  
    <input type="text" name="username"> 
    <input type="password" name="password"> 
    <?=$_SESSION['csrf']['input'];?>
    <button type="submit">Send!</button>
</form>
```

```php
$this->print_pre($this->post);
echo $this->post['username'];
echo $this->post['password'];
```
##### type="text" ve type="file" (Dosya) kullanımı

```html
<form action="new" method="post" enctype="multipart/form-data">  
    <input type="text" name="username"> 
    <input type="password" name="password"> 
    <input type="file" name="singlefile">
    <?=$_SESSION['csrf']['input'];?>
    <button type="submit">Send!</button>
</form>
```

```php
$this->print_pre($this->post);
echo $this->post['username'];
echo $this->post['password'];
echo $this->post['singlefile']['name'];
```

##### type="text" ve type="file" (Dosyalar) kullanımı

```html
<form action="new" method="post" enctype="multipart/form-data">  
    <input type="text" name="username"> 
    <input type="password" name="password"> 
    <input type="file" name="multifile[]" multiple="multiple"> 
    <?=$_SESSION['csrf']['input'];?>
    <button type="submit">Send!</button>
</form>
```

```php
$this->print_pre($this->post);
echo $this->post['username'];
echo $this->post['password'];
$this->print_pre($this->post['multifile']);
```

---

## filter()

Bu metot `html` ve özel karakterleri, `sql_injection`, `xss` gibi istismar kodlarını etkisiz hale getirmek amacıyla kullanılır. `string` olarak gönderilen veriyi `htmlspecialchars` metotu yardımıyla güvenli hale getirip geri döndürür. Veriyi eski haline dönüştürmek için `htmlspecialchars_decode` metotu kullanılmalıdır.


##### Örnek

```php
$content = "%&%()' OR 1=1 karakterleri etkisizleştirilmiştir.";
echo $this->filter($content);
```

veya

```php
$content = "<script>alert('XSS Açığı var'); </script>";
echo $this->filter($content);
```


---

## firewall()

Bu fonksiyon, User Agent'i boş göndermeyi, Clickjacking, XSS, MIME Sniffing, CSRF davranışlarını engeller. Yine bu metot, belirtilen işletim sistemleri, tarayıcı ve ip adreslerinin erişimlerini yönetmeye olanak tanır. Varsayılan olarak tüm alt ayarlar tanımlandığı için parametre belirtme zorunluluğu yoktur. Metot, __construct() metodu içerisinde çalıştırılarak etkinleştirilmiştir.

#### noiframe

Projenin iframe yoluyla kullanılmasını engellemek için kullanılır, `boolean` türünde belirtilmelidir. Varsayılan olarak `true` belirtilmiştir.


#### nosniff

Projeyi görüntüleyen kullanıcının tarayıcısının, proje içeriğini analiz etmesini engellemek için kullanılır, `boolean` türünde belirtilmelidir. Varsayılan olarak `true` belirtilmiştir.


#### noxss

Mind, XSS kodlarını etkisiz hale getirmektedir, buna rağmen proje adreslemesine kod enjekte etme girişimlerini durdurmak için bu alt ayar kullanılır, `boolean` türünde belirtilmelidir. Varsayılan olarak `true` belirtilmiştir.

#### ssl

SSL etkin bir projenin oturumlarını, SSL üzerinden kullanıcıya iletmek için kullanılır, bu sayede kullanıcıların username & password bilgileri başta olmak üzere, kredi kartı vb kritik bilgilerinin de güvenliği sağlanmış olur. Varsayılan olarak `false` belirtilmiştir. Eğer etkinleştirilirse ve projenin SSL olmayan sayfası ziyaret edilmek istenirse erişim isteği sonlandırılır.

#### hsts

SSL etkin bir projenin veri trafiğini, SSL üzerinden iletmeye zorlamak için kullanılır, bu sayede kullanıcıyla sunucu arasındaki haberleşmenin SSL ile korunması sağlanmış olur. Varsayılan olarak `false` belirtilmiştir. Eğer etkinleştirilirse ve `ssl` etkin değilse, projenin SSL olmayan sayfasına yapılan erişim isteği sonlandırılır.


#### csrf

Yetkisiz HTTP POST isteklerini engellemeye yarar, varsayılan olarak `true` belirtilmiştir. `token` adı ve rastgele parametre uzunluğu belirtmek mümkündür, varsayılan olarak token adı `csrf_token`, parametre uzunluğuysa `200` belirtilmiştir. 

Bu alt ayar etkin olduğu sürece herhangi bir form'dan gönderilenlerde `csrf_token` parametresini arayacak, bulamadığı taktirde ise söz konusu isteği durduracaktır. Form'a token input'unu eklemek için form içinde bir yere bu `<?=$_SESSION['csrf']['input'];?>` parametreyi belirtmek gerekir. 

Eğer javascript ile form göndermek icap ediyorsa token parametresi bu şekilde javascript kodları içinde`<?=$_SESSION['csrf']['token'];?>` kullanılabilir, token'ın taşındığı anahtar adı ise `<?=$_SESSION['csrf']['name'];?>` ile kullanılabilir.

#### allow

Projeye erişmesine izin verilen işletim sistemleri, internet tarayıcıları ve ip adresleri ile erişilmesine izin verilen klasörlerin belirtildiği kısımdır, değerler `string` veya `array` türünde gönderilebilir. 


#### deny

Projeye erişmesine izin verilmeyen işletim sistemleri, internet tarayıcıları ve ip adresleri ile erişilmesine izin verilmeyen klasörlerin belirtildiği kısımdır, değerler `string` veya `array` türünde gönderilebilir. 

##### Örnek

```php
$conf = array(
    'db'=>[
        'drive'     =>  'mysql', // mysql, sqlite, sqlsrv
        'host'      =>  'localhost', // sqlsrv için: www.example.com\\MSSQLSERVER,'.(int)1433
        'dbname'    =>  'mydb', // mydb, app/migration/mydb.sqlite
        'username'  =>  'root',
        'password'  =>  '',
        'charset'   =>  'utf8mb4'
    ],    
    'firewall'  =>  array(
        'noiframe'  =>  false,
        'nosniff'   =>  false,
        'noxss'     =>  false,
        'ssl'       =>  false,
        'hsts'      =>  false,
        'csrf'      =>  false,
        // 'csrf'      =>  true,
        // 'csrf'      =>  array('limit'=>150),
        // 'csrf'      =>  array('name'=>'_token'),
        // 'csrf'      =>  array('name'=>'_token', 'limit'=>150),
        'allow'     =>  [
            'platform'=>'Windows', // ['Windows', 'Linux', 'Darwin']
            'browser'=>'Chrome', // ['Chrome', 'Firefox'], 
            'ip'=>'127.0.0.1', // ['192.168.2.200', '192.168.2.201', '222.222.222.222']
            'folder'=>'files'
        ],
        // 'deny'     =>  [
        //     'platform'=>'Linux', // ['Windows', 'Linux', 'Darwin']
        //     'browser'=>'Firefox', // ['Chrome', 'Firefox'], 
        //     'ip'=>'127.0.0.2', // ['192.168.2.200', '192.168.2.201', '222.222.222.222']
        //     'folder'=>'archive'
        // ],
    )
);

$Mind = new Mind($conf);

echo 'Uzaktan erişime açıktır';
```

#### lifetime

Projenin yayın süresini yönetmeye yarar. 3 farklı kullanım şekli bulunur. Bu kullanım şekillerine aşağıda detaylı olarak yer verilmiştir.

- Başlama tarihi belirtmek
- Sona erme tarihi belirtmek
- Başlangıç ve Sona erme tarihi belirtmek

**Başlama tarihi belirtmek**
Projenin belirtilen zamandan sonra yayınlanması için tercih edilen bir kullanım şeklidir, proje yayında olmadığı süre boyunca görünmesi istenen mesaj özel olarak belirtilebilir, varsayılan olarak `You must wait for the specified time to use your access right.` (Erişim hakkınızı kullanmak için belirtilen süreyi beklemeniz gerekmektedir.) mesajı gösterilmektedir.

###### Örnek

```php
$conf = array(

    'firewall'  =>  array(
        'lifetime'=>[
            'start'=>'2022-09-17 20:31:51',
            'end'=>'2022-09-17 20:57:30',
            'message' => 'Erişim hakkınızı kullanmak için belirtilen süreyi beklemeniz gerekmektedir.'
        ]

    )
);

$Mind = new Mind($conf);

```

**Sona erme tarihi belirtmek**
Projenin belirtilen zamandan sonra yayından kalkması için tercih edilen bir kullanım şeklidir, proje yayında olmadığı süre boyunca görünmesi istenen mesaj özel olarak belirtilebilir, varsayılan olarak `The deadline for your access has expired.` (Erişiminiz için son tarih doldu.) mesajı gösterilmektedir.

###### Örnek

```php
$conf = array(

    'firewall'  =>  array(
        'lifetime'=>[
            'end'=>'2022-09-17 20:31:51',
            'message'=>'Erişiminiz için son tarih doldu.'
        ]

    )
);

$Mind = new Mind($conf);

```

**Başlangıç ve Sona erme tarihi belirtmek**

Projenin belirtilen zaman aralığı dışında yayından kalkması için tercih edilen bir kullanım şeklidir, proje yayında olmadığı süre boyunca görünmesi istenen mesaj özel olarak belirtilebilir, varsayılan olarak `The access right granted to you has expired.` (Size verilen erişim hakkının süresi doldu.) mesajı gösterilmektedir.

###### Örnek

```php
$conf = array(

    'firewall'  =>  array(
       'start'=>'2022-09-17 20:31:51',
        'end'=>'2022-09-17 20:57:30',
        'message' => 'Size verilen erişim hakkının süresi doldu.'
    )
);

$Mind = new Mind($conf);

```



**Bilgi:** 

Her HTTP POST isteği yeni bir `token` parametresi oluşmasını sağlar. `allow` ve `deny` birlikte kullanılabilir, çakışan kısımlarda `deny` kuralları dikkate alınır.

`platform` kısmında [getOS()](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#getos) metodunda desteklenen işletim sistemi adları kullanılabilir. `browser` kısmında [getBrowser()](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#getbrowser) metodunda desteklenen İnternet tarayıcısı adları desteklenmektedir. `ip` kısmında `ipv4` söz dizimindeki ip adresleri kullanılabilir. `folder` kısmında aksi belirtilmezse `public` klasörüne erişim izni verilir.

`folder` ile ilgili yapılan ayarlamanın `nginx` sunucularda da geçerli olabilmesi için, [policyMaker()](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#policyMaker) maddesinde değinilen bilgi notundan istifade edebilirsiniz.



---

## redirect()

Belirtilen adrese doğrudan veya belli bir süre sonra yönlendirme yapmak amacıyla kullanılır, boş bırakılırsa **Mind.php** dosyasının bulunduğu klasör'e yönlendirme yapar. İki parametre alır, ilk parametre yönlenecek adrestir ve `string` olarak belirtilmesi gerekir, ikinci parametre kaç saniye sonra yönlenmesi gerektiği bilgisidir ve `integer` olarak belirtilmesi gerekir. Üçüncü parametre ise yönlendirmeye kalan sürenin atanacağı element adı bilgisidir. Bu parametre javascript'in `querySelectorAll` metotuna gönderildiğinden, javascript'in element'e erişim yaklaşımı referans alınarak belirtilmelidir.

##### Örnek

```php
$this->redirect();
```

veya

```php
$this->redirect('contact');
```

veya

```php
$this->redirect('https://www.google.com');
```

veya

```php
$this->redirect('', 5);
```
    
veya

```php
$this->redirect('contact', 5);
```

veya

```php
$this->redirect('https://www.google.com', 5);
```

veya

    
```html
<?=$this->redirect('https://www.google.com', 20, '.example1 #redirect-time');?>

<form class="example1" action="">
    
    <h5>INPUT TEXT</h5>
    <input type="text" id="redirect-time">
    
    <br>
    
    <h5>TEXTAREA</h5>
    <textarea id="redirect-time"></textarea>
    
    <br>
    
    <h5>SPAN</h5>
    <span id="redirect-time"></span>
    
    <br>
    
    <h5>i</h5>
    <i id="redirect-time"></i>
    
    <br>
    
    <h5>CHECKBOX</h5>
    <input type="checkbox" id="redirect-time">
    <label for="redirect-time"> I have a bike</label>
    
    <br>

    <h5>OPTION</h5>
    <select>
        <option id="redirect-time">Redirect time</option>
        <option>Nothing</option>
    </select>
    
    <br>

    <h5>MULTI OPTION</h5>
    <select name="fruit" multiple>
        <option value ="none">Nothing</option>
        <option value ="guava" id="redirect-time">Guava</option>
        <option value ="lychee">Lychee</option>
        <option value ="papaya">Papaya</option>
        <option value ="watermelon">Watermelon</option>
    </select> 

</form>
```


---

## permalink()

Kendisiyle paylaşılan veriyi arama motoru dostu bir link yapısına dönüştürmek amacıyla kullanılır. İki parametre alabilir, İlk parametre de link yapısına dönüştürülmek istenen veri `string` olarak, ikinci parametrede ise aşağıda belirtilen ayarlar yer alır. ikinci parametre isteğe bağlı olup belirtilme zorunluluğu bulunmamaktadır.

##### Örnek

```php
$str = 'Merhaba dünya';
echo $this->permalink($str);
```


### Ayraç (delimiter)
 Varsayılan olarak `string` yapıda ki veri içinde bulunan boşluklar tire `-` yardımıyla ayrılır, eğer tire `-` yerine başka bir parametre barındırması arzu edilirse, `delimiter` özelliği kullanılabilir.
 
##### Örnek

```php
$str = 'Merhaba dünya';
$option = array(
    'delimiter' => '_'
);
echo $this->permalink($str, $option);
```

### Limit (limit)
 Varsayılan olarak `string` yapıda ki veri `SEO` dostu bir yapıya kavuşturularak geriye döndürülür , eğer belli bir karakter sayısında döndürülmesi istenirse, `limit` özelliği kullanılabilir.
 
##### Örnek
 
```php
$str = 'Merhaba dünya';
$option = array(
    'limit'=>'3'
);
echo $this->permalink($str, $option);
```

 veya

```php
$str = 'Merhaba dünya';
$option = array(
    'limit'=>3
);
echo $this->permalink($str, $option);
```

### Harf boyutu (lowercase)
Varsayılan olarak `string` yapıda ki veri tamamıyla küçük harfe dönüştürülür, eğer harflerin yazıldığı boyutta kalması istenirse, `lowercase` özelliği kullanılabilir.

##### Örnek

```php
$str = 'Merhaba dünya';
$option = array(
    'lowercase'=>false
);
echo $this->permalink($str, $option); 
```

### Kelime değişimi (replacements)
`string` yapıda ki veri içinde belirtilen kelimeleri değiştirmek mümkündür, 

##### Örnek

```php
$str = 'Merhaba dünya';
$option = array(
    'replacements'=>array(
        'Merhaba'=>'hello', 
        'dünya'=>'world'
    )
);
echo $this->permalink($str, $option);
```
    
### Karakter desteği (transliterate)
Farklı alfabelere ait harfler varsayılan olarak `SEO` dostu karşılıklarıyla değiştirilir, eğer olduğu gibi yazılmaları istenirse, `false` parametresi belirtilmelidir.

##### Örnek

```php
$str = 'Merhaba dünya';
$option = array(
    'transliterate'=>false
);
echo $this->permalink($str, $option);
```

### Veritabanına kayıt için benzersiz bağlantı oluşturma

`string` yapıdaki veri, veritabanı tablosunun belirtilen sütununda aranır, eğer bir veya daha fazla bulunursa bunların toplam adedi tespit edilir.

Elde edilen bu toplam, bir döngü yardımıyla, `string` yapıdaki verinin sonuna, `delimiter` ayracından yardım alınarak eklenir ve veritabanı tablosunda tek tek varlık kontrolü yapılır.
 
 Eğer söz konusu bağlantı adayı, veritabanı tablosunda bulunmuyorsa o hali geri döndürülür. 
 
 Eğer tüm bulgularda yapılan varlık kontrolü neticesinde bağlantı adayı için uygun bir numaralandırma söz konusu değilse, bulgu toplamı **1** artırılmış şekilde bağlantı güncellenerek geri döndürülür.
 
Varsayılan olarak `delimiter` parametresi için tire **-** değeri, `linkColumn` parametresi için **link** değeri ve `titleColumn` parametresi ise **title** değeri tanımlanmıştır.

##### Örnek

```php
$str = 'Merhaba dünya';
$option = array(
    'unique' => array(
        'tableName' => 'pages'
    )
);
echo $this->permalink($str, $option);
```

veya 

```php
$str = 'Merhaba dünya';
$option = array(
    'unique' => array(
        'tableName' => 'pages',
        'delimiter' => '_'
    )
);
echo $this->permalink($str, $option);
```
    
    
veya

```php
$str = 'Merhaba dünya';
$option = array(
    'unique' => array(
        'tableName' => 'pages',
        'titleColumn' => 'title',
        'linkColumn' => 'link'
    )
);
echo $this->permalink($str, $option);
// merhaba-dunya-1
```

### Dizine kayıt için benzersiz dosya adı oluşturma
Benzersiz dosya adı oluşturmaya yarar, iki parametrenin de belirtilmesi zorunludur. `directory` ifadesinin değeri olan `./` parametresine dizin yolu yazılmalıdır. 


##### Örnek

```php 
$str = 'samantha';
$option = array(
    'unique'=>array(
        'directory' => './'
    )
);
echo $this->permalink($str, $option);
// samantha-1
```


---

## timeForPeople()

Belirtilen zaman damgasının ne kadar süre geçmişte veya gelecekte olduğunu öğrenmek için kullanılır, iki parametre alır, ilki zorunlu ikincisi zorunlu değildir.

**Kullanılabilir Parametreler**

* y ( Yıl )
* m ( Ay )
* w ( Hafta )
* d ( Gün )
* h ( Saat )
* i ( Dakika )
* s ( Saniye )
* a ( Önce )
* l ( Sonra )
* p ( Çoğul takısı )
* j ( Şimdi )
* f ( Tam zaman açıklamasının görünüp görünmemesi )

##### Örnek

```php
$datetime = $this->timestamp;
echo $this->timeForPeople($datetime); 
```

veya

```php
$datetime = '2020-04-19 11:38:43';
echo $this->timeForPeople($datetime); 
```

veya

```php
echo $this->timeForPeople('2020-04-19 11:38:43', ['f'=>true]);
```

veya

```php
echo $this->timeForPeople('2010-10-20');
```

veya

```php
echo $this->timeForPeople('2010-10-20', ['f'=>true]);
```

veya

```php
echo $this->timeForPeople('@1598867187');
```

veya

```php
echo $this->timeForPeople('@1598867187', ['f'=>true]);
```

veya

```php
$options = array(
    'y' => 'Yıl',
    'm' => 'Ay',
    'w' => 'Hafta',
    'd' => 'Gün',
    'h' => 'Saat',
    'i' => 'Dakika',
    's' => 'Saniye',
    'l' => 'Sonra',
    'a' => 'Önce'
);

$datetime = '2020-04-19 11:38:43';
echo $this->timeForPeople($datetime, $options);
```

veya

```php
$options = array(
    'y' => 'Yıl',
    'm' => 'Ay',
    'w' => 'Hafta',
    'd' => 'Gün',
    'h' => 'Saat',
    'i' => 'Dakika',
    's' => 'Saniye',
    'a' => 'Önce',
    'l' => 'Sonra',
    'p' => '',
    'f' => true 
);

$datetime = '2020-04-19 11:38:43';
echo $this->timeForPeople($datetime, $options);
```

---

## timezones()

Bu fonksiyon, zaman damgasını isabetli kılmak amacıyla tercih edilen `date_default_timezone_set()` fonksiyonunda kullanılabilen bölge kodlarını dizi halinde sunar. Daha fazla bilgi için [Desteklenen Zaman Dilimlerinin Listesi](https://secure.php.net/manual/tr/timezones.php) sayfasını inceleyebilirsiniz.

##### Örnek


```php
$this->print_pre($this->timezones());
```

---

## languages()

Bu fonksiyon, 182 adet dilin evrensel ve yerel ismi ile kısaltmasını dizi halinde sunar. Daha fazla bilgi için [Stackoverflow](https://stackoverflow.com/a/4900304) sayfasını inceleyebilirsiniz.

##### Örnek


```php
$this->print_pre($this->languages());
```

---

## currencies()

Bu fonksiyon, 162 adet para birimi isim ve kısaltmasını dizi halinde sunar. Daha fazla bilgi için [Github Gist](https://gist.github.com/champsupertramp/95493faa7ba12b61bf6e#gistcomment-2085024) sayfasını inceleyebilirsiniz.

##### Örnek


```php
$this->print_pre($this->currencies());
```

---

## morsealphabet()

Bu fonksiyon, varsayılan olarak belirtilen harflerin mors alfabesi karşılığını veya ikinci parametrede gönderilen özel mors kodları karşılığını bir dizi türünde geriye döndürmeye yarar.

##### Örnek


```php
$this->print_pre($this->morsealphabet());
```

veya


```php
$morseDictionary = array(
    'c' => '.-', '(' => '-...', 'a' => '-.-.', 'ç' => '-.-..', 'd' => '-..', 'e' => '.', 'f' => '..-.', 'g' => '--.', 'ğ' => '--.-.', 'h' => '....', 'ı' => '..', 'i' => '.-..-', 'j' => '.---', 'k' => '-.-', 'l' => '.-..', 'm' => '--', 'n' => '-.', 'o' => '---', 'ö' => '---.', 'p' => '.--.', 'q' => '--.-', 'r' => '.-.', 's' => '...', 'ş' => '.--..', 't' => '-', 'u' => '..-', 'ü' => '..--', 'v' => '...-', 'w' => '.--', 'x' => '-..-', 'y' => '-.--', 'z' => '--..', '0' => '-----', '1' => '.----', '2' => '..---', '3' => '...--', '4' => '....-', '5' => '.....',
    '6' => '-....','7' => '--...','8' => '---..','9' => '----.','.' => '.-.-.-',',' => '--..--','?' => '..--..','\'' => '.----.','!'=> '-.-.--','/'=> '-..-.','b' => '-.--.',')' => '-.--.-','&' => '.-...',':' => '---...',';' => '-.-.-.','=' => '-...-','+' => '.-.-.','-' => '-....-','_' => '..--.-','"' => '.-..-.','$' => '...-..-',
    '@' => '.--.-.','¿' => '..-.-','¡' => '--...-',' ' => '/'
);
$this->print_pre($this->morsealphabet($morseDictionary));
```


---

## session_check()

`session_start()` komutunun kişiselleştirilmiş şekilde uygulanmasını sağlamak amacıyla kullanılır, Oturum Ayarları kısmında bulunan ayarlar ışığında oturumları etkinleştirmeye yarar,**Mind.php** dosyasında bulunan `__construct()` metotu içinde çalıştırılarak etkin hale getirilmiştir.

##### Örnek

```php
$this->session_check();
```

---

## remoteFileSize()

Uzak sunucuda barınan dosyanın boyunutunu(byte olarak) öğrenmeye yarar.

##### Örnek

```php
echo $this->remoteFileSize('https://github.com/fluidicon.png');
```

---

## addLayer()

`.php` uzantıya sahip dosya ya da dosyaları projeye dahil etmek amacıyla kullanılır. `$file` ve `$cache`, dosyalara ait yollarının tutulduğu değişkenleri temsil etmektedir. Dosya yolları `.php` uzantısı olmadan belirtilmelidir.

Her iki değişkene de `string` veya `array` olarak dosya yolları gönderilebilir, eğer dosyalar varsa projeye `require_once` yöntemiyle dahil edilirler. 

İki parametre alır, ilk önce ikinci parametre olan `$cache` dosyaları, ardından birinci parametre olan `$file` değişkeninde bulunan dosyalar projeye dahil edilir. `$file` ve `$cache` parametreleri isteğe bağlı olup, belirtilme zorunluluğu bulunmamaktadır. Sınıf dışından erişime izin vermek için `public` özelliği tanımlanmıştır.

Her iki parametreye de uzantısız dosya yolları string veya dizi biçiminde belirtilebileceği gibi, bu dosya yolları içinde sınıf metotu çağıran yollar da tanımlanabilir.

##### Örnek

```php
$this->addLayer('app/views/home');
```

veya

```php
$file = array(
    'app/views/header',
    'app/views/content',
    'app/views/footer'
);
$this->addLayer($file);
```

veya

```php
$this->addLayer('app/views/home', 'app/model/home');
```

veya

```php
$file = [
    'app/views/layout/header',
    'app/views/home',
    'app/views/layout/footer'
];
$cache = [
    'app/middleware/auth',
    'app/database/install',
    'app/model/home'
];
$this->addLayer($file, $cache);
```

veya 

```php
$this->addLayer('HomeController:index@create',
[
    'BlogController:index@create',
    'LogController:index@create'
]);
```

veya

```php
$this->addLayer([
    'BlogController:index@create',
    'LogController:index@create'
]);
```

veya 

```php
$this->addLayer([
    'HomeController:index@create',
    'StoreController:index@create'
],
[
    'BlogController:index@create',
    'LogController:index@create'
]);
```

---

## columnSqlMaker()
Bu fonksiyon, veritabanı tablo veya sütunu oluştururken yazılması icap eden `sql` söz dizimini oluşturmak amacıyla kullanılır. `sql` söz dizimi, `tableCreate` ve `columnCreate` metotlarına gönderilen şema'nın yorumlanmasıyla oluşturulur. 

---

## wayMaker()
Bu fonksiyon, `route` ve `addLayer` metotlarına gönderilen parametreli adresin ayrıştırılması amacıyla kullanılır. 

---

## generateToken()
Bu fonksiyon, belirtilen karakter uzunluğunda rastgele parametre oluşturmak amacıyla kullanılır, `integer` türünde bir parametre alır, belirtilme zorunluluğu bulunmamaktadır. Varsayılan olarak karakter uzunluğu `100` olarak belirtilmiştir.

##### Örnek

```php
echo $this->generateToken();
```

veya

```php
echo $this->generateToken(30);
```

---

## coordinatesMaker()

Bu fonksiyon, ziyaretçinin GPS konumunun paylaşılmasına izin vermesi halinde, konum bilgisini elde etmek için kullanılır. `string` bir parametre alır ve belirtilmesi zorunlu değildir. Bu parametre javascript'in `querySelectorAll` metotuna gönderildiğinden, javascript'in element'e erişim yaklaşımı referans alınarak belirtilmelidir.(`form.example #my-coordinates` gibi). Eğer parametre belirtilmezse varsayılan olarak id'si `#coordinates` olan elementlere ziyaretçi konumunu ekler.

##### Örnek

```html
<?=$this->coordinatesMaker('form.example1 #my-coordinates');?>
<form class="example1" action="">

    <h5>INPUT TEXT</h5>
    <input type="text" id="my-coordinates">

    <br>

    <h5>TEXTAREA</h5>
    <textarea id="my-coordinates"></textarea>

    <br>

    <h5>SPAN</h5>
    <span id="my-coordinates"></span>

    <br>

    <h5>i</h5>
    <i id="my-coordinates"></i>

    <br>

    <h5>CHECKBOX</h5>
    <input type="checkbox" id="my-coordinates">
    <label for="my-coordinates"> I have a bike</label>

    <br>

    <h5>OPTION</h5>
    <select>
        <option id="my-coordinates">My Coordinate</option>
        <option>Nothing</option>
    </select>

    <br>

    <h5>MULTI OPTION</h5>
    <select name="fruit" multiple>
        <option value ="none">Nothing</option>
        <option value ="guava" id="my-coordinates">Guava</option>
        <option value ="lychee">Lychee</option>
        <option value ="papaya">Papaya</option>
        <option value ="watermelon">Watermelon</option>
    </select> 

</form>
```

veya

```html
<?=$this->coordinatesMaker();?>
<form action="">

    <h5>INPUT TEXT</h5>
    <input type="text" id="coordinates">

    <br>

    <h5>TEXTAREA</h5>
    <textarea id="coordinates"></textarea>

    <br>

    <h5>SPAN</h5>
    <span id="coordinates"></span>

    <br>

    <h5>i</h5>
    <i id="coordinates"></i>

    <br>

    <h5>CHECKBOX</h5>
    <input type="checkbox" id="coordinates">
    <label for="coordinates"> I have a bike</label>

    <br>

    <h5>OPTION</h5>
    <select>
        <option id="coordinates">My Coordinate</option>
        <option>Nothing</option>
    </select>

    <br>

    <h5>MULTI OPTION</h5>
    <select name="fruit" multiple>
        <option value ="none">Nothing</option>
        <option value ="guava" id="coordinates">Guava</option>
        <option value ="lychee">Lychee</option>
        <option value ="papaya">Papaya</option>
        <option value ="watermelon">Watermelon</option>
    </select> 

</form>
```



****Bilgi:**** Chrome, Firefox tarayıcılarınında test edilmiştir. Cep telefonu yoluyla paylaşılan konumların doğruluk oranı ortalama 4 ile 12 m2'dir. Eski nesil GPS modüle sahip masaüstü bilgisayar yoluyla paylaşılan konumların doğruluk oranı ise ortalama 7.000 m2'dir.

---

## encodeSize()

Belirtilen byte değerini, dönüştürebileceği en büyük boyut türüne dönüştürmeye yarar. Sadece byte türünde bir değer veya bir size anahtarı barındıran dizi(dosya dizisi gibi) gönderilebilir. 

**Desteklenen Boyutlar**
`KB`, `MB`, `GB`, `TB`, `PB`, `EB`

##### Örnek


```php
// 1 KB
echo $this->encodeSize(1024);
```

veya

```php
// 1 MB
echo $this->encodeSize(1048576);
```

veya

```php
// 1 GB
echo $this->encodeSize(1073741824);
```

veya

```php
// 1 TB
echo $this->encodeSize(1099511627776);
```

veya

```php
// 1 PB
echo $this->encodeSize(1125899906842624);
```

veya

```php
// 1 EB
echo $this->encodeSize(1152921504606850000);
```

veya

```php
// 1 MB
$file = array('size'=>1048576);
echo $this->encodeSize($file);
```

---

## decodeSize()

Belirtilen türdeki boyutu, byte'a dönüştürmek amacıyla kullanılır. Boyut ve boyut kısaltması arada bir boşluk bırakılarak belirtilmelidir.

**Desteklenen Boyutlar**
`KB`, `MB`, `GB`, `TB`, `PB`, `EB`


```php
// 1024
echo $this->decodeSize('1 KB');
```

veya


```php
// 1048576
echo $this->decodeSize('1 MB');
```

veya


```php
// 1073741824
echo $this->decodeSize('1 GB');
```

veya


```php
// 1099511627776
echo $this->decodeSize('1 TB');
```

veya


```php
// 1125899906842624
echo $this->decodeSize('1 PB');
```

veya


```php
// 1152921504606846976
echo $this->decodeSize('1 EB');
```



---

## toSeconds()

Kendisiyle paylaşılan `string` türündeki zaman verisini saniyeye dönüştürmeye yarar. En az iki zaman değeri belirtilmelidir.

##### Örnek


```php
echo '2:2 - 7320<br>';
echo $this->toSeconds('2:2');

echo '<hr>';

echo '2:2:0 - 7320<br>';
echo $this->toSeconds('2:2:0');

echo '<hr>';

echo '02:02 - 7320<br>';
echo $this->toSeconds('02:02');

echo '<hr>';

echo '02:02:00 - 7320<br>';
echo $this->toSeconds('02:02:00');
```


---

## toTime()

Kendisiyle paylaşılan `integer` türündeki saniyeyi Saat, Dakika ve Saniye'den oluşan bir zaman damgasına dönüştürmeye yarar.

##### Örnek

```php
echo '7320 - 02:02:00<br>';
echo $this->toTime(7320);
```


---

## summary()

Kendisiyle paylaşılan `string` türündeki metni belirtilen karakter sayısına kadar kısaltmaya yarar. dört parametre alır. İlk parametre metin, ikinci parametre karakter sayısı, üçüncü parametre kısaltma gerçekleştiğinde görünmesi arzu edilen `text` ya da `html` değer, dördüncü parametre ise metnin kodlardan, boşluklardan arındırılması için kullanılır. Sadece üçüncü ve dördüncü parametrelerin belirtilme zorunluluğu bulunmamaktadır. Varsayılan olarak dördüncü parametre `true` belirtilmiştir, böylelikle kısaltılan metin kodlardan ve anormal boşluklardan arındırılır.

##### Örnek

```php
$str = 'Türkiye\'de, yaklaşık 10.000 bitki türü yetişir. Bu bitki türlerinin yaklaşık 3.000\'i ise Türkiye\'ye endemiktir. Bu özelliği ile Türkiye, tüm Avrupa\'dakinden daha fazla endemik bitki türüne sahiptir.';
echo $this->summary($str, 46, ' ...');
```


---

## getIPAddress()

Projeyi görüntüleyen kullanıcının ip adresini elde etmeye yarar.

##### Örnek


```php
echo $this->getIPAddress();
```

---

## getLang()

Projeyi görüntüleyen kullanıcının internet tarayıcısının dilinin kısaltmasını elde etmeye yarar. Sağlanan dil kısaltmasının [languages()](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#languages-1) metotundaki dillerin kısaltmalarıyla uyumlu olmasına özen gösterilmiştir.

##### Örnek

```php
echo $this->getLang();
```


---

## getAddressCode()

Alan adları ve IP Adreslerinin HTTP yanıt kodlarını elde etmek amacıyla kullanılır. Bir veya daha fazla adresin yanıt kodunun talep edilmesi mümkündür. 

İki parametre alır, ilk parametrede `string` ve `array` veri türünde gönderilen adresler yer alırken, ikinci parametrede hangi HTTP yanıt kodlarına sahip adreslerin sorgularının geri döndürülmesi gerektiği `string` veya `array` veri türünde belirtilir.

###### Örnek

```php
$ip = $this->addressGenerator('174.129.25.170', '174.129.25.200');
$result = $this->getAddressCode($ip);
$this->print_pre($result);
```

veya

```php
$ip = $this->addressGenerator('174.129.25.170', '174.129.25.200');
$result = $this->getAddressCode($ip, 403);
$this->print_pre($result);
```

veya

```php
$ip = $this->addressGenerator('174.129.25.170', '174.129.25.200');
$result = $this->getAddressCode($ip, array(403));
$this->print_pre($result);
```

veya

```php
$ip = $this->addressGenerator('174.129.25.170', '174.129.25.200');
$result = $this->getAddressCode($ip, array(301,403));
$this->print_pre($result);
```

veya

```php
$result = $this->getAddressCode('https://twitter.com/', array(200, 301,403));
$this->print_pre($result);
```

---

## addressCodeList()

HTTP yanıt kodlarını `array` olarak geri döndürmeye yarayan bir metotdur.

##### Örnek

```php
$this->print_pre($this->addressCodeList());
```

---

## addressGenerator()

Bu metot iki farklı adresin (ipv4, ipv6 ve onion) arasındaki adresleri oluşturarak `array` türünde geri döndürmek amacıyla kullanılır.

##### Örnek


```php
// ipv4
$result = $this->addressGenerator('255.255.254.200', '255.255.254.230');
$this->print_pre($result);

// ipv6
$start = "2001:0db8:85a3:0000:0000:8a2e:0370:7334";
$end = "2001:0db8:85a3:0000:0000:8a2e:0370:7384";
$result = $this->addressGenerator($start, $end, 'ipv6');
$this->print_pre($result);

// onion
$start = "abcdefghijklmnop";
$end = "abcdefghijklmnoz";
$result = $this->addressGenerator($start, $end, 'onion');
$this->print_pre($result);


```

---

## committe()

Veritabanına eklenmesi düşünülen veri kümesi üzerinde çalışmak yerine `$this->post` veri kümesini olduğu gibi veritabanına göndermeyi seçmek, kullanıcı rolü gibi yetki gerektiren parametreleri barındıran tabloda yapılacak güncelleme işlemlerini riskli hale getiriyordu.

Şöyle ki, formda kullanıcı rolü olmamasına rağmen arayüze yapılan küçük bir cerrahi kesik yardımıyla role name'ine sahip bir alan oluşturup değer atanarak form post edilirse, bu istek veritabanına yansır, böylelikle ilgili kullanıcının rolü değişmiş olur.

Projelerimde `$this->post` veri kümesini bu şekilde kullanmıyorum ve önermiyorum fakat bir metot yardımıyla farkındalık yaratmak yararlı olur diye düşünerek bu metodu oluşturdum.

Adını da veri kümesini denetleme görevinden esinlenerek kurul/komisyon adını verdim.

Bu metot, biri zorunlu olmak üzere 3 parametre alır. İlk parametre veri kümesini temsil eder ve `array` biçiminde gönderilmek zorundadır. İkinci parametre dikkate alınması gereken alanları, üçüncü parametre ise yok sayılması istenen alanları temsil eder. ikinci ve üçüncü parametreler `string` veya `array` biçiminde gönderilebilir. Eğer ikinci ve üçüncü parametrelerden çakışanlar varsa, yok sayılırlar.

3'ncü parametreyi daha iyi anlamanız için şöyle düşünebilirsiniz; eğer kullanıcı rolü ve kullanıcı adının değiştirilmesini kesinlikle istemiyorsanız, ['username', 'role'] şeklinde belirttiğinizde formdan bu yönde  veri gönderilmişse bile dikkate alınmaz.

Sadece ilk parametre gönderilirse veri kümesinin tüm elemanları kontrol edilir, boş değerler yerine `null` atanarak geri döndürülür. 

##### Örnek
```php
$request = [
    'username'=>'ali',
    'password'=>'123',
    'role'=>1,
    'tags'=>['tag1','tag2']
];

$values = $this->committe($request);
$this->print_pre($values);
echo '<hr>';
$values = $this->committe($request, 'username');
$this->print_pre($values);
echo '<hr>';
$values = $this->committe($request, 'username', 'username');
$this->print_pre($values);
echo '<hr>';
$values = $this->committe($request, null, 'username');
$this->print_pre($values);
echo '<hr>';
$values = $this->committe($request, null, ['username', 'role']);
$this->print_pre($values);
echo '<hr>';
$values = $this->committe($request, ['username', 'role'], ['username', 'role']);
$this->print_pre($values);
echo '<hr>';
```

---

## getOS()

Projenin çalıştığı sunucu işletim sistemi ismini elde etmek için kullanılır. `Darwin`, `Windows`, `Linux` işletim sistemlerini desteklemektedir, bunlar dışındaki işletim sistemleri `Unknown` olarak isimlendirilir.

##### Örnek

```php
echo $this->getOS();
```

---

## getSoftware()

Projenin çalıştığı işletim sistemi üzerindeki sunucu yazılımı ismini elde etmek için kullanılır. `Apache`, `Microsoft ISS`, `LiteSpeed` ve `Nginx` yazılımları desteklemektedir, bunlar dışındaki sunucu yazılımları `Unknown` olarak isimlendirilir.

##### Örnek

```php
echo $this->getSoftware();
```

---

## getBrowser()

Kullanıcı tarayıcısının adını göstermeye yarar, eğer özel olarak `HTTP_USER_AGENT` değeri belirtilirse, o değerin üretildiği tarayıcının adını geri döndürür. 

**Desteklenen tarayıcılar:**

* Edge
* Firefox
* Safari
* Chrome
* Opera

##### Örnek

```php
echo $this->getBrowser();

echo '<br>';

// Safari
// Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.3 Safari/605.1.15
echo $this->getBrowser('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.3 Safari/605.1.15');

echo '<br>';

// Chrome
// Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36
echo $this->getBrowser('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36');

echo '<br>';

// Firefox
// Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0
echo $this->getBrowser('Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0');

echo '<br>';

// Edge
// Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36 Edg/99.0.1150.46
echo $this->getBrowser('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36 Edg/99.0.1150.46');

echo '<br>';

// Opera
// Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 OPR/85.0.4341.18
echo $this->getBrowser('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36 OPR/85.0.4341.18');

```

---

## route()

Route fonksiyonu özelleştirilebilir rotalar tanımlamak ve bu rotalara özel zihinler yüklemek için kullanılır. Zihin kelimesi, Model, View, Controller, Middleware gibi çeşitli katmanları tanımlamak amacıyla kullanılmıştır. Böylelikle geliştirici, katmanların hangi rotaya tanımlandığını açıkça görebilir, yönetebilir ve proje ihtiyacına özel tasarım deseni oluşturabilir.  
  
Rotalar, `Mind.php` dosyasıyla aynı dizinde bulunan `index.php` dosyası içine tanımlanır, dolayısıyla `new Mind()` çağrısının atandığı değişkeni ön ek kabul ederek çalışır.

`url`, `file` ve `cache` parametreleri alabilen `route()` fonksiyonu, `url` parametresini `string` olarak kabul eder, `file` ve `cache` parametreleriniyse `string` ve `array` olarak kabul etmektedir. Bu üç parametreden `file` ve `cache` parametrelerinin belirtilme zorunluluğu yoktur. 

`file` ve `cache` parametreleri, uzantısı belirtilmeyen `php` dosyalarının yollarından meydana gelir. `file` ve `cache` parametresi aynı zamanda sınıf metotlarını çağırmak için de kullanılabilir. 

Katmanların yüklenmesi hakkında daha fazla bilgi için, [addLayer()](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#addLayer) maddesini inceleyebilirsiniz.


##### Örnek

```php
<?php

require_once '../src/Mind.php';

$Mind = new Mind();

$Mind->route('/', 'app/views/welcome');

?>
```


#### Url

`/` slaş sembolü dışında ki rotalara parametre isimleri tanımlamak mümkündür, eğer adres satırına `edit/users/1` yazılırsa ve `users` parametresini `table` ismiyle, `1` parametresini ise `id` ismiyle isimlendirmek istenirse, aşağıda ki yolu izlemek gerekir.

```php
$Mind->route('edit:table@id', 'app/view/edit');
```

Kontrolü sağlamak için `app/view/edit` yolunda ki `edit.php` dosyası içine

```php
$this->print_pre($this->post);
```

kodu eklendikten sonra, adres satırına `edit/users/1` yazarak, parametre isimlerinin `url` de tanımlanan parametre isimlerine pay edildiği görülebilir.

```php
Array (
    [table] => users
    [id] => 1
)
```

Ayrıca adres satırına `edit/users/1/2/diger` gibi rota da isimlendirilmemiş parametreler yazılırsa bunlar görmezden gelinir. Eğer `url` parametresine aşağıda ki gibi parametre isimleri tanımlanmamışsa

```php
$Mind->route('edit', 'app/view/edit');
```

ve ulaşılmak istenen rota adresi `edit/users/1` ise, `app/view/edit` yolunda ki `edit.php` dosyası içine

```php
$this->print_pre($this->post);
```

kodu eklendiğinde, isimlendirilmemiş parametreler aşağıda ki şekilde görünecektir.

```php
Array (
    [0] => users
    [1] => 1
)
```

#### File

`cache` parametresinde belirtilen dosya veya dosyalar projeye dahil edildikten sonra projeye `file` parametresinde tanımlanan dosya(lar) dahil edilir.

##### Örnek

```php
$Mind->route('/', 'app/view/home');
```

veya

```php
$arr = array(
    'app/view/layout/header',
    'app/view/home',
    'app/view/layout/footer'
    );
$Mind->route('/', $arr);
```

#### Cache

Eğer `cache` parametresi belirtilirse, belirtilen `cache` dosyaları, `file` parametresinde belirtilen dosya(lar) henüz projeye dahil edilmeden önce, ilk eklenenden son eklenene doğru tek tek varlık kontrolünden geçirilerek projeye dahil edilir. 

##### Örnek

```php
$Mind->route('/', 'app/view/home', 'database/CreateTable');
```

veya

```php
$arr = array(
    'database/CreateTable',
    'model/home'
);
$Mind->route('/', 'view/home', $arr);
```
    
veya

`app/controller/HomeController.php` dosyasını oluşturup içine aşağıda ki kodları kaydedin.
 
```php
<?php

class HomeController extends Mind
{

    public function __construct($conf = array())
    {
        parent::__construct($conf);
    }

    public function index()
    {
        //
        echo 'merhaba ben index';
    }

    public function create()
    {
        //
        echo 'merhaba ben create';
    }

}
```

daha sonra aşağıda ki rotayı tanımlayın ve kontrol edin.

    
```php
$Mind->route('home', 'app/views/home', 'app/controller/HomeController:index@create');
```

Sınıf içinde ki `index` ve `create` metotlarının çalıştığını görebilirsiniz. Bir veya daha fazla metotu bir rotaya tanımlamak mümkündür. 

Oluşturulan bu `HomeController` sınıfı içinden `Mind` metotlarına `$this->` ön ekiyle ulaşılabilir.

Eğer metot çağırılırsa sınıf adıyla dosya adının aynı olması gerekmektedir.


---

## write()

Belirtilen içeriği, belirtilen isimde ki dosyaya yazmak amacıyla kullanılır, söz konusu dosya ve dizini yoksa oluşturulur, eğer işlem başarılıysa `true`, değilse `false`  değeri döndürülür. üç parametre alır;

##### İlk parametre

içeriği temsil etmekte olup `string` veya `array` türünde gönderilebilir, dizi olarak gönderilmesi halinde dizi elemanları aralarına `:` sembolü eklenerek `string`'e dönüştürülmüş şekilde dosyaya yazılır.

##### İkinci parametre

Dosya yolunu temsil etmektedir, eğer dosya varsa söz konusu veri dosyanın sonuna eklenir, eğer dosya yoksa yolda belirtilen isimde bir dosyayı oluşturulur ve bu dosyaya yazılır.

##### Üçüncü parametre

Dizi olarak belirtilen verileri ayırmada kullanılacak değeri temsil etmektedir. Belirtilme zorunluluğu yoktur, varsayılan olarak `:` tanımlanmıştır.

##### Örnek

```php
$str = 'Merhaba dünya';
$this->write($str, 'yeni.txt');
```

veya

```php
$str = array('Merhaba', 'Dünya');
$this->write($str, 'yeni.txt');
```
    

veya

```php
$str = array('Merhaba', 'Dünya');
$this->write($str, 'yeni.txt', '~');
```
    
veya

```php
$str = 'Merhaba dünya';
$this->write($str, 'klasor/alt_klasor/yeni.txt');
```

veya

```php
$str = array('Merhaba', 'Dünya');
$this->write($str, 'klasor/alt_klasor/yeni.txt');
```



---

## upload()

Belirtilen dosya veya dosyaları, belirtilen klasöre yüklemek amacıyla kullanır, `$this->post['singlefile']` ve `$this->post['multifile']` dosyaların tutulduğu değişkenleri `$path` dosyaların yükleneceği klasör yolunu, `$force` ise dosya adını kullanıp kullanmaması gerektiği bilgisini temsil etmektedir.

**Bilgi:** Dosya yükleme işlemi sırasında tek seferde maksimum kaç adet dosyanın yükleneceğini `php.ini` dosyasındaki `max_file_uploads` kısmından güncelleyebilirsiniz. `$force` parametresinin belirtilmesi zorunlu değildir, varsayılan olarak `false` tanımlanmıştır. Eğer belirtilmezse dosyanın adı korunarak dosya adı benzersizleştirilerek yüklenir.
##### Örnek

```html
<form method="post" enctype="multipart/form-data">  
    <input type="text" name="username"> 
    <input type="password" name="password"> 
    <input type="file" name="singlefile"> 
    <?=$_SESSION['csrf']['input'];?>
    <button type="submit">Send!</button>
</form>
```
    
```php
<?php
if(!empty($this->post['singlefile'])){
    $path = './upload';
    $u = $this->upload($this->post['singlefile'], $path);
    // $u = $this->upload($this->post['singlefile'], $path, true);
    $this->print_pre($u);
}
?>
```

veya 

```html
<form method="post" enctype="multipart/form-data">  
    <input type="text" name="username"> 
    <input type="password" name="password"> 
    <input type="file" name="multifile[]" multiple="multiple"> 
    <?=$_SESSION['csrf']['input'];?>
    <button type="submit">Send!</button>
</form>
```

```php
<?php
if(!empty($this->post['multifile'])){
    $path = './upload';
    $u = $this->upload($this->post['multifile'], $path);
    // $u = $this->upload($this->post['multifile'], $path, true);
    $this->print_pre($u);
}
?>
```
    
---

## download()

Yerel ve Uzak sunucuda barınan dosyaları indirmeye yarar. Dosya yolları `string` veya `array` olarak belirtilebilir. İki parametre alır, ilk parametre `string` veya `array` türünde belirtilen dosya yollarını, ikinci parametre ise `array` olarak tanımlanan `path` yolunu temsil eder. 

  **Bilgi:** Geliştirmeye açık olduğu için ikinci parametre `array` türündedir ve belirtilme zorunluluğu yoktur. Eğer ikinci parametre belirtilmezse varsayılan olarak inecek dosyaların kökdizini `download` olur. 

##### Örnek

```php
$this->print_pre($this->download('./LICENSE.md'));
```
    

veya 

```php
$this->print_pre($this->download('https://github.com/fluidicon.png'));
```
        

veya

```php
$links = array(
    'https://github.com/fluidicon.png',
    './LICENSE.md'
);

$this->print_pre($this->download($links));
```
    
veya

```php
$links = array(
    'https://github.com/fluidicon.png',
    './LICENSE.md'
);
$this->print_pre($this->download($links, array('path' => 'app/dosyalar')));
```
    
---

## get_contents()

Kendisiyle paylaşılan `string` yapıda ki veride veya bir  url'nin varış noktasında bulunan sayfanın kaynak kodunda, `$left` ve `$right` değişkenlerinde belirtilen değerlerin arasında ki içeriği elde etmeye yarar. `$left` sol tarafta ki, `$right` sağ tarafta ki kapsayıcı parametresini temsil etmektedir. 

Bir veya birden fazla öğe bulunuyorsa hepsini bir `array` olarak sunar. Eğer kendisiyle paylaşılan url'nin kaynak kodu elde edilmek isteniyorsa `$left` ve `$right` değişkenlerinin olduğu ilk iki parametreye boş değer gönderilir ve geriye sayfa kaynağının `string` olarak dönmesi sağlanır.

İsteğe bağlı olan dördüncü parametre,varış adresine Yetkili bilgisi (Basic Authorization), POST, Header, Proxy, Referer bilgisi ve dosya göndermeye, varsa erişim sırasında kullanılabilir oturum bilgisini elde etmeye yarar.


##### Örnek

```php
$url = 'https://www.cloudflare.com/';
$left = '';
$right = '';
$data 	= $this->get_contents($left, $right, $url);
$this->print_pre($data);
```

veya

```php
$url = 'https://www.hepsiburada.com/';
$left = '';
$right = '';
$data 	= $this->get_contents($left, $right, $url);
$this->print_pre($data);
```


veya

```php
$url 	= 'https://www.cloudflare.com/';
$left 	= '<title>';
$right	= '</title>';
$data 	= $this->get_contents($left, $right, $url);
$this->print_pre($data);
```

veya

```php
$url 	= 'https://www.cloudflare.com/';
$left 	= '<link rel="alternate" hreflang="';
$right	= '"';
$data 	= $this->get_contents($left, $right, $url);
$this->print_pre($data);
```
    
veya

```php
$url 	= 'Örnek bir içeriktir. <title>Merhaba Dünya!</title>';
$left 	= '<title>';
$right	= '</title>';
$data 	= $this->get_contents($left, $right, $url);
$this->print_pre($data);
```

veya

```php
$url = 'src=\'-str\'-after src=\'-str\'-after src=\'-str\'-after src=\'-str\'-after';
$left = 'src=\'';
$right = '\'-after';
$data 	= $this->get_contents($left, $right, $url);
$this->print_pre($data);
```

veya

```php
$url = '{"filmler": [  {"imdb": "tt0116231", "url": "&lt;iframe src=&#039;https://example.com&#039; width=&#039;640&#039; height=&#039;360&#039; frameborder=&#039;0&#039; marginwidth=&#039;0&#039; marginheight=&#039;0&#039; scrolling=&#039;NO&#039; allowfullscreen=&#039;allowfullscreen&#039;&gt;&lt;/iframe&gt;"} ]}';
$left = 'src=&#039;';
$right = '&#039;';
$data 	= $this->get_contents($left, $right, $url);
$this->print_pre($data);
```

veya

```php
$url = 'https://mpop-sit.example.com/product/api/categories/get-all-categories?leaf=true&status=ACTIVE&available=true&page=0&size=1000&version=1';
$left = '';
$right = '';
$options = [
    'authorization'=>[
        'username'=>'example_username',
        'password'=>'example_password'
    ]
];
// Start connection.
$this->print_pre($this->get_contents($left, $right, $url, $options));
```

veya

```php
$url = 'https://mpop-sit.example.com/product/api/products/import';
$left = '';
$right = '';
$options = [
    'attachment'=>'./data1.json',
    'authorization'=>[
        'username'=>'example_username',
        'password'=>'example_password'
    ]
];
// Start connection.
$this->print_pre($this->get_contents($left, $right, $url, $options));
```

veya

```php
$product = '{"items":[{"barcode":"1010101010101","quantity":"0","salePrice":"9.95","listPrice":"9.95"}]}';
$options = [
    'authorization'=>[
        'username'=>'', // Trendyol API username
        'password'=>'' // Trendyol API password
    ],
    'header'=>[
        'User-Agent'=>'101010 - Trendyol API Gateway', // supplierId - Trendyol ...
        'Content-Type'=>'application/json' // return data type
    ],
    'post'=>$product // products to be updated
];
$response = $this->get_contents('', '', 'https://api.trendyol.com/sapigw/suppliers/101010/products/price-and-inventory', $options);
$this->print_pre($response);
```

veya

```php
$url = 'https://www.example.com/login';
$left = '';
$right = '';
$options = array(
//    'referer'=>$url,
    'post'=>array(
        'username'=>'aliyilmaz',
        'password'=>'123456'
    )
);

// Start connection.
$this->get_contents($left, $right, $url, $options);

// Session access.
$url = 'https://www.example.com/admin/users';
$left = '<title>';
$right = '</title>';
$data = $this->get_contents($left, $right, $url);
$this->print_pre($data);
```


veya


```php
$xml_data ='<?xml version="1.0" encoding="UTF-8"?>'.
    
    '<smspack ka="kullanici_adi" pwd="kullanici_parolasi" org="Originator_adi" >'.
    
    '<mesaj>'.
    
        '<metin>'.$this->post['metin'].'</metin>'.
    
            '<nums>'.$this->post['telefon'].'</nums>'.
    
    '</mesaj>'.
    
    
    
    '<mesaj>'.
    
            '<metin>'.$this->post['metin'].'</metin>'.
    
            '<nums>'.$this->post['telefon'].'</nums>'.
    
    '</mesaj>'.
    
'</smspack>';

$options = array(
    'post'=>$xml_data
);

$output = $this->get_contents('', '', 'https://smsgw.mutlucell.com/smsgw-ws/sndblkex', $options);
```

veya


```php
$options = array(
    'header'=>array(
        'accept'=>"application/json, text/javascript, */*; q=0.01",
        'accept-language'=>"tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7",
        'content-type'=>"application/x-www-form-urlencoded; charset=UTF-8",
        'sec-ch-ua'=>"\"Chromium\";v=\"94\", \"Google Chrome\";v=\"94\", \";Not A Brand\";v=\"99\"",
        'sec-ch-ua-mobile'=>"?0",
        'sec-ch-ua-platform'=>"\"Linux\"",
        'sec-fetch-dest'=>"empty",
        'sec-fetch-mode'=>"cors",
        'sec-fetch-site'=>"same-origin",
        'x-requested-with'=>"XMLHttpRequest"
    )
);

$url = 'https://www.example.com/archive';
$left = '<title>';
$right = '</title>';
$data = $this->get_contents($left, $right, $url, $options);
$this->print_pre($data);
```

veya


```php
$left = '';
$right = '';
$options = [
    'proxy'=>[
        'url'=> '255.255.255.255:80',
        'user'=> 'username:password',
        // 'protocol'=>'CURLPROXY_SOCKS5' or https://curl.se/libcurl/c/CURLOPT_PROXYTYPE.html
    ]
];
$data = $this->get_contents($left, $right, 'https://ipleak.net/', $options);

$this->print_pre($data);
```
---


## distanceMeter()

Kendisiyle paylaşılan iki farklı koordinat noktası arasındaki mesafeyi, kuş uçuşu olarak hesaplamaya yarar. Koordinat bilgileri, `int`, `float` ve `string` yapıda gönderilebilir ve zorunludur.

İki koordinat arasındaki mesafenin ölçü birimi ise `string` veya `array` olarak belirtilebilir, zorunlu değildir, eğer belirtilmezse, `m`, `km`, `mi`, `ft` ve `yd` olarak dizi türünde geri döndürülür. 

Bir veya birden fazla ölçü birimine göre mesafe bilgisi elde etmek mümkündür. Eğer sadece bir ölçü birimi talep edilirse, o ölçü biriminin yanıtı `string` olarak geri döndürülür.

**Bilgi:** 

Ölçü birimleri ve kısaltmaları aşağıdaki gibidir.

*   m (Metre) 
*   km (Kilometre) 
*   mi (Mil) 
*   ft (Feet)
*   yd (Yard)

##### KOORDİNATLAR
```php
/* These are two points in Turkey */
$point1 = array('lat' => 41.008610, 'long' => 28.971111); // Istanbul
$point2 = array('lat' => 39.925018, 'long' => 32.836956); // Anitkabir
```


##### Örnek
    
```php
//Array
//(
//    [m] => 4188.59
//    [km] => 4.19
//    [mi] => 2.6
//    [ft] => 13742.1
//    [yd] => 4580.64
//)

$distance = $this->distanceMeter($point1['lat'], $point1['long'], $point2['lat'], $point2['long']);

$this->print_pre($distance);
```

veya

```php
//4188.59

$distance = $this->distanceMeter($point1['lat'], $point1['long'], $point2['lat'], $point2['long'], 'm');
echo $distance;
```
    
veya

```php
//4188.59

$distance = $this->distanceMeter($point1['lat'], $point1['long'], $point2['lat'], $point2['long'], array('m'));
echo $distance;
```
    
veya

```php
//Array
//(
//    [m] => 4188.59
//    [km] => 4.19
//)

$distance = $this->distanceMeter($point1['lat'], $point1['long'], $point2['lat'], $point2['long'], array('m', 'km'));

$this->print_pre($distance);
```
    
veya

```php
//Array
//(
//    [m] => 4188.59
//    [km] => 4.19
//    [mi] => 2.6
//    [ft] => 13742.1
//    [yd] => 4580.64
//)

$distance = $this->distanceMeter($point1['lat'], $point1['long'], $point2['lat'], $point2['long'], array());

$this->print_pre($distance);
```
    
veya

```php
//Array
//(
//    [m] => 4188.59
//    [km] => 4.19
//    [mi] => 2.6
//    [ft] => 13742.1
//    [yd] => 4580.64
//)

$distance = $this->distanceMeter($point1['lat'], $point1['long'], $point2['lat'], $point2['long'], '');

$this->print_pre($distance);
```


---


## evalContainer()

Bu fonksiyon, `string` türündeki veriyi, içindeki `PHP` kodlarıyla birlikte kullanıldığı kısma eklemeye yarar. HTML özel karakterine dönüştürülmüş `PHP` kodları varsa onları da `PHP` koduna dönüştürerek kullanır.


###### Örnek

```php
$code = 'merhaba &lt;?=$this-&gt;timestamp;?&gt;';
$this->evalContainer($code);
```

veya

```php
$code = 'merhaba &lt;?=$this-&gt;timestamp;?&gt;

&lt;?php

$array = array(
\'username\'=&gt;\'aliyilmaz\',
\'password\'=&gt;\'123456\'
);

$this-&gt;print_pre($array);';
$this->evalContainer($code);
```

---

## safeContainer()

Bu metot, `string` bir veriyi, satır içi javascript ve css kodlarından, javascript, css ve iframe taglarından arındırmaya yarar. Arındırma işleminde istisnalar 2'nci parametrede `string` veya `array` türünde belirtilebilir. 2'nci parametre belirtilmezse tüm ayıklamalar gerçekleştirilir.

#### İstisnalar

* inlinejs ( Satır içi javascript kodlarını görmezden gelir)
* inlinecss ( Satır içi css kodlarını görmezden gelir)
* tagjs (Javascript taglarını görmezden gelir)
* tagcss ( Css taglarını görmezden gelir)
* iframe ( iframe tag'ını görmezden gelir)

###### Örnek


```php
$data = '
    <link href=chunk-c23060a2.5288cd9ea090a4e0e352.css rel=prefetch>
    <link rel="preload" href="main.js" as="script">
    <link href=chunk-206f96fd.8a5918638b41295dd9df.js rel=prefetch>
    <img style="display:none;" src="foo.jpg" onload="something"/>
    <img onmessage="javascript:foo()"><style>body{ background-color:#000;}</style>
    <a notonmessage="nomatch-here">
    <p><script></script>
    things that are just onfoo="bar" shouldn\'t match either, outside of a tag
    </p><iframe src=".."></iframe>
';
echo $this->safeContainer($data);
echo '<hr>';
echo $this->safeContainer($data, 'inlinecss');
echo '<hr>';
echo $this->safeContainer($data, 'inlinejs');
echo '<hr>';
echo $this->safeContainer($data, 'tagjs');
echo '<hr>';
echo $this->safeContainer($data, 'tagcss');
echo '<hr>';
echo $this->safeContainer($data, 'iframe');
echo '<hr>';
echo $this->safeContainer($data, array('inlinecss', 'inlinejs', 'tagjs', 'tagcss', 'iframe'));
```

---

## lifetime()

Bu fonksiyon belirtilen tarih veya tarihlerin geçerliliğini kontrol etmeye yarar. Tarih veya tarihler, **yıl-ay-gün**, **yıl-ay-gün saat:dakika:saniye** gibi veya başka bir tarih formatı şeklinde belirtilebilir. 


```php
$start_date = '2022-09-02';
if($this->lifetime($start_date)){
    echo 'Süre var.';
} else {
    echo 'Süre doldu.';
}
```
veya

```php
$start_date = '2022-09-02 14:20:10';
if($this->lifetime($start_date)){
    echo 'Süre var.';
} else {
    echo 'Süre doldu.';
}
```

veya

```php
$start_date = '2022-09-02';
$end_date = '2022-09-02';
if($this->lifetime($start_date, $end_date)){
    echo 'Süre var.';
} else {
    echo 'Süre doldu.';
}
```

veya

```php
$start_date = '2022-09-02 22:02:34';
$end_date = '2022-09-02 22:02:35';
if($this->lifetime($start_date, $end_date)){
    echo 'Süre var.';
} else {
    echo 'Süre doldu.';
}
```

---

## morse_encode()

Bu fonksiyon, kendisiyle paylaşılan `string` yapıdaki veriyi [morsealphabet()](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#morsealphabet) metotunda tanımlanmış veya ikinci parametrede gönderilen özel mors kodlarına dönüştürmeye yarar.


###### Örnek


```php
$encode = $this->morse_encode('Mustafa Kemal Atatürk'); // -- ..- ... - .- ..-. .- / -.- . -- .- .-.. / .- - .- - ..-- .-. -.-

echo $encode;
```


veya 


```php
$morseDictionary = array(
    'c' => '.-', '(' => '-...', 'a' => '-.-.', 'ç' => '-.-..', 'd' => '-..', 'e' => '.', 'f' => '..-.', 'g' => '--.', 'ğ' => '--.-.', 'h' => '....', 'ı' => '..', 'i' => '.-..-', 'j' => '.---', 'k' => '-.-', 'l' => '.-..', 'm' => '--', 'n' => '-.', 'o' => '---', 'ö' => '---.', 'p' => '.--.', 'q' => '--.-', 'r' => '.-.', 's' => '...', 'ş' => '.--..', 't' => '-', 'u' => '..-', 'ü' => '..--', 'v' => '...-', 'w' => '.--', 'x' => '-..-', 'y' => '-.--', 'z' => '--..', '0' => '-----', '1' => '.----', '2' => '..---', '3' => '...--', '4' => '....-', '5' => '.....',
    '6' => '-....','7' => '--...','8' => '---..','9' => '----.','.' => '.-.-.-',',' => '--..--','?' => '..--..','\'' => '.----.','!'=> '-.-.--','/'=> '-..-.','b' => '-.--.',')' => '-.--.-','&' => '.-...',':' => '---...',';' => '-.-.-.','=' => '-...-','+' => '.-.-.','-' => '-....-','_' => '..--.-','"' => '.-..-.','$' => '...-..-',
    '@' => '.--.-.','¿' => '..-.-','¡' => '--...-',' ' => '/'
);
$encode = $this->morse_encode('Mustafa Kemal Atatürk', $morseDictionary); // -- ..- ... - .- ..-. .- / -.- . -- .- .-.. / .- - .- - ..-- .-. -.-

echo $encode;
```


---

## morse_decode()

Bu fonksiyon, kendisiyle paylaşılan ve [morsealphabet()](https://github.com/aliyilmaz/Mind/blob/main/docs/tr-readme.md#morsealphabet) metotunda tanımlanmış veya ikinci parametrede gönderilen özel mors kodlarına dönüştürülmüş parametreyi çözmeye yarar.


###### Örnek

```php
echo $this->morse_decode('-- ..- ... - .- ..-. .- / -.- . -- .- .-.. / .- - .- - ..-- .-. -.-');
```


veya


```php
$morseDictionary = array(
    'c' => '.-', '(' => '-...', 'a' => '-.-.', 'ç' => '-.-..', 'd' => '-..', 'e' => '.', 'f' => '..-.', 'g' => '--.', 'ğ' => '--.-.', 'h' => '....', 'ı' => '..', 'i' => '.-..-', 'j' => '.---', 'k' => '-.-', 'l' => '.-..', 'm' => '--', 'n' => '-.', 'o' => '---', 'ö' => '---.', 'p' => '.--.', 'q' => '--.-', 'r' => '.-.', 's' => '...', 'ş' => '.--..', 't' => '-', 'u' => '..-', 'ü' => '..--', 'v' => '...-', 'w' => '.--', 'x' => '-..-', 'y' => '-.--', 'z' => '--..', '0' => '-----', '1' => '.----', '2' => '..---', '3' => '...--', '4' => '....-', '5' => '.....',
    '6' => '-....','7' => '--...','8' => '---..','9' => '----.','.' => '.-.-.-',',' => '--..--','?' => '..--..','\'' => '.----.','!'=> '-.-.--','/'=> '-..-.','b' => '-.--.',')' => '-.--.-','&' => '.-...',':' => '---...',';' => '-.-.-.','=' => '-...-','+' => '.-.-.','-' => '-....-','_' => '..--.-','"' => '.-..-.','$' => '...-..-',
    '@' => '.--.-.','¿' => '..-.-','¡' => '--...-',' ' => '/'
);
$decode = $this->morse_decode('-- ..- ... - -.-. ..-. -.-. / -.- . -- -.-. .-.. / -.-. - -.-. - ..-- .-. -.-', $morseDictionary); 

echo $decode;
```



---

## stringToBinary()

Bu fonksiyon, kendisiyle paylaşılan string türündeki veriyi, Binary koduna dönüştürmeye yarar.

###### Örnek

```php
$data = 'Ali Yılmaz';
echo $this->stringToBinary($data);
```

---

## binaryToString()

Bu fonksiyon, kendisiyle paylaşılan binary türündeki veriyi, String karşılığına dönüştürmeye yarar.

###### Örnek

```php
$data = '1000001 1101100 1101001 100000 1011001 11000100 10110001 1101100 1101101 1100001 1111010';
echo $this->binaryToString($data);
```

---

## hexToBinary()

Bu fonksiyon, kendisiyle paylaşılan Hex türündeki veriyi, String karşılığına dönüştürmeye yarar.

###### Örnek

```php
$data = bin2hex('Merhaba dünya');

echo $this->hexToBinary($data);
```


---

## siyakat_encode()

Bu fonksiyon, kendisiyle paylaşılan string türündeki veriyi, kendisiyle paylaşılan sözlüklere göre şifrelemeye yarar. İki parametre alır, ilki şifrelenecek veri, ikincisi sözlüklerdir. 

İsteğe göre sözlük oluşturmak için örnekteki dizi anahtarları diğer dizi anahtarlarıyla değiştirilmelidir. ( `'s' => '-.-..' kısmını 'ç' => '...'` şeklinde değiştirmek gibi)

###### Örnek

   
```php
$data = 'Türkiye\'de, yaklaşık 10.000 bitki türü yetişir. Bu bitki türlerinin yaklaşık 3.000\'i ise Türkiye\'ye endemiktir. Bu özelliği ile Türkiye, tüm Avrupa\'dakinden daha fazla endemik bitki türüne sahiptir.';
$miftah = array(
    array(
        '1'=>'elif', '2'=>'selim', '3'=>'gümüşlük', '4'=>'destan', '5'=>'abdulhamid',
        '6'=>'cuma', '7'=>'mustafakemal', '8'=>'cem', '9'=>'teras', '0'=>'cumhuriyet',
        'a'=>'turşu', 'b'=>'rakip', 'c'=>'silüet', 'd'=>'turan', 'e'=>'bal', 'f'=>'sarı'
    ),
    array(
        's' => '.-', '(' => '-...', 'a' => '-.-.', '0' => '-.-..', 'd' => '-..', '9' => '.', 'f' => '..-.', 'g' => '--.', 'ğ' => '--.-.', 'h' => '....', 'ı' => '..', 'i' => '.-..-', 'j' => '.---', 'k' => '-.-', 'l' => '.-..', 'ö' => '--', '8' => '-.', 'o' => '---', 'q' => '---.', 'p' => '.--.', 'm' => '--.-', '7' => '.-.', 'c' => '...', 'z' => '.--..', 't' => '-', 'u' => '..-', '¿' => '..--', 'v' => '...-', '1' => '.--', '5' => '-..-', 'y' => '-.--', 'ş' => '--..', 'ç' => '-----', 'w' => '.----', '&' => '..---', '3' => '...--', '4' => '....-', 'x' => '.....',
        '6' => '-....','r' => '--...','n' => '---..','e' => '----.','.' => '.-.-.-',',' => '--..--','?' => '..--..','$' => '.----.','!'=> '-.-.--','/'=> '-..-.','b' => '-.--.',')' => '-.--.-','2' => '.-...',':' => '---...',';' => '-.-.-.','@' => '-...-','+' => '.-.-.','-' => '-....-','_' => '..--.-','"' => '.-..-.','\'' => '...-..-',
        '=' => '.--.-.','ü' => '..-.-','¡' => '--...-',' ' => '/',
    )
);

$encode = $this->siyakat_encode($data, $miftah);
echo $encode;
```

---

## siyakat_decode()

Bu fonksiyon, kendisiyle paylaşılan string türünde ve siyakat_encode() ile şifrelenmiş veriyi çözmeye yarar. İki parametre alır, ilki şifrelenmiş veri ikincisi veri şifrelenirken kullanılan sözlüklerdir.

###### Örnek

```php
$data = '.-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. -.... -. ....- ... -..- -.--. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ....- .-. -.... .-. ... ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. -.... -. ....- ... -..- -.--. -.... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ....- .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ....- .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ....- .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. -.... -. ....- ... -..- -.--. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ....- .-. -.... .-. ... ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ....- .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- -. .-- -. ....- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ....- .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- -. .-- -. ....- ... .-- -.-.. ..-. -. .-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. -.... -. ....- ... -..- -.--. -.... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- -. .-- -. ....- .-. -.... .-. ----. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ....- .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ....- .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ...-- .-. .-- .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- -. .-- -. ....- ... .-- -.-.. ..-. -. .-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ....- .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- -. .-- -. ....- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ....- .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ...-- .-. .-- .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ....- .-. -.... .-. ...';

$miftah = array(
    array(
        '1'=>'elif', '2'=>'selim', '3'=>'gümüşlük', '4'=>'destan', '5'=>'abdulhamid',
        '6'=>'cuma', '7'=>'mustafakemal', '8'=>'cem', '9'=>'teras', '0'=>'cumhuriyet',
        'a'=>'turşu', 'b'=>'rakip', 'c'=>'silüet', 'd'=>'turan', 'e'=>'bal', 'f'=>'sarı'
    ),
    array(
        's' => '.-', '(' => '-...', 'a' => '-.-.', '0' => '-.-..', 'd' => '-..', '9' => '.', 'f' => '..-.', 'g' => '--.', 'ğ' => '--.-.', 'h' => '....', 'ı' => '..', 'i' => '.-..-', 'j' => '.---', 'k' => '-.-', 'l' => '.-..', 'ö' => '--', '8' => '-.', 'o' => '---', 'q' => '---.', 'p' => '.--.', 'm' => '--.-', '7' => '.-.', 'c' => '...', 'z' => '.--..', 't' => '-', 'u' => '..-', '¿' => '..--', 'v' => '...-', '1' => '.--', '5' => '-..-', 'y' => '-.--', 'ş' => '--..', 'ç' => '-----', 'w' => '.----', '&' => '..---', '3' => '...--', '4' => '....-', 'x' => '.....',
        '6' => '-....','r' => '--...','n' => '---..','e' => '----.','.' => '.-.-.-',',' => '--..--','?' => '..--..','$' => '.----.','!'=> '-.-.--','/'=> '-..-.','b' => '-.--.',')' => '-.--.-','2' => '.-...',':' => '---...',';' => '-.-.-.','@' => '-...-','+' => '.-.-.','-' => '-....-','_' => '..--.-','"' => '.-..-.','\'' => '...-..-',
        '=' => '.--.-.','ü' => '..-.-','¡' => '--...-',' ' => '/',
    )
);

$decode = $this->siyakat_decode($data, $miftah);
echo $decode;
```

---

## abort()

Bu metot belirtilen erişim isteklerinin veya uygulamanın durdurulması gerektiği hallerde kullanılır. Hata mesajının, geri ve anasayfaya dönüş bağlantılarının yer aldığı bu metot, iki string parametre alır, ilki hatanın kısa kodu, ikincisi ise hata mesajıdır.


###### Örnek

```php
$this->abort('404', 'Sayfa bulunamadı');
```

## captcha()
Bu metot, sayfa arayüzünü kullanarak otomatik form işlemleri yapmayı amaçlayan robotları durdurmaya yarar, ziyaretçinin insan mı, robot mu olduğunu anlamaya ihtiyaç duyulduğu durumlarda bu metot kullanılır. Çalıştırıldığı yere rastgele bir parametrenin barındığı görsel ve altında o parametrenin yazılabilmesi için bir yazı alanı ekler. 

Ziyaretçi görselde bulunan parametreyi yazı alanına girip post işlemini gerçekleştirirse form gönderilir, aksi halde form gönderilmez ve ziyaretçinin potansiyel robot olduğu değerlendirilerek, captcha hata sayfasına yönlendirilir. Bu sayede robotun otomasyon algoritması sekteye uğratılmış olur.


4 parametre alır, bunlar sırasıyla `level`, `length`, `width` ve `height` 'dir. 

**level**
Okumayı güçleştirme seviyesini belirtmek amacıyla kullanılır, varsayılan olarak 3'dür. Eğer Okumayı güçleştirmek istenmiyorsa `null` parametresi belirtilmelidir.

**length**
Parametre uzunluğunu belirtmek amacıyla kullanılır, bu kısımda geliştirici tarafından bir uzunluk belirtildiğinde, oluşacak parametrenin rahatlıkla görünebilmesi için genişlik ve yükseklik değerlerinin de bu tanıma göre güncellenmesi gerekmektedir. Varsayılan uzunluk değeri 8'dir.

**width**
Captcha kodu görselinin genişliğini belirtmek amacıyla kullanılır. Ölçüler piksel bazlı ve mutlak olmalıdır. Varsayılan olarak 320 tanımlanmıştır.

**height**
Captcha kodu görselinin yüksekliğini belirtmek amacıyla kullanılır. Ölçüler piksel bazlı ve mutlak olmalıdır. Varsayılan olarak 60 tanımlanmıştır.

Tüm parametrelerin belirtilme zorunluluğu bulunmamaktadır.

Ziyaretçi captcha'yi bu metotun bıraktığı inputu tarayıcı araçlarıyla silerek formu gönderebileceğinden, form verilerini işleme almadan önce mutlak suretle aşağıdaki örnek ışığında bir kontrolün gerçekleştirilmesi gerekmektedir.

Aşağıdaki örnekler, doğrulama yapmayan başka bir form ile aynı sayfada nasıl kullanıldığını göstermek amacıyla hazırlanmıştır.

###### Örnek

```php
$this->captcha(); 
// $this->captcha(null); // null
// $this->captcha(''); // null
// $this->captcha(3, 9); length
// $this->captcha(3, 8, 320); width
// $this->captcha(3, 8, 320, 60); height

```

veya

**html**
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?=$this->base_url;?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="captcha.php" method="post">
    <?=$_SESSION['csrf']['input'];?>
    <?php $this->captcha(); ?>

    <input type="text" name="username" placeholder="username">
        <br>
        <button type="submit" name="btn_captcha">Send</button>
    </form>
    <hr>
    
    <form action="captcha.php" method="post">
    <?=$_SESSION['csrf']['input'];?>
    <input type="text" name="username" placeholder="username">
    <input type="text" name="password" placeholder="password">
    <input type="text" name="age" placeholder="age">
        <br>
        <button type="submit" name="btn_without_captcha">Send</button>
    </form>
</body>
</html>
```

**php**
```php
// captcha ile
if(isset($this->post['btn_captcha'])){

    if(isset($this->post['captcha'])){
        echo 'captcha form';
        $this->print_pre($this->post);
    } else {
        $this->abort('401', 'Captcha parametresi bulunamadı.');
    }
    
}

// captcha olmadan
if(isset($this->post['btn_without_captcha'])){
    if(isset($this->post['age'])){
        echo 'Captcha olmadan gönderilen form';
        $this->print_pre($this->post);
    }
}

```

---

## rm_r()

Dosya ve klasörleri silmek amacıyla kullanılır, silinmesi istenen dosya ve klasör yolları `string` veya `array` olarak belirtilebilir. Eğer dizin yolu belirtilirse, klasör ve içindeki dosya ve klasörler de silinir.

**Bilgi:** Silme işlemi yetki gerektiren bir eylem olduğundan, `chmod` yoluyla projeye dizinlere müdahale izni verilmelidir.

###### Örnek

```php
if($this->rm_r('silinecekler')){
  echo 'Silindi.';
} else {
  echo 'Silinemedi.';
}
```

veya 

```php
$paths = array(
    'silinecekler1',
    'silinecekler2',
    'silinecekler3/sil1.txt'
);
if($this->rm_r($paths)){
  echo 'Silindi.';
} else {
  echo 'Silinemedi.';
}
```
---

## ffsearch()

Belirtilen isme sahip dosya ve klasör yollarını dizi olarak geri döndürmeye yarar. Projenin bulunduğu dizinde bulunan dosya ve klasör(alt klasör)leri de arar. 

kod:
```php
$this->print_pre($this->ffsearch('./', '*.sqlite'));
```

çıktı:
```php
Array
(
    [0] => ./app/migration/mydb.sqlite
)
```

---

## json_encode()
Belirtilen diziyi json biçimine dönüştürmeye yarar. PHP'nin `json_encode` metodundan farklı olarak, `JSON_UNESCAPED_UNICODE` tanımı varsayılan olarak kullanır, ikinci parametre varsayılan olarak `true` belirtilmiştir. Bu sayede json verisi sıkıştırılmış halde olup daha az yer kaplamaktadır. 

Eğer json verisi okunaklı bir yapıda elde edilmek istenirse, ikinci parametre `false` olarak belirtilmelidir. Böylelikle `JSON_PRETTY_PRINT` tanımı uygulanarak okunaklı bir json çıktısı elde edilmiş olur. 

kod:
```php
$data = ['Beyazıt Karataş: Milli Muharif Uçağın adı "Türk Kartalı" olmalı!', 'Ali Yılmaz'];
echo $this->json_encode($data); // $this->json_encode($data, false);
```

çıktı:
```php
[
    "Beyazıt Karataş: Milli Muharif Uçağın adı \"Türk Kartalı\" olmalı!",
    "Ali Yılmaz"
]
```

---

## json_decode()
Belirtilen json parametresini array biçimine dönüştürmeye yarar. PHP'nin `json_decode` metodundan farklı olarak ikinci parametresine `true` değeri atanarak verinin sadece diziye dönüşmesi sağlanmıştır.

kod:
```php
$data = '[
    "Beyazıt Karataş: Milli Muharif Uçağın adı \"Türk Kartalı\" olmalı!",
    "Ali Yılmaz"
]';
$this->print_pre($this->json_decode($data));
````

çıktı:
```php
Array
(
    [0] => Beyazıt Karataş: Milli Muharif Uçağın adı "Türk Kartalı" olmalı!
    [1] => Ali Yılmaz
)
```

---

## saveAs()

Belirtilen yolda bulunan dosyayı veya belli `MIME` türündeki içeriği, tarayıcıda sağ tık / farklı kaydet yapıldığındaki gibi indirmeye yarar. Bu metot aynı zamanda yerel dizindeki direkt erişimin engellendiği dizinlerde barınan ya da uzak sunucularda bulunan ve erişimine izin verilen dosyalara erişilmesini de sağlar.

Özellikle dosya adı bulunmayan yolların veya `MIME` türündeki içeriğin indirilmesi sırasında ikinci parametrede isim belirtmek gerekmektedir. İndirme işlemi için 3'ncü parametrenin ya hiç belirtilmemesi ya da `true` olarak belirtilmesi gerekmektedir. Eğer indirmek yerine `MIME` halini görmek arzu ediliyor ise üçüncü parametre `false` olarak belirtilmelidir.

kod:
```php
$this->saveAs('app/migration/mysql_backup_2022_02_14_01_00_53.json');
```

çıktı:
```php
Farklı kaydet penceresi açılır, dosya adı kısmında `mysql_backup_2022_02_14_01_00_53.json` ifadesi bulunur.
```



kod:
```php
$this->saveAs('app/migration/mysql_backup_2022_02_14_01_00_53.json', null, false);
```

çıktı:
```
`json` biçimindeki veriler görüntülenir.
```


---

## mime_content_type()

Bu metot, yerel veya uzak sunucuda barınan dosyanın `MIME` türünü göstermeye yarar. `string` türde bir değer alır ve belirtilmesi zorunludur. 

kod:
```php
echo $this->mime_content_type('../screenshots/error.png');
```

çıktı:
```php
image/png
```


kod:
```php
echo $this->mime_content_type('https://raw.githubusercontent.com/aliyilmaz/Mind/master/screenshots/error.png');
```

çıktı:
```php
image/png
```
**Bilgi:** MIME Türleri hakkında daha fazla bilgi için [şu kaynağı](https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types) inceleyebilirsiniz.


---

## popup()

Bu metot feragatname, reklam, duyuru gibi gösterimler ihtiyaçları için açılır alan oluşturmaya yarar. Metot `red`, `white` ve `black` olarak üç farklı tema seçeneğini desteklemektedir. İlk parametre içerik, ikinci parametre ayarlardır. Açılan alan tüm sayfa öğelerinin üzerinde görüntülenir.

* `theme` tanımlamak zorunlu değildir. Varsayılan olarak `red` tanımlanmıştır. `red` dışında `white` ve `black`  desteklenmektedir.
* `position` tanımlamak zorunlu değildir. Varsayılan olarak `bottom` tanımlanmıştır. `top`, `bottom` ve `full` desteklenmektedir.
* `button`, tanımlamak zorunlu değildir. Varsayılan olarak olumlu buton `Yes`, olumsuz buton ise `No, Thanks` olarak tanımlanmıştır. Eğer bir buton kaldırılmak isteniyorsa, ilgili butonun `text` anahtarının karşılığı boş bırakılmalıdır. Eğer bir buton tıklandığında yönlendirilmek isteniyorsa, ilgili butonun `href` kısmına ilgili adres tanımlanmalıdır.
* `script`, tanımlamak zorunlu değildir. Eğer belirtilirse butonların var olması gereklidir, çünkü bu kısım ziyaretçi onayına göre akıbeti belirlenecek kodlara ev sahipliği yapmaktadır. (Feragatname'nin kabulü sonrasında çalıştırılacak arama motoru izleme kodu gibi)
* `timeout`, tanımlamak zorunlu değildir. Belirtilen saniye sonra pop-up alanının kaybolmasını sağlar.
* `url`, tanımlamak zorunlu değildir. `timeout` belirtilmeden kullanılamaz.
* `again`, tıklamaların dışında kalan hallerde açılan alanın sayfaya tekrar erişildiğinde açılıp açılmamasını belirlemek amacıyla kullanılır. Varsayılan olarak `true` belirtildiğinden sayfaya her erişildiğinde açılır alanın gösterilmesi sağlanır. `again`, `timeout` ile beraber kullanılabilir, bu kullanım şeklinde tekrar gösterilmesi istenmiyorsa `again`, `false` olarak belirtilmelidir.


```php
$str = 'Would you like to allow us to process your browser cookies in accordance with <a href="https://gdpr-info.eu/" target="_blank">GDPR</a> and <a href="https://www.kvkk.gov.tr/" target="_blank">KVKK</a> regulations in order to improve user experience and service quality?';
// $str = '<img src="http://localhost/popupBox.jpg" style="width:100%">';
$Mind->popup($str, [
    'theme'=>'black', // default red (white, red, black)
    'position'=>'bottom', // default bottom (top, bottom, full)
    'button'=>[
        // 'true'=>[
        //     // 'text'=>'', // default "Yes"
        //     // 'href'=>'http://encrypted.google.com'
        // ],
        'false'=> [
            // 'text'=>'no', // default  "No, Thanks"
            // 'href'=>'#'
        ]
    ],
    // 'again'=>false, // default "true"
    'script'=>"<!-- Google Tag Manager 2020 --><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-XXXXXX');</script><!-- End Google Tag Manager -->",
    'redirect'=>[
        'timeout'=>5000, // default 0
        'url'=>'https://www.mozilla.com' // default empty (required timeout)
    ]
]);
```