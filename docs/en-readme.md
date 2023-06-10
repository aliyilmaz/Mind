# What is Mind?

Mind is a PHP code frame for developers.It provides various solutions to create design patterns, applications and code frames.
 
--- 

## Acquisition

There are two ways to acquire the Mind class;

- Mind [repository](https://github.com/aliyilmaz/Mind/archive/refs/heads/main.zip)
- Project [repository](https://github.com/aliyilmaz/project/archive/refs/heads/main.zip)

--- 

## Setup

##### For Mind repository:
* Remove the **Mind.php** on the project main directory on your local or web server **src** on the **zip** file you have acquired.

* Include the **Mind.php** file in your project's **index.php** file using something like **include** or **require_once** and use the **extends** or **new Mind()** command Complete the installation process with the help of

```php 
require_once('./Mind.php');
$Mind = new Mind();
```

_**or**_

```php
require_once('./Mind.php');
class ClassName extends Mind{
    public function __construct($conf = array())
    {
        parent::__construct($conf);
    }
}
```
   

##### For project repository:
* Extract the contents of the **zip** file you obtained to the project home directory located on your local or web server.


---

## Database Settings

In order to use the database methods, the database information should be defined in the class or in the **Mind.php** file.  


```php
$conf = array(
    'db'=>[
        'drive'     =>  'mysql', // mysql, sqlite, sqlsrv
        'host'      =>  'localhost', // For SQLSRV: www.example.com\\MSSQLSERVER,'.(int)1433
        'dbname'    =>  'mydb', // mydb, app/migration/mydb.sqlite
        'username'  =>  'root',
        'password'  =>  '',
        'charset'   =>  'utf8mb4'
    ]
);
$Mind = new Mind($conf);
```
_**or**_

```php
private $db =  [
    'drive'     =>  'mysql', // mysql, sqlite, sqlsrv
    'host'      =>  'localhost', // For SQLSRV: www.example.com\\MSSQLSERVER,'.(int)1433
    'dbname'    =>  'mydb', // mydb, app/migration/mydb.sqlite
    'username'  =>  'root',
    'password'  =>  '',
    'charset'   =>  'utf8mb4'
];
```

**Information:**
The database connection is not required in version and above versions of Mind **5.3.3**. If you want to use Mind without a database, just update your code according to the example below when calling the class.

```php
$conf = array(
    'db'=>[]
);
$Mind = new Mind($conf);
```

**or**

```php
$conf = array(
    'db'=>''
);
$Mind = new Mind($conf);
```

---

## Session Settings

You can update this setting to update the location where the session(`$_SESSION`) files of users using the project are hosted. By default the server temporary directory is used. Simply specify a directory path as `string` so that the session files are hosted in the specified path. For example: `./session/`. The `public` property is defined in the `$this->session_path` variable to allow external access.

**Note:** If the directory does not exist, it will be created.


**Mind.php** inside:
```php
public $session_path    = null ; // ./session/ or null(system path)
```

When calling the **Mind** class:
```php
$Mind = new Mind([
    'db'=>null,
    'session_path'=>'./sessions/'
]);

```
---

## Time zone setting

It is possible to personalize the time zone in order to mark the content with the right time stamp. By default, `Europe/Istanbul` is defined. The `public` property is defined to allow access from outside the class.For more information, see [List of supported timezones](https://secure.php.net/manual/en/timezones.php).

**Info:** Servers that are not customized as necessary may use different time zones from the project time zone, the arrangement made in this section ensures to have the correct time stamp on different servers.

```php
public $timezone    = 'Europe/Istanbul';
```

---


## Efficient Methods

The basic methods required by the project are active by default and are presented to your information below.

-   ob_start()
-   error_reporting(-1)
-   error_reporting(E_ALL) 
-   ini_set('display_errors', 1)   
-   set_time_limit(0)
-   ini_set('memory_limit', '-1')
-   date_default_timezone_set
-   [dbConnect()](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#dbconnect)
-   [request()](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#request)
-   [session_check()](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#session_check)
-   [firewall()](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#firewall)

---

## Effective Variables

##### public $post

Requests `$_GET`, `$_POST`, `$_FILES` and `JSON POST` made in the project where the class is included are kept in the array variable `$this->post`. `public` feature is defined to allow access from outside the class.

##### public $base_url

The path to the folder where the **Mind.php** file is located is kept in the variable `$this->base_url`. The `public` property is defined to allow access from outside the class.

##### public $page_current

The currently displayed page path is kept in the variable `$this->page_current`. The `public` property is defined to allow access from outside the class.

##### public $page_back

The previous page path is kept in the `$this->page_back` variable. The `public` property is defined to allow access from outside the class.

##### public $timezone

The time zone of the project is kept in this variable, it is specified as `Europe/Istanbul` by default. The `public` property is defined to allow access from outside the class.

##### public $timestamp

The timestamp of the project is kept in the variable `$this->timestamp` in the format **year-month-day hour:minute:second**. The `public` property is defined to allow access from outside the class.

##### public $lang

It is the variable where the settings are kept for multi-language support, `public` property is defined to allow access from outside the Class. These settings are moved in columns `table`, `column`, `haystack`, `return`, `lang`.

##### private $conn

The variable that holds the database connection. The connection is terminated by assigning the `null` parameter at the end of the class. By default, the `private` property is defined.

##### public $monitor

It serves to keep database queries, layer, error, route and request movements that occur in the project. Layers in the key `['layer']`, routes in the key `['route']`, and system errors in the `['error']`. The `public` property is defined to allow access from outside the class.

##### public $parent_class

It is a variable created to enable classes using the Mind class to use CSRF tokens created in the Mind class.It helps to check whether Mind is added with Extnds.

##### public $conf

The configuration information specified to the founder (`__construct`) method used when selecting the Mind Class is defined to this variable. `public` feature is defined to prevent access from outside the class.

##### public $error_status

Variable that carries error states as `true` or `false`, by default it is specified as `false`. The `public` property is defined to allow access from outside the class.

#### public  $errors

It is the variable that is kept in error messages, and the `public` feature is defined to allow external access.

---

## Methods

##### Basis

-   [__construct](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#__construct)
-   [__destruct](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#__destruct)

##### Database

-   [dbConnect](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#dbConnect)
-   [selectDB](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#selectDB)
-   [dbList](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#dbList)
-   [tableList](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#tableList)
-   [columnList](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#columnList)
-   [dbCreate](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#dbCreate)
-   [tableCreate](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#tableCreate)
-   [columnCreate](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#columnCreate)
-   [dbDelete](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#dbDelete)
-   [tableDelete](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#tableDelete)
-   [columnDelete](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#columnDelete)
-   [dbClear](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#dbClear)
-   [tableClear](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#tableClear)
-   [columnClear](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#columnClear)
-   [insert](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#insert)
-   [update](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#update)
-   [delete](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#delete)
-   [getData](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#getData)
-   [samantha](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#samantha)
-   [theodore](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#theodore)
-   [amelia](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#amelia)
-   [matilda](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#matilda)
-   [do_have](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#do_have)
-   [getId](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#getId)
-   [newId](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#newId)
-   [increments](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#increments)
-   [tableInterpriter](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#tableInterpriter)
-   [backup](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#backup)
-   [restore](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#restore)
-   [pagination](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#pagination)
-   [translate](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#translate)

##### Confirmatory

-   [is_db](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_db)
-   [is_table](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_table)
-   [is_column](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_column)
-   [is_phone](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_phone)
-   [is_date](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_date)
-   [is_email](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_email)
-   [is_type](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_type)
-   [is_size](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_size)
-   [is_color](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_color)
-   [is_url](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_url)
-   [is_http](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_http)
-   [is_https](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_https)
-   [is_json](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_json)
-   [is_age](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_age)
-   [is_iban](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_iban)
-   [is_ipv4](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_ipv4)
-   [is_ipv6](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_ipv6)
-   [is_blood](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_blood)
-   [is_latitude](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_latitude)
-   [is_longitude](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_longitude)
-   [is_coordinate](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_coordinate)
-   [is_distance](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_distance)
-   [is_md5](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_md5)
-   [is_base64](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_base64)
-   [is_ssl](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_ssl)
-   [is_htmlspecialchars](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_htmlspecialchars)
-   [is_morse](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_morse)
-   [is_binary](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_binary)
-   [is_timecode](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_timecode)
-   [is_browser](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_browser)
-   [is_decimal](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_decimal)
-   [is_isbn](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_isbn)
-   [is_slug](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_slug)
-   [timecodeCompare](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#timecodeCompare)
-   [is_port](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_port)
-   [is_port_open](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#is_port_open)
-   [fileExists](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#fileExists)
-   [validate](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#validate)

##### Helper

-   [policyMaker](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#policyMaker)
-   [print_pre](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#print_pre)
-   [arraySort](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#arraySort)
-   [info](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#info)
-   [request](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#request)
-   [filter](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#filter)
-   [firewall](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#firewall)
-   [redirect](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#redirect)
-   [permalink](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#permalink)
-   [timeForPeople](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#timeForPeople)
-   [timezones](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#timezones)
-   [languages](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#languages-1)
-   [currencies](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#currencies)
-   [morsealphabet](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#morsealphabet)
-   [getDateLib](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#getDateLib)
-   [session_check](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#session_check)
-   [remoteFileSize](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#remoteFileSize)
-   [addLayer](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#addLayer)
-   [columnSqlMaker](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#columnSqlMaker)
-   [wayMaker](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#wayMaker)
-   [generateToken](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#generateToken)
-   [coordinatesMaker](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#coordinatesMaker)
-   [encodeSize](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#encodeSize)
-   [decodeSize](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#decodeSize)
-   [toSeconds](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#toSeconds)
-   [toTime](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#toTime)
-   [toRFC3339](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#toRFC3339)
-   [summary](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#summary)
-   [getIPAddress](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#getipaddress)
-   [getLang](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#getlang)
-   [getAddressCode](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#getAddressCode)
-   [addressCodeList](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#addressCodeList)
-   [addressGenerator](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#addressGenerator)
-   [committe](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#committe)

##### System

-   [getOS](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#getOS)
-   [getSoftware](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#getsoftware)
-   [getBrowser](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#getBrowser)
-   [route](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#route)
-   [write](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#write)
-   [upload](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#upload)
-   [duplicate](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#duplicate)
-   [get_contents](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#get_contents)
-   [distanceMeter](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#distanceMeter)
-   [evalContainer](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#evalContainer)
-   [safeContainer](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#safeContainer)
-   [lifetime](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#lifetime-1)
-   [morse_encode](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#morse_encode)
-   [morse_decode](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#morse_decode)
-   [stringToBinary](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#stringtobinary)
-   [binaryToString](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#binarytostring)
-   [hexToBinary](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#hexToBinary)
-   [siyakat_encode](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#siyakat_encode)
-   [siyakat_decode](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#siyakat_decode)
-   [abort](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#abort)
-   [captcha](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#captcha)
-   [rm_r](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#rm_r)
-   [ffsearch](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#ffsearch)
-   [json_encode](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#json_encode)
-   [json_decode](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#json_decode)
-   [saveAs](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#saveAs)
-   [mime_content_type](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#mime_content_type)
-   [popup](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#popup)
-   [managerSentence](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#managerSentence)
-   [format_date](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#format_date)

---

## __construct()

It is used to provide database connection in the light of the information specified during the [installation](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#setup) phase and to activate the methods in the [Active Methods](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#Efficient-Methods) section.


---

## __destruct()

It is used to determine the fate of changing requests and situations within the methods.In addition, if there is an error status in any part, the error page is displayed.

---


## dbConnect()

Used to perform database connection. `mysql`, `sqlite` and `sqlsrv` database support types. By default, it is activated by running in `__construct()`.

code:
```php
$conf = [
    'db'=>[
        'drive'     =>  'mysql', // mysql, sqlite, sqlsrv
        'host'      =>  'localhost',  // for sqlsrv : www.example.com\\MSSQLSERVER,'.(int)1433
        'dbname'    =>  'mydb', // mydb, app/migration/mydb.sqlite
        'username'  =>  'root',
        'password'  =>  '',
        'charset'   =>  'utf8mb4'
    ]
];
$this->dbConnect($conf);
```

**Information:** Connection information is not obliged to be sent. If the information is not sent, the database connection is made by considering the following information defined in `Mind.php`.

code:
```php
private $db             =  [
    'drive'     =>  'mysql', // mysql, sqlite, sqlsrv
    'host'      =>  'localhost',  // for sqlsrv: www.example.com\\MSSQLSERVER,'.(int)1433
    'dbname'    =>  'mydb', // mydb, app/migration/mydb.sqlite
    'username'  =>  'root',
    'password'  =>  '',
    'charset'   =>  'utf8mb4'
];
```
---
## selectDB()

It is used to select the database where the user specified in the [Setup](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#setup) step is authorized. The database name must be specified as `string`.

code:
```php
$this->selectDB('blog');
$this->print_pre($this->getData('users', array('limit'=>array('end'=>2))));
```

output:
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

It is used to list the databases for which the user specified in the [Setup](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#setup) step is authorized. Databases are returned as `array`.

code:
```php
$this->print_pre($this->dbList());
```

output:
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

Used to list the tables of the specified database. The name of the database should be specified as `string`. The results are returned as a series.

code:
```php
$this->print_pre($this->tableList('blog'));
```

output:
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

It is used to list the columns of the specified database table.The database table name should be specified as `string`. The columns are returned as array.

code:
```php
$this->print_pre($this->columnList('translations'));
```

output:
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

It is used to create a new or more databases.The names of the database to be created can be sent as `string` or `array`. If the transaction is successful, `true`, if not successful, `false` response will be returned. If the database named to the project is sent to the `dbcreate()` method, that database is selected after it is created..


code:
```php
$this->dbCreate('mydb');
```

output:
```php
The database was created.
```

_**or**_


code:
```php
$this->dbCreate(array('mydb','mydb1'));
```

output:
```php
Database could not be created.
```

---

## tableCreate()

It is used to create a new database table.If the transaction is successful, the answer `true`, if not `false` will be returned.


##### Features

-   int - (`int`)
-   decimal - (`decimal`)
-   string - (`varchar`)
-   small - (`text`)
-   medium - (`mediumtext`)
-   large - (`longtext`)
-   increments - (`auto_increment`)

##### Example
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
**Info:** For more information on creating a column, see method [columnCreate](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#columnCreate) .

---

## columnCreate()

It is used to create one or more columns in the database table, and the column name and feature can be sent as `array`. If the transaction is successful, the answer `true`, if not` false 'will be returned.

##### Features

-   int - (`int`)
-   decimal - (`decimal`)
-   string - (`varchar`)
-   small - (`text`)
-   medium - (`mediumtext`)
-   large - (`longtext`)
-   increments - (`auto_increment`)

#### Example
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

It is used to hold numbers. It takes 3 parameters. `number`:`int`@`11` is the first parameter column name. The second parameter is the column type. The third parameter is the maximum limit of the column values. The third parameter is not required, it defaults to `11` if not specified.

##### Example
```php
$scheme = array(
    'number:int@12'
);
$this->columnCreate('phonebook', $scheme);
```
**or**

```php
$scheme = array(
    'number:int'
);
$this->columnCreate('phonebook', $scheme);
 ```
 
#### decimal
 
Used to keep monetary values, it takes 3 parameters.`amount`:`decimal`@`6.2` is the first parameter column name.The second parameter is the type of column.The third parameter is the value of the column.The third parameter is not compulsory, if not specified, it will take `6.2` by default.
 
##### Example
```php 
$scheme = array(
    'amount:decimal@6,2'
);
$this->columnCreate('phonebook', $scheme);
```     

**or**

```php 
$scheme = array(
    'amount:decimal'
);
$this->columnCreate('phonebook', $scheme);
```
#### string (varchar)

The string with a specified character length is used to keep data.It takes 3 parameters.`title`:`string`@`120` is the first parameter column name. The second parameter is the type of column. The third parameter represents the maximum number of characters of the string value of the column. The third parameter is not compulsory, if not specified, it will take the value of `255` by default.

##### Example
```php
$scheme = array(
    'title:string@120'
);
$this->columnCreate('phonebook', $scheme);
```
**or**

```php
$scheme = array(
    'title:string'
);
$this->columnCreate('phonebook', $scheme);
```
#### small (text)

`65535` is used to keep the data in the string structure. It takes 2 parameters.`content`:`small` is the name of the first parameter column, the second parameter column. The second parameter is not compulsory.If the second parameter is not specified, the column takes the `small` type by default.

##### Example
```php
$scheme = array(
    'content:small'
);
$this->columnCreate('phonebook', $scheme);
``` 
**or**

```php
$scheme = array(
    'content'
);
$this->columnCreate('phonebook', $scheme);
```

#### medium (mediumtext)

`167777215` is used to keep the data in the string structure.It takes 2 parameters. `description`:`medium` is the first parameter column name, the second parameter column type.Both parameters have to be specified.


##### Example
```php
$scheme = array(
    'description:medium'
);
$this->columnCreate('phonebook', $scheme);
```
#### large (longtext)

`4294967295` is used to keep the data in the string structure. It takes 2 parameters.`content`:`large` is the first parameter column name, the second parameter column type. Both parameters have to be specified.

##### Example
```php
$scheme = array(
    'content:large'
);
$this->columnCreate('phonebook', $scheme);     
```
#### increments (auto_increment)

It is used to have an auto-incrementing number for each record added to the database table. It takes 3 parameters. `id`:`increments`@`11` is the first parameter column name. The second parameter is the column type. The third parameter represents the digit maximum limit of the increase. The third parameter is not required, it defaults to `11` if not specified.

##### Example
```php
$scheme = array(
    'id:increments@12'
);
$this->columnCreate('phonebook', $scheme);
```    

**or**

```php   
$scheme = array(
    'id:increments'
);
$this->columnCreate('phonebook', $scheme);
```
---

## dbDelete()

It is used to delete one or more databases, `mydb0` and `mydb1` represent database names, database deletion takes place when database names are sent as `string` or `array`. A `true` response is returned if the operation is successful, and a `false` response is returned.

##### Example
```php
$this->dbDelete('mydb0');
```
**or**

```php
$this->dbDelete(array('mydb0','mydb1'));
```
---

## tableDelete()

It is used to delete one or more database tables, `my_table0` and `my_table1` represent database table names, when table names are sent as `string` or `array`, deletion takes place. A `true` response is returned if the operation is successful, and a `false` response is returned.
##### Example
```php
$this->tableDelete('my_table0');
```
**or**

```php
$this->tableDelete(array('my_table0', 'my_table1'));
```
---

## columnDelete()

It is used to delete one or more columns in the database table. `users` represents the table name, `username` and `password` represent the columns to be deleted. Deletion occurs when column names are sent as `string` or `array`. A `true` response is returned if the operation is successful, and a `false` response is returned.

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


code:
```php
$this->columnDelete('users', 'username');
```

output:
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

code:
```php
$this->columnDelete('users', array('username', 'password'));
```

output:
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

Used to delete one or more database contents (including auto_increment values), `mydb0` and `mydb1` represent database names. Deletion occurs when database names are sent as `string` or `array`. A `true` response is returned if the operation is successful, and a `false` response is returned.

##### Example
```php
$this->dbClear('mydb0');
```
**or**

```php
$this->dbClear(array('mydb0','mydb1'));
```

---

## tableClear()

It is used to delete all records (including auto_increment values) in one or more database tables. Database table names can be sent as `string` or `array`. `my_table0` and `my_table1` represent database table names. A `true` response is returned if the operation is successful, and a `false` response is returned.

##### Example

```php
$this->tableClear('my_table0');
```
**or**

```php
$this->tableClear(array('my_table0', 'my_table1'));
```
---

## columnClear()

It is used to delete all records of one or more columns in a database table. Column names can be sent as `string` or `array`. `username` and `password` represent column names. A `true` response is returned if the operation is successful, and a `false` response is returned.
##### Example

```php
$this->columnClear('username');
```
**or**

```php
$this->columnClear(array('username', 'password'));
```
    
---

## insert()

It is used to add one or more records to the database table. It takes 3 parameters, the first parameter is the database table name, the second is for the `array` or `array` where the data is located. The third parameter is for 'trigger' tasks and its usage is presented below for your information. Returns `true` if all operation(s) are successful, `false` if not.

##### Example
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
**or**

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
**or**

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
**or** 

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

It is used to update a record in the database table. `my_table` represents the database table name. `title`, `content` and `tag` represent the columns in the `my_table` table. `17` represents the `id` of the record requested to be updated.

The update process occurs when new values are sent as `array`. To search for the `id` parameter in a column for which the `auto_increment` property is not defined, it is necessary to specify the column name in the 4th parameter. A `true` response is returned if the operation is successful, and a `false` response is returned.

##### Example
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
**or**

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

It is used to delete one or more records in the database table. It is also possible to delete records in other tables while performing this deletion. It offers various usage patterns according to developer habits. A `true` response is returned if the operation is successful, and a `false` response is returned.

#### delete records by sending auto_increment values

In this usage, the parameter(s) specified in a column with auto_increment property are searched and the found records are deleted, it is mandatory to specify the table name and parameter(s). The value of type `boolean` specified in the 3rd parameter forces deletion regardless of the parameter's existence. A `true` response is returned if the operation is successful, and a `false` response is returned.

##### Example

```php
if($this->delete('users', 73)){
    // true
} else {
    // false
}
```
**or**

```php
if($this->delete('users', 66, true)){
    // true
} else {
    // false
}
```
**or**

```php
$query = $this->delete('users', array(74,75));

if($query){
    // true
} else {
    // false
}
```
**or** 

```php
$query = $this->delete('users', array(76,77), true);

if($query){
    // true
} else {
    // false
}
```

#### Delete record(s) by specifying column name
In this usage, parameter(s) are searched in a column for which the `auto_increment` property is not defined, and the record(s) found are deleted. It is necessary to specify the column name in the 3rd parameter. The value of type `boolean` specified in the 4th parameter forces deletion regardless of the parameter's existence. A `true` response is returned if the operation is successful, and a `false` response is returned.

##### Example
```php
$query = $this->delete('users', 'fikret', 'username');

if($query){
    // true
} else {
    // false
}
```
**or** 

```php
$query = $this->delete('users', 'fikret', 'username', true);

if($query){
    // true
} else {
    // false
}
```
**or**

```php
$query = $this->delete('users', array('julide', 'Fatih'), 'username');

if($query){
    // true
} else {
    // false
}
```
**or**

```php
$query = $this->delete('users', array('julide', 'Fatih'), 'username', true);

if($query){
    // true
} else {
    // false
}
```


#### Delete with connected records
If there are other table columns with the mentioned parameter, if these table and column names are specified, matching related records will be deleted. According to the usage below, the `boolean` type value specified in the 4th and 5th parameters forces the deletion regardless of the parameter's existence. A `true` response is returned if the operation is successful, and a `false` response is returned.

##### Example
```php
$trigger = array('log'=>'user_id');
$query = $this->delete('users', 1, $trigger)

if($query){
    // true
} else {
    // false
}
```
**or** 

```php
$trigger = array('log'=>'user_id');
$query = $this->delete('users', 1, $trigger, true);

if($query){
    // true
} else {
    // false
}
```

**or** 

```php
$trigger = array('log'=>'user_id');
$query = $this->delete('users', array(2,3), $trigger);

if($query){
    // true
} else {
    // false
}
```
**or**

```php
$trigger = array('log'=>'user_id');
$query = $this->delete('users', array(4,5), $trigger, true);

if($query){
    // true
} else {
    // false
}
```
**or**

```php
$trigger = array('log'=>'username');
$query = $this->delete('users', 'Fatih', 'username', $trigger);

if($query){
    // true
} else {
    // false
}
```
**or**
```php
$trigger = array('log'=>'username');
$query = $this->delete('users', 'Fatih', 'username', $trigger, true);

if($query){
    // true
} else {
    // false
}    
```
**or**

```php
$trigger = array('log'=>'username');
$query = $this->delete('users', array('Fatih','aliyilmaz'), 'username', $trigger);

if($query){
    // true
} else {
    // false
}
```
**or**

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

It is used to retrieve records in a database table as is or by filtering. `my_table` stands for table name, `$options` parameters and usage examples are given below.


#### Reach all records

It is used to get all the records of a database table. It is possible to use it without the need for any additional parameters, but obtaining a large amount of data at once can create a load on the server and user side, reducing project performance.

##### Example

```php
$this->print_pre($this->getData('my_table'));
```


#### column: Reach table columns

It is used to obtain the specified column data in a database table. Since it doesn't retrieve all column data, it allows for a lighter query. `column` represents the name of the property, `title` and `tag` represent the column names.

##### Example
```php
$options = array(
    'column' => array(
        'title',
        'tag'
    )
);
$this->print_pre($this->getData('my_table', $options));
```
**or**

```php
$options = array(
    'column' => 'title'
);
$this->print_pre($this->getData('my_table', $options));
```


#### limit: Reach the registration range

It is used to obtain the records in the database according to the specified limits. `limit` represents the name of the feature, and `start` and `end` represent the sub-property names. `start` and `end` must be specified to get the recording interval.
##### Example
```php
$options = array(
    'limit' => array('start'=>'1', 'end'=>'10')
);
$this->print_pre($this->getData('my_table', $options));
```


#### limit:start To ignore the first record in the specified amount

It is used to ignore the specified number of records from the first to the last added in the database table. `limit` represents the name of the property, `start` represents the amount of records to be ignored.
##### Example
```php
$options = array(
    'limit' => array('start' => '2')
);
$this->print_pre($this->getData('my_table', $options));
```


#### limit:end Reaching as much as the specified amount

It is used to obtain the specified number of records in the database table. `limit` represents the name of the property, `end` represents the amount of records to be obtained.

##### Example
```php
$options = array(
    'limit' => array('end' => '10')
);
$this->print_pre($this->getData('my_table', $options));
```


#### sort: Sorting records

It is used to sort the records in the database table according to the specified column content, from smallest to largest or from largest to smallest. `sort` represents the name of the property, `columnname` represents the column name to be sorted, `ASC` represents the request to sort in ascending order, and `DESC` represents the request to sort in descending order.
##### Example
```php
$options = array(
    'sort' => 'columnname:ASC'
);
$this->print_pre($this->getData('my_table', $options));
```
**or**

```php
$options = array(
    'sort' => 'columnname:DESC'
);
$this->print_pre($this->getData('my_table', $options));
```


#### search: Make a search

It is used to search for keywords in a database table. Keywords can be sent as `string` or `array`. `search` represents the name of the feature, `keyword` represents the searched keywords.  

##### Example
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
**or**

```php
$options = array(
    'search' => array(
        'scope'=>'like',
        'keyword' => 'merhaba dünya'
    )
);
$this->print_pre($this->getData('my_table', $options));
```

#### search: Search everywhere

It is used to broad match search for keywords in the database table. Words can be sent as `string` or `array`.

If the word or words are specified as `%word%`, the `word` in the sentence is searched, if not specified, only the records that exactly match the `word` value are searched.

To search for content that ends with **word**, it is necessary to use an expression such as `%word`, and to search for content that begins with **word**, it is necessary to use an expression such as `word%`.

##### Example
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
**or**

```php
$options = array(
    'search' => array(
        'scope'=>'like',
        'keyword' => 'merhaba dünya%'
    )
);
$this->print_pre($this->getData('my_table', $options));
```

#### search:column Search in columns

Used to search specified columns of a database table with an exact or general match policy, words and columns can be sent as `string` or `array`. `column` represents the property name, `id`, `title`, `content` and `tag` represent column names.

##### Example
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
**or**

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

#### search:and Searching for a column specific word

If any finding is found in all of the search results made in more than one column of the record, it ensures that they are returned as an `array`.

***Info:*** If a column definition is made in the getData:column part, these columns must be in the columns that are desired to be searched.


##### Example
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
**or**

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


#### search:or Column

If any of the search results made in more than one column of the record are found, it ensures that they are returned as an `array`.

##### Example
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
**or**

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
**Information:** getdata: If the column is defined in the column section, it is necessary to be in the columns to be searched in these columns.


#### search:delimiter Column-specific word string separator

It is a feature designed to be used in `search:and` and `search:or` methods used to search for column-specific words.


For example, suppose that a schema is sent to the sub-property `search:and` as a multiple array, the expression that is desired to be placed between each set of sequences in this scheme with other sibling sets is specified in the delimiter property.

To better understand the example, you can examine the diagram that must be written in order to obtain correspondence between two people.

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

#### search:scope Customizable sensitivity

`like` or `LIKE` parameter must be specified as `string` so that searches can be done without case sensitivity. When this method is preferred, signs expressing scope such as `%` can be sent. If `scope` is not specified, searches are performed by considering case sensitivity.

**Info:** This feature can be used with all search sub-features such as `search:and`, `search:or`, `search:delimiter`, `search:keyword`.
##### Example
```php
$options = array(
    'search'=>array(
        'scope'=>'LIKE', // like or LIKE
        'keyword'=>'%ali%'
    )
);

$this->print_pre($this->getData('users', $options));
```

**or** 

```php
$options = array(
    'search'=>array(
        'keyword'=>'aliyilmaz'
    )
);

$this->print_pre($this->getData('users', $options));
```

#### search:ignored To take into account the records other than the specified conditions
It is used to obtain records other than those who meet the specified requirements.


##### Örnek
```php
$options = [
    'search'=>[
      'ignored'=>[
        'service_id'=>1,
        'position_id'=>9
      ]
    ]
  ];
  $data = $this->getData('contents', $options);
  $this->print_pre($data);
```

**or** 

```php
$options = [
    'search'=>[
      'ignored'=>[
        [
          'service_id'=>1,
          'position_id'=>6
        ],
        [
          'service_id'=>1,
          'position_id'=>9
        ],
        [
          'service_id'=>1,
          'position_id'=>4
        ]
      ]
    ]
  ];
  $data = $this->getData('contents', $options);
  $this->print_pre($data);
```

#### join: Syncing tables

It provides results by matching columns in different tables with each other. It supports `INNER JOIN`, `LEFT JOIN`, `RIGHT JOIN`, `FULL OUTER JOIN` matching types and is not case sensitive. The usage example is presented below for your information. `name` represents the matching type, `tables` represents the tables to be mapped, `primary` represents the column equivalent in the reference table, `secondary` represents the column equivalent in the table in question, and `fields` represents the column names to be displayed. If `fields` is left blank, all columns will be displayed.

##### Example

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


#### format: Format of Results

It is used to specify the result output formats. It currently supports `json` format except `array` format.

##### Example
```php
$options = array(
    'format' => 'json'
);
$this->print_pre($this->getData('my_table', $options));
```


#### The use of features together

Many of the `getData()` features can be used together, such uses do not create any load and can be a life saver for projects that require high performance.

##### Example
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
**or**

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

**or**

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

Spike Jonze was inspired by the character `samantha` found in the film **Her**. It is possible to obtain all the data except the column names, the data required to be viewed in those columns and the conditions specified.

#### It takes 4 parameters; 

* The first is the part where the table name can be defined in the form of string and must be specified.

* The second is the part where multiple conditions can be defined within a number and must be specified.

* The third is the part in which the columns that are desired to be displayed can be defined in the form of a string or array and are not required.

* The fourth is the recommended portion of the data other than the specified conditions and it is not compulsory.


##### Example
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
**or**

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
**or**

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

**or**
```php
$options = [
    'service_id'=>1,
    'position_id'=>4
];
$data = $this->samantha('contents', ['position_id'=>9], null, $options);
$this->print_pre($data);
```

**or**
```php
$options = [
    [
        'service_id'=>1,
        'position_id'=>6
    ],
    [
        'service_id'=>1,
        'position_id'=>9
    ],
    [
        'service_id'=>1,
        'position_id'=>4
    ]
];
$data = $this->samantha('contents', ['position_id'=>8], null, $options);
$this->print_pre($data);
```
---


## theodore()

Just like Samantha, this method was created in inspiration from the character of Theodore Twombly, which came to life in every film.It is used to obtain a registration known to be a certain one as a series.

#### It takes 4 parameters; 

* The first is the part where the table name can be defined in the form of string and must be specified.

* The second is the part where multiple conditions can be defined within a number and must be specified.

* The third is the part in which the columns that are desired to be displayed can be defined in the form of a string or array and are not required.

* The fourth is the recommended portion of the data other than the specified conditions and it is not compulsory.


##### Example
```php
// Array
// (
//     [group_id] => 10
// )

$this->print_pre($this->theodore('permission', array('user_id'=>15), 'group_id'));
```
**or**

```php
// Array
// (
//     [id] => 208
//     [group_id] => 10
// )

$this->print_pre($this->theodore('permission', array('user_id'=>15), array('id', 'group_id')));
```
**or**

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

**or**
```php
$options = [
    'service_id'=>1,
    'position_id'=>4
  ];
$data = $this->theodore('contents', ['id'=>2], null, $options);
$this->print_pre($data);
```

**or**
```php
$options = [    
    [
        'service_id'=>1,
        'position_id'=>9
    ],
    [
        'service_id'=>1,
        'position_id'=>4
    ]
];
$data = $this->theodore('contents', ['id'=>2], null, $options);
$this->print_pre($data);
```

---

## amelia()

As in Samantha and Theodore methods, Amelia was inspired by every film.The task returns an empty response if it does not meet the conditions of a record that is known to be only one record.

#### It takes 4 parameters; 

* The first is the part where the table name can be defined in the form of string and must be specified.

* The second is the part where multiple conditions can be defined within a number and must be specified.

* The third is the part where the column to be displayed can be defined in a string form and must be specified.

* The fourth is the recommended portion of the data other than the specified conditions and it is not compulsory.


##### Example
```php
// 208

$this->print_pre($this->amelia('permission', array('user_id'=>15), 'id'));
```


**or**
```php
$options = [
    'service_id'=>1,
    'position_id'=>4
  ];
$data = $this->amelia('contents', ['id'=>2], 'title', $options);
echo $data;
```

**or**
```php
$options = [    
    [
        'service_id'=>1,
        'position_id'=>9
    ],
    [
        'service_id'=>1,
        'position_id'=>4
    ]
];
$data = $this->amelia('contents', ['id'=>2], 'title', $options);
echo $data;
```

---

## matilda()
Inspired by the name of Matilda, the fictional character of the 1996 movie Matilda, this method serves to search for one or more parameters with the `like` container, thereby allowing the use of the `%` operator.

Data obtained;

Which columns will be displayed
How many data will be displayed
How many data will be ignored
Which condition should be taken into consideration.
Which record range will be achieved
Sorting the data (it is also possible to sort according to the column)
Format of Data (Return Array | JSON)

such as they can be specified.

The first parameter is the table name and must be specified as `string`, the second parameter is words of type `string` or `array` and must be specified.

The third parameter is used to select a record and must be specified in `array` type. If selection is not made and other parameters are desired to be sent, one of the values `null`, `[]` or `''` can be assigned to the third parameter.

The fourth parameter is the column names that are specified as `string` or `array` type and are not required to be specified, If it is not specified, one of the values `null`, `[]` or `''` will be assigned to display all columns.

The fifth parameter is used to determine which condition to consider data other than those that satisfy, if no such filtration will be made, one of the values `null`, `[]` or `''` must be specified.

The sixth parameter is used to specify the number of records to be ignored and is not required, if not specified, one of the values `0`, `null`, `[]` or `''` can be assigned.

The seventh parameter is used to limit the number of records and is not required to be specified, if not specified, one of the values `0`, `null`, `[]` or `''` can be assigned.

The eighth parameter is used to sort the obtained records from new to old or old to new, and is not mandatory, if omitted, one of the values `0`, `null`, `[]` or `''` can be assigned, by default records are sorted by `ASC` policy from smallest to largest if only `columnname` is sent they will be sorted accordingly. Another usage is `columnname:desc`, in this usage it is sorted by column name sorting principle. The sorting policy can be specified as `asc` or `desc` and is not case sensitive.

The ninth parameter contains the output format of the recordset and is not mandatory. By default, data is returned as `array`, If `json` type is desired, it is sufficient to send `json` value. If it is not specified, there is no need to send a value, but if you still want to specify it, one of the values `0`, `null`, `[]` or `''` can be assigned.



```php
$data = $this->matilda('users', 'ali%', null, null, null, 0);
$this->print_pre($data);
```

**or**

```php
$data = $this->matilda('users', 'a%', null, 'username', null, null, 4);
$this->print_pre($data);
```

**or**

```php
$data = $this->matilda('users', ['%a%'], [['id'=>1]], ['username','avatar'], null, 4);
$this->print_pre($data);
```

**or**

```php
$data = $this->matilda('users', ['%a%'], [['id'=>1],['id'=>2]], ['username','avatar'], null, 2);
$this->print_pre($data);
```

**or**

```php
$data = $this->matilda('users', ['%a%'], [['id'=>1],['id'=>2]], ['username','avatar'], null, 0, 2, 'id:desc');
$this->print_pre($data);
```

**or**

```php
$data = $this->matilda('users', ['%a%'], [['id'=>1],['id'=>2]], ['username','avatar'], null, 0, 2, null, 'json');
$this->print_pre($data);
```

**or**

```php
$options = [
    'group_name'=>'admin'
];
$data = $this->matilda('users', ['%ali%'], null, null, $options);
$this->print_pre($data);

```

**or**

```php
$options = [    
    [
        'group_name'=>'write',
    ],
    [
        'status'=>1
    ]
];
$data = $this->matilda('users', ['%ali%'], null, null, $options);
$this->print_pre($data);
```

---

## do_have()

It is used to check whether one or more data exists in the database table with the exact match principle.

We use such a control in cases where we do not want to register with the same member information, or when we really need to check the data sent from the Select Box with the source of the Select Box.

`$tblname` represents the table name, `$str` represents the data, `$column` represents the column to see if there is data, if the variable `$column` is left blank, the data is searched in all columns of the table. `$str` can be specified as a string or as an array structure using the column name as the key.

The `$ignored` variable serves to take into account the records other than the specified conditions.It is not necessary to specify.

If a matching record is found in the search result, `true` is returned, otherwise `false` is returned.

##### Example
```php
$tblname = 'users';
$str = 'aliyilmaz.work@gmail.com';
$column = 'email_address';
if($this->do_have($tblname, $str, $column)){
    echo 'This e-mail address is used';
} else {
    echo 'This e-mail address is not used.';
}
```
**or**

```php
$tblname = 'users';
$str = 'aliyilmaz.work@gmail.com';
if($this->do_have($tblname, $str)){
    echo 'This e-mail address is used';
} else {
    echo 'This e-mail address is not used.';
}
```
**or**

```php
if($this->do_have('users', 'aliyilmaz.work@gmail.com', 'email_address')){
    echo 'This e-mail address is used';
} else {
    echo 'This e-mail address is not used.';
}
```
**or**

```php
if($this->do_have('users', 'aliyilmaz.work@gmail.com')){
    echo 'This e-mail address is used';
} else {
    echo 'This e-mail address is not used.';
}
```
**or**

```php
if($this->do_have('users', array('email'=>'aliyilmaz.work@gmail.com'))){
    echo 'This e-mail address is used';
} else {
    echo 'This e-mail address is not used.';
}
```

**or**

```php
if($this->do_have('users', 'ceyda', null, ['status'=>1])){
    echo 'true';
} else {
    echo 'false';
}
```

**or**

```php
if($this->do_have('users', 'ceyda', null, [['status'=>1],['email'=>'ceyda1@example.com']])){
    echo 'true';
} else {
    echo 'false';
}
```

---

## getId()

It serves to show the value in the `auto_increment` property defined column of only one record that meets the conditions specified in a database table. `$tblname` represents the table name, `$needle` represents the conditions.

##### Example

```php
$needle = array(
    'username'=>'burcu',
    'password'=>md5(123123)
);

echo $this->getId('users', $needle);
```


**Info:** The fact that the `insert` method returns a `boolean` type response, the `amelia` method does not automatically target the column with the `auto_increment` property defined, and the need for a method that provides an `id` with a more meaningful name has led to the creation of this method.

---

## newId()

It serves to display the `auto_increment` value that will be allocated to the record that is planned to be added to a database table. `$tblname` represents the table name.

##### Example
```php
$tblname  = 'users';
echo $this->newId($tblname);
```

---

## increments()

It is used to show the column name with the `auto_increment` function in the database table. `$tblname` represents the database table name.

##### Example

```php
$tblname = 'users';
echo $this->increments($tblname);
```

---

## tableInterpriter()

It is an interpretive method that converts the database table created with Mind into Mind's database table creation schema. The database table name must be specified in a `string` structure.

If there are columns to be ignored, they must be specified as `string` or `array`. The table generator schema in question is returned in the array structure. The reason why this method is needed is the need to generate a rebuild image of the database tables.

**Note:** If the database table does not exist or is empty, an empty array is returned as the response.


code:
```php
$this->print_pre($this->tableInterpriter('users'));
```

output:
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


code:
```php
$this->print_pre($this->tableInterpriter('users', 'address'));
```

output:
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

code:
```php
$this->print_pre($this->tableInterpriter('users', ['address', 'age']));
```

output:
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

Used to back up one or more databases. It takes two parameters, the first represents the database names and must be specified, these names can be sent in `string` and `array` format, the second parameter represents the directory path where the backup is to be located and is not mandatory, this path must be specified as `string`.

The backup is in `JSON` structure, if you want to save it to the computer via the browser, the second parameter is not sent.
##### Example

```php
$this->backup('mydb');
```

**or** 

```php
$this->backup(array('mydb', 'trek'));
```

**or**

```php
$this->backup('mydb', 'restore/');
```

**or**

```php
$this->backup(array('mydb', 'trek'), './');
```

---

## restore()

It is used to restore a backup of one or more databases. It takes a parameter that represents paths in a `string` or `array` structure of `JSON` files and is required.

##### Example

    
```php
$this->restore('backup_2020_11_06_17_40_21.json');
```
    
or 

```php
$this->restore(array('backup_2020_11_06_17_40_21.json', 'backup_2020_11_06_17_41_22.json'));
```

---

## pagination()

It is used to paging the data in the database table.

#### prefix

It represents the page prefix and is not required, by default `p` is specified.

###### Use in URL structure without route

Suppose there is a file named `pagination.php`, by including the prefix in the full path of this file, we will display the first page data using `pagination.php?p` like this or `pagination.php?p=1` like this.


###### Usage in Rotalı URL structure

In this usage type, which requires a parameterized route, when the route is defined as `users:p` in the file where the routes are defined, if the address line is written as `users` or `users/1`, we will display the first page data.

#### limit 

It represents the number of records to be displayed on each page and is not mandatory. By default, `25` is specified.
#### search, column, format, sort

To learn more about these rules, you can directly check the method [getData](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#getData).

#### navigation

The navigation menu required to browse the pages where the pages are listed is managed by this section.

* `route_path` : The page links in the navigation menu also need a route path other than the page number, it is possible to send this path in the syntax `$options['navigation']['route_path']`. By default `page` is used.

* `prev` : It is possible to send the desired text of the previous page link in the navigation menu in this section. The `Prev` expression is used by default.

* `next` : It is possible to send the desired text of the next page link in the navigation menu in this section. The `Next` statement is used by default.


#### The purpose of using the values returning values

* The data obtained with the help of the `data` key is accessed.
* With the help of the `prefix` key, the page number prefix is accessed.
* With the 'limit' key, the information on how many data has been obtained on that page is accessed.
* The total number of pages is reached with the help of the `totalPage` key.
* The total number of records is reached with the help of the `totalRecord` key.
* The route path is reached with the help of the `route_path` key.
* With the help of the `navigation` key, the embed codes of the paging menu are accessed.
* With the help of the `page` key, the information on which page you are on is reached.

##### Example

```php
$data = $this->pagination('messages');

// kayıtlar gösteriliyor
$this->print_pre($data['data']);

// sayfalama navigasyon menüsü gösteriliyor
echo $data['navigation'];
```

**or**


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
    'prev'=>'Previous',
    'next'=>'Next'
];
$data = $this->pagination('messages', $options);

// Showing records
$this->print_pre($data['data']);

// Showing Paging Navigation Menu
echo $data['navigation'];
```


---

## translate()

This function aims to provide multiple translation support based on the database infrastructure.In order to be ready for use, the database table must be created and defined to Mind.

### Designing the database table

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

### Creation of the database table and content

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

### Using Translation

The first parameter of the `translate()` method, which takes two parameters, is the key of the record whose translation is requested, and the second parameter is the part where one of the abbreviations in the languages() method in Mind is specified. The second parameter does not have to be specified, if not specified it returns the translation of the Language abbreviation defined by default.

```php
echo $this->translate('dashboard'); // Varsayılan olarak TR belirtildiği için Başlangıç geri döndürülür.
echo '<br />';
echo $this->translate('dashboard', 'TR'); // Başlangıç
echo '<br />';
echo $this->translate('dashboard', 'EN'); // Dashboard
```

### Defining translation settings to Mind

`table` represents the table name, `column` represents the column name where the language abbreviations are kept, `haystack` represents the column name where the unique name of the record whose translation is requested, `return` represents the column name of the data to be returned, and `lang` represents the column name where the default language abbreviation is kept.

By default, the following definitions have been made, if you consider identifying names other than the usage directive specified in this document, just update the following part when calling the Mind or from the Mind.php file.

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

This function is used to query the existence of the database, `mydb` represents the database name. Database name can be sent as `string`. If the database exists, `true` is returned, otherwise `false` is returned.

##### Example

```php
if($this->is_db('mydb')){
    echo 'There is a database';
} else {
    echo 'No database';
}
```

---

## is_table()

This function is used to query the existence of the database table, `users` represents the database table name. Table name can be sent as `string`. If the table in question exists, `true` is returned, otherwise `false` is returned.

##### Example

```php
if($this->is_table('users')){
    echo 'There is a table';
} else {
    echo 'No table';
}
```

---

## is_column()

This function is used to query the existence of the specified column in the database table, `users` represents the table name, `username` represents the column name. Column name can be sent as `string`. If the column in question exists, the value `true` is returned, otherwise `false` is returned.

##### Example

```php
if($this->is_column('users', 'username')){
    echo 'There is a table';
} else {
    echo 'No table';
}
```

---

## is_phone()

This function is used to check if the data shared with it is written in a valid phone number syntax, the phone number can be sent as a `string`. If the data in question is a valid number, `true` is returned in response, otherwise `false` is returned, `$str` represents the data shared with it.
##### Example
```php
$str = '05555555555';
if($this->is_phone($str)){
    echo 'This number is a valid phone number.';
} else {
    echo 'This number is not a valid phone number.';
}
```

or 

```php
$str = '0555 555 55 55';
if($this->is_phone($str)){
    echo 'This number is a valid phone number.';
} else {
    echo 'This number is not a valid phone number.';
}
```

**or** 

```php
$str = '+905555555555';
if($this->is_phone($str)){
    echo 'This number is a valid phone number.';
} else {
    echo 'This number is not a valid phone number.';
}
```

**or** 

```php
$str = '905555555555';
if($this->is_phone($str)){
    echo 'This number is a valid phone number.';
} else {
    echo 'This number is not a valid phone number.';
}
```

---

## is_date()

This function is used to check whether the date format shared with it is genuine, date and format can be sent as `string`. `$date` and `01.02.1987` date, `$format` and `d.m.Y` represent the information in which format the date should be checked. Specifying the format parameter is optional, when not specified, the date format is assumed to be `Y-m-d H:i:s` by default. If the date is valid, `true` is returned in response, otherwise `false` is returned.

##### Example

```php
$date = '01.02.1987';
$format = 'd.m.Y';
if($this->is_date($date, $format)){
    echo 'This date is a date of birth';
} else {
    echo 'This date is not a date of birth.';
}
```

or 

```php
if($this->is_date('01.02.1987', 'd.m.Y')){
    echo 'This date is a date of birth';
} else {
    echo 'This date is not a date of birth.';
}
```

---

## is_email()

This function is used to check whether the data shared with it has the e-mail address syntax, the data can be sent as a `string`. If the data has the e-mail address syntax, `true` is returned as the response, otherwise `false` is returned.

##### Example
```php
$str = 'aliyilmaz.work@gmail.com';
if($this->is_email($str)){
    echo 'This is an email address.';
} else {
    echo 'This is not an email address.';
}
```

---

## is_type()

This function is especially used to control the format of the file to be uploaded during file upload operations, File name must be specified as `string`, File extensions can be specified as `string` or `array`. `$this->post['photo']['name']` represents the filename, `$list` represents the allowed file extensions. If the file has the allowed extension, `true` is returned in response, otherwise `false` is returned.

##### Example

```php
$list = 'jpg';
if($this->is_type($this->post['photo']['name'], $list)){
    echo 'The file you want to install has an extension permitted.';
} else {
    echo 'The file you want to install does not have an extension permitted.';
}
```

**or**

```php
$list = array('jpg', 'jpeg', 'png', 'gif');
if($this->is_type($this->post['photo']['name'], $list)){
    echo 'The file you want to install has an extension permitted.';
} else {
    echo 'The file you want to install does not have an extension permitted.';
}
```

---

## is_size()

This function is used to check the `size` value in the file array or the `byte` value specified in the `string` or `integer` structure. The first parameter represents the dimension information to be controlled, and the second parameter represents the dimension to be controlled. If the file or specified value is less than or equal to the allowable size, `true` is returned in response, otherwise `false` is returned. You can review the examples below for better understanding.
 
 **Info:** When working with files, at least the size specified in the `$size` variable must be specified in the `upload_max_filesize` parameter in the `php.ini` settings.

##### Example

```php
$second_size = '35 KB';
$this->post['photo'] = array(
    'size'=>35840
);
if($this->is_size($this->post['photo'], $second_size)){
    echo 'The first dimension is smaller or equal than the specified second size.';
} else {
    echo 'The first dimension is greater than the specified second dimension.';
}
```

**or** 

```php
$this->post['photo'] = array(
    'size'=>36700160
);
if($this->is_size($this->post['photo'], '35 MB')){
    echo 'The first dimension is smaller or equal than the specified second size.';
} else {
    echo 'The first dimension is greater than the specified second dimension.';
}
```

**or** 

```php
$this->post['photo'] = array(
    'size'=>37580963840
);
if($this->is_size($this->post['photo'], '35 GB')){
    echo 'The first dimension is smaller or equal than the specified second size.';
} else {
    echo 'The first dimension is greater than the specified second dimension.';
}
```

**or**

```php
$this->post['photo'] = array(
    'size'=>1099511627776
);
if($this->is_size($this->post['photo'], '1 TB')){
    echo 'The first dimension is smaller or equal than the specified second size.';
} else {
    echo 'The first dimension is greater than the specified second dimension.';
}
```

**or**

```php
$this->post['photo'] = array(
    'size'=>1125899906842624
);
if($this->is_size($this->post['photo'], '1 PB')){
    echo 'The first dimension is smaller or equal than the specified second size.';
} else {
    echo 'The first dimension is greater than the specified second dimension.';
}

```
**or**

```php
$second_size = 35839;
$first_size = 35839;
if($this->is_size($first_size, $second_size)){
    echo 'The value is smaller than the specified size';
} else {
    echo 'The first dimension is greater than the specified second dimension.';
}
```

**or** 

```php
$second_size = '35 KB';
$first_size = '35840';
if($this->is_size($first_size, $second_size)){
    echo 'The first dimension is smaller or equal than the specified second size.';
} else {
    echo 'The first dimension is greater than the specified second dimension.';
}
```

**or**

```php
$second_size = '1024 KB';
$first_size = '1023 KB';
if($this->is_size($first_size, $second_size)){
    echo 'The first dimension is smaller or equal than the specified second size.';
} else {
    echo 'The first dimension is greater than the specified second dimension.';
}
```


---

## is_color()

This function checks if the value shared with it is a valid color, if it is transparent or one of the 148 color names compatible with all browsers, or if it is HEX, RGB, RGBA, HSL, HSLA, the response value is `true`, otherwise `true` is returned. The value `false` is returned. `$color` represents the color value.

##### Example

##### TRANSPARENT

```php
$color = 'transparent';
if($this->is_color($color)){
    echo 'It is a valid color parameter.';
} else {
    echo 'It is not a valid color parameter.';
}
```

##### COLOR NAME

```php
$color = 'AliceBlue';
if($this->is_color($color)){
    echo 'It is a valid color parameter.';
} else {
    echo 'It is not a valid color parameter.';
}
```

##### HEX

```php
$color = '#000000';
if($this->is_color($color)){
    echo 'It is a valid color parameter.';
} else {
    echo 'It is not a valid color parameter.';
}
```

##### RGB

```php
$color = 'rgb(10, 10, 20)';
if($this->is_color($color)){
    echo 'It is a valid color parameter.';
} else {
    echo 'It is not a valid color parameter.';
}
```

##### RGBA

```php
$color = 'rgba(100,100,100,0.9)';
if($this->is_color($color)){
    echo 'It is a valid color parameter.';
} else {
    echo 'It is not a valid color parameter.';
}
```

##### HSL

```php
$color = 'hsl(10,30%,40%)';
if($this->is_color($color)){
    echo 'It is a valid color parameter.';
} else {
    echo 'It is not a valid color parameter.';
}
```

##### HSLA

```php
$color = 'hsla(120, 60%, 70%, 0.3)';
if($this->is_color($color)){
    echo 'It is a valid color parameter.';
} else {
    echo 'It is not a valid color parameter.';
}

```
---

## is_url()

It is used to check if the data shared with it is a link, `$url` represents the connection data and should be specified as `string`. If the data in question is a connection, the value `true` is returned, otherwise `false` is returned.

##### Example

```php
$str = 'http://localhost';
if($this->is_url($str)){
    echo 'This is a connection.';
} else {
    echo 'This is not a connection.';
}
```

**or**

```php
$str = 'example.com';
if($this->is_url($str)){
    echo 'This is a connection.';
} else {
    echo 'This is not a connection.';
}
```
**or**

```php
$str = 'www.example.com';
if($this->is_url($str)){
    echo 'This is a connection.';
} else {
    echo 'This is not a connection.';
}
```

**or**

```php
$str = 'http://example.com/';
if($this->is_url($str)){
    echo 'This is a connection.';
} else {
    echo 'This is not a connection.';
}
```

**or**

```php
$str = 'http://www.example.com/';
if($this->is_url($str)){
    echo 'This is a connection.';
} else {
    echo 'This is not a connection.';
}
```


---


## is_http()

It is used to check whether the data in the `string` structure shared with it is written in the HTTP syntax.

##### Example

```php
$url = 'http://www.google.com/';
if($this->is_http($url)){
    echo 'This is a HTTP connection.';
} else {
    echo 'This is not a HTTP connection.';
}
```

---


## is_https()

It is used to check whether the data in the `string` structure shared with it is written in HTTPS syntax. If the data in question has an HTTPS syntax, `true` value is returned, otherwise `false` value is returned.

##### Example

```php
$url = 'http://www.google.com/';
if($this->is_http($url)){
    echo 'This is a HTTP connection.';
} else {
    echo 'This is not a HTTP connection.';
}
```

    
---

## is_json()

It is used to check whether the `string` type data shared with it is in json format, `$schema` represents the json data. If the data in question has a json syntax, `true` is returned, otherwise `false` is returned.

##### Example

```php
$schema = array(
    'test'=>'ali'
);

if($this->is_json(json_encode($schema))){
    echo 'This is a Json syntax.';
} else {
    echo 'This is not a Json syntax.';
}
```

    
        
---

## is_age()

It is used where age restriction is needed. Subtracts the date of birth shared with it from the current date, if the result is the same as or greater than the specified age, a `true` response is returned, otherwise a `false' response is returned.

It takes 3 parameters and the first two are mandatory. The first parameter is the date parameter specified in the Year-Month-Day syntax, the second is the minimum or maximum age limit parameter, and the third is the parameter that indicates whether the restriction is of a minimum (`min`) or maximum (`max`) type. The 3rd parameter is specified as minimum(`min`) by default.

##### Example

```php
if($this->is_age('1987-03-17', 35)){
    echo 'Age appropriate.';
} else {
    echo 'Age is not suitable.';
}
```

**or**

```php
if($this->is_age('1987-03-17', 32)){
    echo 'Age appropriate.';
} else {
    echo 'Age is not suitable.';
}
```

**or**

```php
if($this->is_age('1987-03-17', 35, 'min')){
    echo 'Age appropriate.';
} else {
    echo 'Age is not suitable.';
}
```

**or**

```php
if($this->is_age('1987-03-17', 32, 'max')){
    echo 'Age appropriate.';
} else {
    echo 'Age is not suitable.';
}
```


        
---
    
## is_iban()

It is used to check if the value shared with it has a valid IBAN number.If the value of an IBAN number has a syntax, the `True` response is returned, and if not, the` false 'response is returned.

##### Example

```php
if($this->is_iban('SE35 500 0000 0549 1000 0003')){
    echo 'This is an IBAN number.';
} else {
    echo 'This is not an IBAN number.';
}
```


---

## is_ipv4()

It is used to check if the value shared with it is in the `ipv4` syntax. If the value is in the `ipv4` syntax, a true response is returned, otherwise a `false' response is returned.

##### Example

```php
echo '<br>';
if($this->is_ipv4('208.111.171.236')){
    echo 'It is an IPV4 address.';
} else {
    echo 'This is not an iPV4 address.';
}
```
        
**or** 


```php
echo'<br>';
if($this->is_ipv4('256.111.171.236')){
    echo 'It is an IPV4 address.';
} else {
    echo 'This is not an iPV4 address.';
}
```


---


## is_ipv6()

It is used to check if the value shared with it is in the `ipv6` syntax. If the value is in the `ipv6` syntax, a true response is returned, otherwise a `false' response is returned.

##### Example

```php
echo '<br>';
if($this->is_ipv6('2001:0db8:85a3:08d3:1319:8a2e:0370:7334')){
    echo 'This is an attachment address.';
} else {
    echo 'This is not an ipv6 address.';
}
```
        
**or**  


```php
echo'<br>';
if($this->is_ipv6('2001:0db8:85a3:08d3:1319:8a2e:0370:7334dsdsd')){
    echo 'This is an attachment address.';
} else {
    echo 'This is not an ipv6 address.';
}
```


---


## is_blood()

It is used to check if the shared value is a blood group, and to check if a blood group is suitable donors for another blood group.

It takes two parameters, the first parameter is mandatory, the second parameter is not compulsory.If only the first parameter is specified, the validity of that blood group is checked.If the second parameter is specified, it is checked whether the second is suitable donor for the first blood group.

If a valid blood type is specified or compatible blood types are specified, a `true` response is returned, otherwise a `false` response is returned.

##### Example


```php
echo '<br>';

if($this->is_blood('0+')){
    echo 'Yes, this is a blood group.';
} else {
    echo 'No, it's not a blood group.';
}
```
    
**or**

```php
echo '<br>';

if($this->is_blood('0+', '0+')){
    echo 'Yes, this is a harmonious blood group.';
} else {
    echo 'No, this is an incompatible blood group.';
}
```


---


## is_latitude()

It is used to check whether the data in the `float`, `int` or `string` structure shared with it is a valid latitude information. If the data shared with it is a valid latitude, a `true` response is returned, otherwise a `false` response is returned.

##### Example

```php
$latitude = 41.008610;
if($this->is_latitude($latitude)){
    echo 'Valid latitude.';
} else {
    echo 'Invalid latitude.';
}
```

---


## is_longitude()

It is used to check whether the data in the `float`, `int` or `string` structure shared with it is a valid longitude information. If the data shared with it is a valid longitude information, a `true` response is returned, otherwise a `false` response is returned.

```php
$longitude = 28.971111;
if($this->is_longitude($longitude)){
    echo 'Valid longitude.';
} else {
    echo 'Invalid longitude.';
}
```


---


## is_coordinate()

It is used to check the validity of the coordinate shared with it. The `float`, `int` or `string` structure takes two parameters, latitude and longitude, and both must be specified.
##### Example

```php
$point1 = array(
    'lat' => 41.008610, 
    'long' => 28.971111
);
    
if($this->is_coordinate($point1['lat'], $point1['long'])){
    echo 'Current coordinate.';
} else {
    echo 'Invalid coordinate.';
}
```
    
**or**

```php
$point2 = array(
    'lat' => 39.925018, 
    'long' => 32.836956
);
        
if($this->is_coordinate($point2['lat'], $point2['long'])){
    echo 'Current coordinate.';
} else {
    echo 'Invalid coordinate.';
}
```


---


## is_distance()

For a coordinate point, it is used to question whether another coordinate point remains in the specified range.

It takes 3 parameters, the first two parameters represents two different coordinates, and the third represents the range of range and distance.

The 3rd parameter is separated into two by a colon `:` sign, the first represents the range and the second represents the distance measurement unit. (for example: `300:m` )

Coordinate data in the first two parameters should be specified as `array`, and the third parameter representing range and range measurement unit should be specified as `string`.

Coordinate information specified as `array` must be specified in the `latitude, longitude` syntax, of type `float`, `string` or `int`.

If there is a distance in range, the `true` response is returned, otherwise the `false` response is returned.

**Information:**

Measurement units and abbreviations are as follows.

* m (Meters)
* km (Kilometer)
* mi (Miles)
* ft (feet)
* yd (Yard)

##### Coordinates

```php
$point1 = array(41.008610,28.971111); 
$point2 = array(39.925018,32.836956); 
```
    
##### Example

```php
if($this->is_distance($point1, $point2, '349:km')){
    echo 'It is in range.';
} else {
    echo 'It is not in range.';
}
```

**or**

```php
if($this->is_distance($point1, $point2, '347:km')){
    echo 'It is in range.';
} else {
    echo 'It is not in range.';
}
```


---

## is_md5()

It is used to check whether the data shared with it is in the cryptographic summary syntax. The data in question must be specified as a string. If the data is an md5, the answer is `true`, otherwise `false` is returned.

##### Example

```php
$str = '123456';

if($this->is_md5($str)){
    echo 'This is an MD5.';
} else {
    echo 'This is not an MD5.';
}
```

**or** 

```php
$str = md5('123456');

if($this->is_md5($str)){
    echo 'This is an MD5.';
} else {
    echo 'This is not an MD5.';
}
```
---

## is_base64()

It is used to check whether the data shared with it is a base64 code. The data in question must be specified as a string. If the data was a base64 encode, the response `true` or `false` is returned.

##### Example

```php
$data = 'In Turkey, about 10,000 plant species grow. About 3,000 of these plant species are endemic to Turkey. With this feature, Turkey has more endemic plant species than all of Europe.';

if($this->is_base64(base64_encode($data))){
    echo 'This is a Baste64 code.';
} else {
    echo 'This is not a Base64 code.';
}

```

**or**

```php
$data = 'In Turkey, about 10,000 plant species grow. About 3,000 of these plant species are endemic to Turkey. With this feature, Turkey has more endemic plant species than all of Europe.';

if($this->is_base64($data)){
    echo 'This is a Baste64 code.';
} else {
    echo 'This is not a Base64 code.';
}
```

---

## is_ssl()

This function is used to query the existence of the project's SSL Certificate. If the SSL connection is enabled, a `true` response is returned, and a `false` response is returned.

##### Example


```php
if($this->is_ssl($str)){
    echo 'There is a SSL connection.';
} else {
    echo 'No SSL connection.';
}
```


---

## is_htmlspecialchars()

This function serves to check whether the data shared with it contains HTML special characters. Data must be specified as `string`. If the HTML contains special characters, the response `true` or `false` is returned.

##### Example

```php
$code = 'merhaba &lt;?=$this-&gt;timestamp;?&gt;';

if($this->is_htmlspecialchars($code)){
    echo 'HTML contains special characters.';
} else {
    echo 'HTML does not contain special characters.';
}
```

---

## is_morse()

This function checks if the data shared with it is a morse code with characters from the method [morsealphabet()](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#morsealphabet) . Data must be specified as `string`. If it is morse code, a `false` response is returned, if not `true`.

##### Example

```php
$data = '-- ..- ... - .- ..-. .- / -.- . -- .- .-.. / .- - .- - ..-- .-. -.- / --.-. ..-- .--.. -.-.. ---.';
if($this->is_morse($data)){
    echo 'Mors code. ( '.$this->morse_decode($data).' )';
} else {
    echo 'It is not a Mors code.';
}
```

**or**

```php
$data = '.';
if(!$this->is_morse($data)){
    echo 'It is not a Mors code.';
}  else {
    echo 'Mors code.( '.$this->morse_decode($data).' )';
}
```

**or**

```php
$data = 'p';
if(!$this->is_morse($data)){
    echo 'It is not a Mors code.';
} else {
    echo 'Mors code. ( '.$this->morse_decode($data).' )';
}
```


---

## is_binary()

It serves to check if the specified parameter has a binary code.

##### Example

```php
$data = '1000001 1101100 1101001 100000 1011001 11000100 10110001 1101100 1101101 1100001 1111010';
if($this->is_binary($data)){
    echo 'It is a binary code.';
} else {
    echo 'It is not a binary code.';
}
```


---

## is_timecode()

It serves to check if the specified parameter has a time code.

##### Example

```php
if($this->is_timecode('59:00:00')){
    echo 'true';
}
```

---

## is_browser()

It is used to check whether the specified browser name is within the specified browser names.It takes two parameters.

If only the first parameter is specified, it is checked whether the specified browser name is one of the supported browser names in the [getBrowser()](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#getbrowser) method.

If both parameters are specified, it is checked whether the first parameter is one of the browser names specified in the second parameter of type `string` or `array`.

Returns `true` if it matches, `false` otherwise. Browser names specified in the second parameter are case sensitive and work by considering supported browser names in the [getBrowser()](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#getbrowser) method .

##### Example

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
It serves to check whether a data of type `string` or `integer` shared with it is a decimal number. Returns `true` if the data in question is a decimal number, otherwise `false`.

##### Example

```php
if($this->is_decimal(1.2)){
    echo '1.2 is a decimal number';
}else{
    echo '1.2 is not a decimal number';
}
```
**or**

```php
if($this->is_decimal('1.2')){
    echo '1.2 is a decimal number';
}else{
    echo '1.2 is not a decimal number';
}
```
**or**

```php
if($this->is_decimal('1')){
    echo '1 decimal number';
}else{
    echo '1 is not a decimal number';
}
```
**or**

```php
if($this->is_decimal(1)){
    echo '1 decimal number';
}else{
    echo '1 is not a decimal number';
}
```

---

## is_isbn()
It serves to check whether a `string` type data shared with it is a valid ISBN number. Returns `true` if the data in question is the ISBN number, `false` if not. In order for the specified data to be evaluated according to the ISBN-13 or ISBN-10 version, the second parameter must be specified as 13 or 10.
##### Example

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

It serves to check whether the specified parameter is in a seo friendly url structure. If the parameter is a seo friendly url, the response is `true` and `false` is returned.

##### Example
```php
$str = $this->permalink('Hello world');
if($this->is_slug($str)){
    echo 'This is a Slug.';
} else {
    echo 'This is not a Slug.';
}
echo '<hr>';
$str = '*';
if($this->is_slug($str)){
    echo 'This is a Slug.';
} else {
    echo 'This is not a Slug.';
}

```

---

## timecodeCompare()

Used to compare two timestamps, returning `false` if the first parameter is less than or equal to the second.

```php
$duration = '02:02:00';
$timecode = '02:02:02';
if($this->timecodeCompare($duration, $timecode)){
    echo 'small or equal';
}else{
    echo 'big';
}
```

---


## is_port()

It is used to check if the specified parameter is a valid port. It takes a parameter and returns a `true` or `false` response.

```php
if($this->is_port('443')){
    echo 'This is a valid port point.';
} else {
    echo 'This is not a valid port.';
}
```

**or**

```php
if($this->is_port('65536')){
    echo 'This is a valid port point.';
} else {
    echo 'This is not a valid port.';
}
```

---

## is_port_open()

It serves to check whether the specified address is accessible. It takes two parameters, the first parameter is mandatory and represents the address, the second parameter is not mandatory and represents the port. If the port is not specified, it is checked whether the specified address is accessible, and the response is returned as `true` or `false`. The address can be used with protocol prefixes such as `ssl://`, `imap://`, `http://` and `https://`.

```php
if($this->is_port_open('172.217.17.142')){
    echo 'There is a link';
} else {
    echo 'No connection';
}
```

**or** 

```php

if($this->is_port_open('172.217.17.142', 21)){
    echo 'There is a link';
} else {
    echo 'No connection';
}

```

---

## fileExists()

It is used to query the accessibility of the specified `string` file path. If the file is accessible, the response is `true`, otherwise `false` is returned.

##### Example

```php
if($this->fileExists('https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png')){
    echo 'There is a file';
} else {
    echo 'No file';
}
```


---

## validate()

It is used to check the compliance of different types of data with the specified rules at once. If there is data that violates the rules and an error message is specified, error messages are defined in the array variable `$this->errors`, if no error message is specified, the string keys of the data are defined in the array variable `$this->errors` and the response `false` is returned. If there is no rule violation, a `true` response is returned.

Exceptionally, if an inappropriate data type is detected in rules that require a special data type, an error message describing this situation is defined in the array variable `$this->errors` and a `false` response is returned, regardless of whether an error message is specified.

To define more than one rule for each key, the rules must be separated with the help of the `|` symbol. The data keys in the parameters must match.

##### Example


```php
//  Veri
$data = array(
    'username'          =>  'aliyilmaz',
    'title'             =>  'Hello World1',
    'email'             =>  'aliyilmaz.work@gmail.com',
    'phone_number'      =>  '05554248988',
    'background_color'  =>  '#ffffff',
    'webpage'           =>  'http://google.com',
    'https_webpage'     =>  'https://google.com',
    'http_webpage'      =>  'http://google.com',
    'json_data'         =>  '{ "name":"John", "age":30, "car":null }',
    'content'           =>  'hello',
    'summary'           =>  'hell',
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
    'language'          =>  'EN',
    'morse_code'        =>  '.- .-.. .-..- / -.-- .. .-.. -- .- --..', // ali yılmaz
    'binary_code'       =>  '1000001 1101100 1101001 100000 1011001 11000100 10110001 1101100 1101101 1100001 1111010', // Ali Yılmaz
    'timecode'          =>  '59:59:59',
    'product_currency'  =>  'USD',
    'product_price'     =>  '10.00',
    'book_isbn'         =>  'ISBN:0-306-40615-2',
    'type'              =>  'countable',
    'post_slug'         =>  'hello-world', // or hello-world
    'server_port'       =>  '65535',
    'client_port'       =>  '172.217.17.142',
    'logo_file'         =>  'https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png',
    'password_md5'      =>  'e10adc3949ba59abbe56e057f20f883e',
    'password_base64'   =>  'YWRtaW5pc3RyYXRvcg=='



);

// Rule
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
    'post_slug'         =>  'slug',
    'server_port'       =>  'port',
    'client_port'       =>  'port_open', // Default 80 It can also take into account the specified ports. port_open:443
    'logo_file'         =>  'fileExists',
    'password_md5'      =>  'md5',
    'password_base64'   =>  'base64'
);


// Message
$message = array(
    'username'=>array(
        'available'=>'This username is not available'
    ),
    'title'=>  array(
        'required'=>'Boş bırakılmamalıdır.',
        'unique'=>'A unique record must be specified.'
    ),
    'email'=>array(
        'email'=>'Geçerli bir e-mail adresi belirtilmelidir.',
        'unique'=>'A unique record must be specified.'
    ),
    'phone_number'=>array(
        'phone'=>'A valid phone number must be specified.'
    ),
    'background_color'=>array(
        'color'=>'A valid color must be specified.'
    ),
    'webpage'=>array(
        'url'=>'A valid URL must be specified.'
    ),
    'https_webpage'=>array(
        'https'=>'A valid HTTPS address must be specified.'
    ),
    'http_webpage'=>array(
        'http'=>'A valid HTTP address must be specified.'
    ),
    'json_data'=>array(
        'json'=>'A valid JSON data must be specified.'
    ),
    'content'=>array(
        'max-char'=>'The maximum character limit should not be exceeded.'
    ),
    'summary'=>array(
        'min-char'=>'The minimum character limit must be specified.',
        'max-char'=>'The maximum character limit should not be exceeded.'
    ),
    'quentity'=>array(
        'min-num'=>'Minimum number must be specified.',
        'max-num'=>'The maximum number should not be exceeded.'
    ),
    'numeric_str'=>array(
        'numeric'=>'Numerical character should be specified.'
    ),
    'birthday'=>array(
        'min-age'=>'A small age of minimum age should be specified.',
        'max-age'=>'A larger age of maximum age should be specified.'
    ),
    'register_date'=>array(
        'date'=>'History in the form of year-month-day should be specified.'
    ),
    'status'=>array(
        'bool'=>'Verification fails.'
    ),
    'ibanNumber'=>array(
        'iban'=>'The IBAN account could not be verified.'
    ),
    'ipv4Address'=>array(
        'ipv4'=>'IPV4 should specify an IP address in the syntax.'
    ),
    'ipv6Address'=>array(
        'ipv6'=>'In the ipv6 syntax, an IP address must be specified.'
    ),
    'bloodGroup'=>array(
        'blood'=>'Blood group should be specified according to the instructions.'
    ),
    'coordinates'=>array(
        'coordinate'=>'A valid coordinate must be specified.'
    ),
    'distances'=>array(
        'distance'=>'The coordinate point in the range should be specified.'
    ),
    'language'=>array(
        'languages'=>'Language selection should be made.'
    ),
    'morse_code'=>array(
        'morse'=>'A valid Morse code must be specified.'
    ),
    'binary_code'=>array(
        'binary'=>'A valid binary code must be specified.'
    ),
    'timecode'=>array(
        'timecode'=>'A valid time code must be specified.'
    ),
    'product_currency'=>array(
        'currencies'=>'A valid currency code must be specified.'
    ),
    'product_price'=>array(
        'decimal'=>'A valid decimal number should be specified.'
    ),
    'book_isbn'=>array(
        'isbn'=>'A valid ISBN number must be specified.'
    ),
    'type'=>array(
        'in'=>'A valid type must be specified.'
    ),
    'post_slug'=>array(
        'slug'=>'A valid Slug must be specified'
    ),
    'server_port'=>array(
        'port'=>'The current port number must be specified.'
    ),
    'client_port'=>array(
        'port_open'=>'Information of an accessible connection must be indicated.'
    ),
    'logo_file'=>array(
        'fileExists'=>'A accessible file path must be specified.'
    ),
    'password_md5'=>array(
        'md5'=>'This parameter is not in the MD5 syntax.'
    ),
    'password_base64'=>array(
        'base64'=>'This parameter is not in the Base64 syntax.'
    )

);

if($this->validate($rule, $data, $message)){
    echo 'Everything is fine!';
} else {
    $this->print_pre($this->errors);

}
```


#### Rules

##### min-num

The minimum specifying is used to express the desired amount of numbers.It requires an extra parameter and this parameter must be an integer value, writing this value between nail signs or as it is does not prevent this rule from working correctly.

```php
min-num:5
```

##### max-num

Maximum specifying is used to express the desired amount of numbers.It requires an extra parameter and this parameter must be an integer value, writing this value between nail signs or as it is does not prevent this rule from working correctly.

```php
max-num:10
```

##### min-char

It is used to indicate that the character length of the data should be as much as the number specified.It requires an extra parameter and this parameter must be an integer value, writing this value between nail signs or as it is does not prevent this rule from working correctly.

```php
min-char:200
```

##### max-char

It is used to indicate that the character length of the data should be up to the maximum number.It requires an extra parameter and this parameter must be an integer value, writing this value between nail signs or as it is does not prevent this rule from working correctly.

```php
max-char:500
```

##### email

It is used to express that the data must be an e-mail address. It can be used by typing `email` as it does not need an extra parameter.

```php
email
```

##### required

It is used to express that it is mandatory to specify data. It can be used by typing `required` as it does not need any extra parameter.

```php
required
```
    
##### phone

It is used to express that the data must be a phone number. It can be used by typing `phone` as it does not need an extra parameter.
 
```php
phone
```

##### date 

It is used to express that the data must be a valid time information. When used without specifying an extra parameter, it checks the data by referring to the `Y-m-d` format, if it is desired to check the time information in the specified format, the acceptable time format should be specified.

```php
// 2020-02-18
date:Y-m-d  
```

**or**

```php
// 2020-02-18 14
date:Y-m-d H 
```
**or**

```php
// 2020-02-18 14:34
date:Y-m-d H:i 
```

**or**

```php
// 2020-02-18 14:34:22
date:Y-m-d H:i:s 
```

like.

##### json

It is used to express that the data format is in JSON syntax. It can be used by typing `json` as it does not need an extra parameter.

```php
json
```

##### color

It is used to express that the specified value must be HEX, RGB, RGBA, HSL, HSLA or one of 148 safe colors. It can be used by typing `color` as it does not need an extra parameter.

```php
color
```

##### url

It is used to express that the specified parameter must be a valid connection. It can be used by typing `url` as it does not need an extra parameter.

```php
url
```
    

##### https

It is used to express that the specified parameter should be an SSL connection. It can be used by typing `https` as it does not need an extra parameter.

```php
https
```

##### http

It is used to express that the specified parameter should be an HTTP connection. It can be used by typing `http` as it does not need an extra parameter.


```php
http
```

##### numeric

It is used to express that the specified data must be digits. It can be used by typing `numeric` as it does not need an extra parameter.

```php
numeric
```

##### min-age

It is used to express that the person with the specified date of birth must be at or above the specified age. It needs an extra parameter and this parameter must be an integer value, writing this value in quotation marks or as it does not prevent this rule from working correctly.

```php
min-age:18
```

##### max-age

It is used to express that the person with the specified date of birth must be at or below the specified age. It needs an extra parameter and this parameter must be an integer value, writing this value in quotation marks or as it does not prevent this rule from working correctly.

```php
max-age:18
```

##### unique

States that a data that is not in the database table should be specified.



```php
unique:users
```

**or**


```php
unique:posts
```

##### available

States that a data in the database table should be specified.



```php
available:users
```

**or**


```php
available:users:username
```


##### knownunique

It is used to indicate that the specified parameter must be a parameter of a record in the database table or a parameter that does not match any record other than itself. If only the 3rd parameter is specified, it is checked in the column with the same name as the data switch, and if the 4th parameter is specified, the 3rd parameter column name is perceived as the 4th parameter as value.



```php
knownunique:users:aliyilmaz
```

**or**


```php
knownunique:users:username:aliyilmaz
```



##### bool

It is used to express that the parameter must be of boolean type. When used without sending an extra parameter, it checks for valid boolean data. If an extra parameter is sent, it checks whether this parameter is the same as the boolean type. (Data can be sent in any of the following syntax: `true`, `false`, ``true'`, ``false'`, `0`, `1`, `'0'` or `'1'`.

```php
bool
```
    
**or**

```php
bool:true
```
    
**or**

```php
bool:false
```
    
**or**

```php
bool:1
```
    
**or**

```php
bool:0
```
    
##### iban

It is used to express that the data must be an IBAN number. It can be used by typing `iban` as it does not need an extra parameter.

```php
iban
```

##### ipv4

It is used to express that the data must be in the `ipv4` syntax. It can be used by typing `ipv4` as it does not need an extra parameter.

```php
ipv4
```

##### ipv6

It is used to express that the data must be in the `ipv6` syntax. It can be used by typing `ipv6` as it does not need an extra parameter.

```php
ipv6
```


##### blood

It is used to indicate that the specified parameter should be a valid blood group.If an extra blood group parameter is specified, it is checked whether the extra parameter is suitable for the first parameter.

```php
blood
```
    
**or**

```php
blood:0+ 
```


##### coordinate

It is used to express that the comma-separated Latitude and Longitude parameter must point to a valid coordinate point. It can be used by typing `coordinate` as it does not need an extra parameter.

```php
coordinate
```


##### distance

It is used to express that the distance between two different coordinate points separated by the `@` sign should be as much as the amount specified in the extra parameter. A space must be left between the number and the unit of measure. For more information on allowed units of measure, you can review the [distanceMeter](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#distancemeter) method.

```php
distance:349 km
```


##### languages

It is used to express that the data should be one of the language abbreviations found in the `languages()` method. It can be used by typing `languages` as it does not need an extra parameter.

```php
languages
```


##### morse

It is used to express that the data must be valid morse code. It can be used by typing `morse` as it does not need an extra parameter.

```php
morse
```


##### binary

It is used to express that the data must be a valid Binary code. It can be used by typing `binary` as it does not need an extra parameter.

```php
binary
```


##### timecode

It is used to express that the data must be a valid timecode. It can be used by typing `timecode` as it does not need an extra parameter.

```php
timecode
```


##### currencies

Used to express that the data must be a valid currency code. It can be used by typing `currencies` as it doesn't need any extra parameter.

```php
currencies
```

##### decimal

It is used to express that the data must be a valid decimal number. It can be used by typing `decimal` as it does not need an extra parameter.

```php
decimal
```

##### isbn

It is used to express that the data must be a valid ISBN number. It can be used by typing `isbn` as it does not need an extra parameter.

```php
isbn
```

##### in
It is used to express that the specified data should be in a list. If multiple list items are to be specified, they must be separated by commas.

```php
in:countable
```
**or** 

```php
in:ponderable,countable,measurable
```

##### slug

It is used to express that the data must be a valid slug. It can be used by typing `slug` as it does not need an extra parameter.

```php
slug
```


##### port

It is used to express that the data must be a valid port. It can be used by typing `port` as it does not need an extra parameter.

```php
port
```

##### port_open

It is used to express that the address and port must be valid connection information. If no extra parameter is specified, it checks whether the specified address is accessible or not via the `80` port, if the access of the specified port is to be controlled, it should be specified as a parameter.

```php
port_open
```

**or**

```php
port_open:443
```

---

##### fileExists
It is used to indicate that the specified file path should be accessible.It can be used by typing `fileExists` because it does not require an extra parameter.

```php
fileExists
```

---

##### md5
Used to specify that the specified parameter must be in the md5 syntax. It can be used by typing `md5` as it does not need an extra parameter.

```php
md5
```
---

##### base64
Used to specify that the specified parameter must be in base64 syntax. It can be used by typing `base64` as it does not need an extra parameter.

```php
base64
```
---

## policyMaker()

This function is used to create the access regulation files specific to server software that meets the routes (.htaccess, web.config).

Once the `/` route is used, the function is triggered. `Apache`, `Microsoft IIS`, `LiteSpeed` and `Nginx` server software are supported. This function is enabled by running it inside the `route()` method. Only for `Nginx` the following steps should be applied, no intervention is required for other server software.

**For Nginx:**
Add the following rules to the `server {}` container in the .conf file that affects the project and restart the server.

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

**Info:** You need to enter the directories whose access you will restrict in the parenthesis in `location ~ /(app)/ ` with **|** separator like `(app|special)`.

---

## print_pre()

This function is used to display the data sent in `array` or `json` format on the screen in a readable way.

##### Example

```php
// ARRAY
$data = array(
        'username'=>'aliyilmaz',
        'password'=>md5(123456)
);
$this->print_pre($data);
```

**or**

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

This function is used to sort datasets held in Array or JSON format. It takes 3 parameters, only the first parameter must be specified. The first parameter is for the dataset specified as type `ARRAY` or `JSON`, the 2nd parameter is for specifying one of the sorting types `asc`, `desc`, `ASC` or `DESC` with data type `string`. The third parameter is for sorting keyed datasets by key values. By default the 2nd parameter has the value `ASC`.

##### Example


```php
// ARRAY
echo '<h1>ARRAY</h1>';
echo '<hr>';

// Making ranking in 1 stage series
$data = array(
    2021,
    2020,
    2019
);
echo '<h4>2021 Top</h4>';
$this->print_pre($this->arraySort($data, 'DESC'));


// Sorting by specifying the key in 2 -stage series
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
echo '<h4>September above</h4>';
$this->print_pre($this->arraySort($data, 'ASC', 'age'));


// Sorting without specifying a key in 2 -stage series
// Refers to the first key value
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
echo '<h4>no one on top</h4>';
$this->print_pre($this->arraySort($data, 'ASC'));

// JSON
echo '<h1>JSON</h1>';
echo '<hr>';

// Making ranking in 1 stage series
$data = json_encode(array(
    2021,
    2020,
    2019
));
echo '<h4>2021 Top</h4>';
$this->print_pre($this->arraySort($data, 'DESC'));


// Sorting by specifying the key in 2 -stage series
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
echo '<h4>September above</h4>';
$this->print_pre($this->arraySort($data, 'ASC', 'age'));


// Sorting without specifying a key in 2 -stage series
// Refers to the first key value
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
echo '<h4>no one on top</h4>';
$this->print_pre($this->arraySort($data, 'ASC'));
```

---

## info()

This function is used to access information about a path that contains a file. Both parameters it takes must be specified as `string`. The path `$str` represents the information type parameter `$type`.

#### Parameters

-   dirname
-   basename
-   extension
-   filename

##### dirname: Learning the directory of the file

```php
$str  = $this->post['logo']['name'];
$type = 'dirname';

echo $this->info($str, $type);
```

##### basename: Learning the name of the file with the extension

```php
$str  = $this->post['logo']['name'];
$type = 'basename';

echo $this->info($str, $type);
```

##### extension: Learning the file extension alone

```php
$str  = $this->post['logo']['name'];
$type = 'extension';

echo $this->info($str, $type);
```

##### filename: Learning the name of the file alone

```php
$str  = $this->post['logo']['name'];
$type = 'filename';

echo $this->info($str, $type);
```

---

## request()

Used to make `$_GET`, `$_POST`, `$_FILES` and `JSON POST` requests secure and organized, Data is accessed from array variable `$this->post`, in **Mind.php** file It is activated by running it in the `__construct()` method.

##### using type="text"

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
##### Using type="text" and type="file" (File)

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

##### Using type="text" and type="file" (Files)

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

This method is used to disable exploit codes such as `html` and special characters, `sql_injection`, `xss`. It secures and returns the data sent as `string` with the help of `htmlspecialchars` method. The `htmlspecialchars_decode` method should be used to convert the data back to its original state.


##### Example

```php
$content = "%&%()' OR 1=1 karakterleri etkisizleştirilmiştir.";
echo $this->filter($content);
```

**or**

```php
$content = "<script>alert('There is an xss deficit'); </script>";
echo $this->filter($content);
```


---

## firewall()

This function prevents user agent empty, clickjacking, XSS, MIME Sniffing, CSRF behavior.Again, this method allows to manage access to the specified operating systems, browser and ip addresses.Since all sub -settings are defined by default, there is no obligation to specify a parameter.The method is activated by operating in the __Construct () method.

#### noiframe

Used to prevent the project from being used via iframe, must be specified as type `boolean`. `true` is specified by default.


#### nosniff

It is used to prevent the browser of the user viewing the project from analyzing the project content, must be specified as `boolean`. `true` is specified by default.


#### noxss

Mind disables XSS codes, although this sub-setting is used to stop attempts to inject code into project addressing, must be specified as `boolean`. `true` is specified by default.

#### ssl

It is used to transmit the sessions of an SSL-enabled project to the user over SSL, thus ensuring the security of the users' username & password information, as well as critical information such as credit card, etc. By default `false` is specified. If enabled and the non-SSL page of the project is requested to be visited, the access request is terminated.

#### hsts

It is used to force the data traffic of an SSL-enabled project to be transmitted over SSL, so that the communication between the user and the server is protected by SSL. By default `false` is specified. If enabled and `ssl` is not enabled, the access request to the non-SSL page of the project is terminated.


#### csrf

It blocks unauthorized HTTP POST requests, it is set to `true` by default. It is possible to specify `token` name and arbitrary parameter length, by default the token name is `csrf_token` and parameter length is `200`.

As long as this sub-setting is active, it will search for the `csrf_token` parameter in any form sent, and if it cannot find it, it will stop the request. To add the token input to the form, it is necessary to specify this `<?=$_SESSION['csrf']['input'];?>` parameter somewhere in the form.

If it is necessary to submit a form with javascript, the token parameter can be used in this way in javascript codes `<?=$_SESSION['csrf']['token'];?>`, the key name to which the token is moved is `<?=$_SESSION[ Can be used with 'csrf']['name'];?>`.

#### allow

It is the part where the operating systems, internet browsers and ip addresses that are allowed to access the project and the folders that are allowed to be accessed are specified. Values can be sent in `string` or `array` type.


#### deny

It is the part where the operating systems, internet browsers and ip addresses that are not allowed to access the project and the folders that are not allowed to be accessed are specified, values can be sent in `string` or `array` type.

##### Example

```php
$conf = array(
    'db'=>[
        'drive'     =>  'mysql', // mysql, sqlite, sqlsrv
        'host'      =>  'localhost', // for sqlsrv: www.example.com\\MSSQLSERVER,'.(int)1433
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

echo 'It is open to remote access';
```

#### lifetime

It serves to manage the publication time of the project. It has 3 different usage patterns. These usage patterns are detailed below.

- Specify a start date
- specify an expiration date
- Specify Start and End date

**Specify a start date**
It is a preferred usage for the project to be published after the specified time, the message to be displayed during the period when the project is not live can be specified, by default the message `You must wait for the specified time to use your access right.` (You must wait for the specified time to use your access right.) message is displayed.

###### Example

```php
$conf = array(

    'firewall'  =>  array(
        'lifetime'=>[
            'start'=>'2022-09-17 20:31:51',
            'end'=>'2022-09-17 20:57:30',
            'message' => 'You must wait for the specified time to exercise your access.'
        ]

    )
);

$Mind = new Mind($conf);

```

**Specifying the Date of End**
It is a preferred usage method for the project to be unpublished after the specified time, the message to be displayed during the period when the project is not live can be specified, by default the message `The deadline for your access has expired.` is displayed.

###### Example

```php
$conf = array(

    'firewall'  =>  array(
        'lifetime'=>[
            'end'=>'2022-09-17 20:31:51',
            'message'=>'The deadline for your access is expired.'
        ]

    )
);

$Mind = new Mind($conf);

```

**Specifying the start and termination date**

It is a preferred usage for the project to be unpublished outside the specified time interval, the message that is desired to appear during the period when the project is not live can be specified, by default the message `Your access has expired.` (Your access right has expired.) is displayed.

###### Example

```php
$conf = array(

    'firewall'  =>  array(
       'start'=>'2022-09-17 20:31:51',
        'end'=>'2022-09-17 20:57:30',
        'message' => 'The right of access to you has expired.'
    )
);

$Mind = new Mind($conf);

```



**Information:** 

Each HTTP POST request creates a new `token` parameter. `allow` and `deny` can be used together, `deny` rules are taken into account in overlapping parts.

Supported operating system names can be used in the method [getOS()](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#getos) in the `platform` section. In the `browser` section, the Internet browser names supported in the method [getBrowser()](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#getbrowser) are supported. In the `ip` part, ip addresses in the `ipv4` syntax can be used. Unless otherwise specified in the `folder` section, access to the `public` folder is granted.

In order for the `folder` setting to be valid on `nginx` servers, you must use [policyMaker()](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#policyMaker) You can use the information note.



---

## redirect()

It is used to redirect to the specified address directly or after a certain period of time. If left blank, it redirects to the folder where the **Mind.php** file is located. It takes two parameters, the first parameter is the address to be redirected and must be specified as `string`, the second parameter is the information after how many seconds to redirect and must be specified as `integer`. The third parameter is the element name information to which the remaining time to the routing will be assigned. Since this parameter is sent to javascript's `querySelectorAll` method, it must be specified with reference to javascript's approach to accessing the element.

##### Example

```php
$this->redirect();
```

**or**

```php
$this->redirect('contact');
```

**or**

```php
$this->redirect('https://www.google.com');
```

**or**

```php
$this->redirect('', 5);
```
    
**or**

```php
$this->redirect('contact', 5);
```

**or**

```php
$this->redirect('https://www.google.com', 5);
```

**or**

    
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

It is used to transform the data shared with it into a search engine friendly link structure. It can take two parameters. The first parameter contains the data to be converted into a link structure as `string`, and the second parameter contains the following settings. The second parameter is optional and does not have to be specified.

##### Example

```php
$str = 'Hello world';
echo $this->permalink($str);
```


### Bracket (delimiter)
 By default, the spaces in the data in the `string` structure are separated with the help of hyphen `-`. If it is desired to contain another parameter instead of the dash `-`, the `delimiter` feature can be used.
 
##### Example

```php
$str = 'Hello world';
$option = array(
    'delimiter' => '_'
);
echo $this->permalink($str, $option);
```

### Limit (limit)
 By default, the data in the `string` structure is returned by making it `SEO` friendly. If it is desired to be returned in a certain number of characters, the `limit` feature can be used.
 
##### Example
 
```php
$str = 'Hello world';
$option = array(
    'limit'=>'3'
);
echo $this->permalink($str, $option);
```

 **or** 

```php
$str = 'Hello world';
$option = array(
    'limit'=>3
);
echo $this->permalink($str, $option);
```

### Letter size (lowercase)
By default, the data in the `string` structure is converted to all lowercase letters, if you want the letters to stay as they are written, the `lowercase` feature can be used.

##### Example

```php
$str = 'Hello world';
$option = array(
    'lowercase'=>false
);
echo $this->permalink($str, $option); 
```

### Vocabulary change (replacements)
It is possible to change the words specified in the data in the `string` structure,

##### Example

```php
$str = 'Hello world';
$option = array(
    'replacements'=>array(
        'Merhaba'=>'hello', 
        'dünya'=>'world'
    )
);
echo $this->permalink($str, $option);
```
    
### Character support(transliterate)
Letters from different alphabets are replaced by their `SEO` friendly counterparts by default, if they are to be written as is, the `false` parameter must be specified.

##### Example

```php
$str = 'Hello world';
$option = array(
    'transliterate'=>false
);
echo $this->permalink($str, $option);
```

### Creating unique connection for registration to the database

The data in the `string` structure is searched in the specified column of the database table, if one or more is found, the total number of them is determined.

This sum obtained is added to the end of the data in the `string` structure with the help of a loop, with the help of the `delimiter` separator, and the existence of the database table is checked one by one.
 
If the connection candidate in question does not exist in the database table, that state is returned.

If there is no suitable numbering for the connection candidate as a result of the presence check performed on all findings, the link is returned by updating the finding total **1**.

By default, hyphen **-** value is defined for `delimiter` parameter, **link** value is defined for `linkColumn` parameter and **title** value is defined for `titleColumn` parameter.

##### Example

```php
$str = 'Hello world';
$option = array(
    'unique' => array(
        'tableName' => 'pages'
    )
);
echo $this->permalink($str, $option);
```

**or** 

```php
$str = 'Hello world';
$option = array(
    'unique' => array(
        'tableName' => 'pages',
        'delimiter' => '_'
    )
);
echo $this->permalink($str, $option);
```
    
    
**or** 

```php
$str = 'Hello world';
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

### Create unique file name for registration to the directory
Used to create unique filename, both parameters must be specified. The directory path must be written in the `./` parameter, which is the value of the `directory` expression.


##### Example

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

The time stamp is used to find out how long the stamp is in the past or in the future.

**Usable parameters**

* y ( Year )
* m ( ay )
* w ( Week )
* d ( Day )
* h ( Moment )
* i ( Minutes )
* s ( Second )
* a ( Before )
* l ( Then )
* p ( Plural jewelry )
* j ( Now )
* f ( Whether the full time explanation is visible )

##### Example

```php
$datetime = $this->timestamp;
echo $this->timeForPeople($datetime); 
```

**or**

```php
$datetime = '2020-04-19 11:38:43';
echo $this->timeForPeople($datetime); 
```

**or**

```php
echo $this->timeForPeople('2020-04-19 11:38:43', ['f'=>true]);
```

**or**

```php
echo $this->timeForPeople('2010-10-20');
```

**or**

```php
echo $this->timeForPeople('2010-10-20', ['f'=>true]);
```

**or**

```php
echo $this->timeForPeople('@1598867187');
```

**or**

```php
echo $this->timeForPeople('@1598867187', ['f'=>true]);
```

**or**

```php
$options = array(
    'y' => 'Year',
    'm' => 'ay',
    'w' => 'Week',
    'd' => 'Day',
    'h' => 'Moment',
    'i' => 'Minutes',
    's' => 'Second',
    'l' => 'Then',
    'a' => 'Before'
);

$datetime = '2020-04-19 11:38:43';
echo $this->timeForPeople($datetime, $options);
```

**or**

```php
$options = array(
    'y' => 'Year',
    'm' => 'ay',
    'w' => 'Week',
    'd' => 'Day',
    'h' => 'Moment',
    'i' => 'Minutes',
    's' => 'Second',
    'a' => 'Before',
    'l' => 'Then',
    'p' => '',
    'f' => true 
);

$datetime = '2020-04-19 11:38:43';
echo $this->timeForPeople($datetime, $options);
```

---

## timezones()

This function provides a string of zone codes that can be used in the preferred `date_default_timezone_set()` function to make the timestamp accurate. For more information, see [List of Supported Timezones](https://secure.php.net/manual/en/timezones.php).
##### Example


```php
$this->print_pre($this->timezones());
```

---

## languages()

This function presents the universal and local names and abbreviations of 182 languages in a string. For more information, you can check the [Stackoverflow](https://stackoverflow.com/a/4900304) page.

##### Example


```php
$this->print_pre($this->languages());
```

---

## currencies()

This function presents 162 currency names and abbreviations in a string. You can check [Github Gist](https://gist.github.com/champsupertramp/95493faa7ba12b61bf6e#gistcomment-2085024) for more information.

##### Example


```php
$this->print_pre($this->currencies());
```

---

## morsealphabet()

This function serves to return the MorS alphabet of the letters specified in the default or the special codes sent in the second parameter in a series of types.

##### Example


```php
$this->print_pre($this->morsealphabet());
```

**or**


```php
$morseDictionary = array(
    'c' => '.-', '(' => '-...', 'a' => '-.-.', 'ç' => '-.-..', 'd' => '-..', 'e' => '.', 'f' => '..-.', 'g' => '--.', 'ğ' => '--.-.', 'h' => '....', 'ı' => '..', 'i' => '.-..-', 'j' => '.---', 'k' => '-.-', 'l' => '.-..', 'm' => '--', 'n' => '-.', 'o' => '---', 'ö' => '---.', 'p' => '.--.', 'q' => '--.-', 'r' => '.-.', 's' => '...', 'ş' => '.--..', 't' => '-', 'u' => '..-', 'ü' => '..--', 'v' => '...-', 'w' => '.--', 'x' => '-..-', 'y' => '-.--', 'z' => '--..', '0' => '-----', '1' => '.----', '2' => '..---', '3' => '...--', '4' => '....-', '5' => '.....',
    '6' => '-....','7' => '--...','8' => '---..','9' => '----.','.' => '.-.-.-',',' => '--..--','?' => '..--..','\'' => '.----.','!'=> '-.-.--','/'=> '-..-.','b' => '-.--.',')' => '-.--.-','&' => '.-...',':' => '---...',';' => '-.-.-.','=' => '-...-','+' => '.-.-.','-' => '-....-','_' => '..--.-','"' => '.-..-.','$' => '...-..-',
    '@' => '.--.-.','¿' => '..-.-','¡' => '--...-',' ' => '/'
);
$this->print_pre($this->morsealphabet($morseDictionary));
```


---

## getDateLib()

(`english`, `french`, `german`, `turkish`, `azerbaijani`, `kazakh`, `russian`, `chinese`, `arabic`, `greek`, `japanese`, `armenian`, ` ukrainian`, `czech`, `polish`, `latvian`, `romanian`, `italian`, `spanish`, `portuguese`) contains a time library that supports a total of 20 languages.

The history shared with him;


- By looking at history, it can bring the shelf of the language in the time library.
```php
// Array
// (
//     [month_names] => ocak|şubat|mart|nisan|mayıs|haziran|temmuz|ağustos|eylül|ekim|kasım|aralık
//     [abbreviated_month_names] => oca|şub|mar|nis|may|haz|tem|ağu|eyl|eki|kas|ara
//     [days_of_week] => pazartesi|salı|çarşamba|perşembe|cuma|cumartesi|pazar
//     [date_words] => bugün|dün|yarın
//     [date_format] => d.m.Y
//     [locale] => tr_TR
// )
$date_string = '28 Nisan 2023';
$this->print_pre($this->getDateLib($date_string));
```

**or**

```php
// Array
// (
//     [month_names] => ocak|şubat|mart|nisan|mayıs|haziran|temmuz|ağustos|eylül|ekim|kasım|aralık
//     [abbreviated_month_names] => oca|şub|mar|nis|may|haz|tem|ağu|eyl|eki|kas|ara
//     [days_of_week] => pazartesi|salı|çarşamba|perşembe|cuma|cumartesi|pazar
//     [date_words] => bugün|dün|yarın
//     [date_format] => d.m.Y
//     [locale] => tr_TR
// )
$date_string = '28 Mayıs 2023';
$this->print_pre($this->getDateLib($date_string));
```

- Can determine which language is written.
```php
$date_string = '28 Nisan 2023';
echo $this->getDateLib($date_string, 'locale'); // tr_TR
```

- It can return the shelf of the specified region code (`ro_RO`) located in the time library. (When the first parameter is the date, the second parameter is the language code.)
```php
// Array
// (
//     [month_names] => ianuarie|februarie|martie|aprilie|mai|iunie|iulie|august|septembrie|octombrie|noiembrie|decembrie
//     [abbreviated_month_names] => ian|feb|mar|apr|mai|iun|iul|aug|sep|oct|nov|dec
//     [days_of_week] => luni|marți|miercuri|joi|vineri|sâmbătă|duminică
//     [date_words] => azi|ieri|maine
//     [date_format] => d.m.Y
//     [locale] => ro_RO
// )
$this->print_pre($this->getDateLib(null, 'ro_RO'));
```

- Can return the specified shelf item (`month_names`, `abbreviated_month_names`, `days_of_week`, `date_words`, `date_format`, `locale`). (When first parameter is `null`, second parameter is language code.)
```php
// ocak|şubat|mart|nisan|mayıs|haziran|temmuz|ağustos|eylül|ekim|kasım|aralık
$date_string = '28 Nisan 2023';
$this->print_pre($this->getDateLib($date_string, 'month_names'));
```

- It can return the inventory of the time library. (When run without parameters.)
```php
// Array
// (
//     [english] => Array
//         (
//             [month_names] => january|february|march|april|may|june|july|august|september|october|november|december
//             [abbreviated_month_names] => jan|feb|mar|apr|may|jun|jul|aug|sep|oct|nov|dec
//             [days_of_week] => monday|tuesday|wednesday|thursday|friday|saturday|sunday
//             [date_words] => today|yesterday|tomorrow
//             [date_format] => m/d/Y
//             [locale] => en_US
//         )

//     [french] => Array
//         (
//             [month_names] => janvier|février|mars|avril|mai|juin|juillet|août|septembre|octobre|novembre|décembre
//             [abbreviated_month_names] => janv|févr|mars|avr|mai|juin|juil|août|sept|oct|nov|déc
//             [days_of_week] => lundi|mardi|mercredi|jeudi|vendredi|samedi|dimanche
//             [date_words] => aujourd'hui|hier|demain
//             [date_format] => d/m/Y
//             [locale] => fr_FR
//         )

//     [german] => Array
//         (
//             [month_names] => januar|februar|märz|april|mai|juni|juli|august|september|oktober|november|dezember
//             [abbreviated_month_names] => jan|feb|mär|apr|mai|jun|jul|aug|sep|okt|nov|dez
//             [days_of_week] => montag|dienstag|mittwoch|donnerstag|freitag|samstag|sonntag
//             [date_words] => heute|gestern|morgen
//             [date_format] => d.m.Y
//             [locale] => de_DE
//         )

//     [turkish] => Array
//         (
//             [month_names] => ocak|şubat|mart|nisan|mayıs|haziran|temmuz|ağustos|eylül|ekim|kasım|aralık
//             [abbreviated_month_names] => oca|şub|mar|nis|may|haz|tem|ağu|eyl|eki|kas|ara
//             [days_of_week] => pazartesi|salı|çarşamba|perşembe|cuma|cumartesi|pazar
//             [date_words] => bugün|dün|yarın
//             [date_format] => d.m.Y
//             [locale] => tr_TR
//         )

//     [azerbaijani] => Array
//         (
//             [month_names] => yanvar|fevral|mart|aprel|may|iyun|iyul|avqust|sentyabr|oktyabr|noyabr|dekabr
//             [abbreviated_month_names] => yan|fev|mar|apr|may|iyn|iyl|avq|sen|okt|noy|dek
//             [days_of_week] => bazar ertəsi|çərşənbə axşamı|çərşənbə|cümə axşamı|cümə|şənbə|bazar
//             [date_words] => bu gün|dünən|sabah
//             [date_format] => m/d/Y
//             [locale] => az_AZ
//         )

//     [kazakh] => Array
//         (
//             [month_names] => қаңтар|ақпан|наурыз|сәуір|мамыр|маусым|шілде|тамыз|қыркүйек|қазан|қараша|желтоқсан
//             [abbreviated_month_names] => қаң|ақп|нау|сәу|мам|мау|шіл|там|қыр|қаз|қар|желт
//             [days_of_week] => дүйсенбі|сейсенбі|сәрсенбі|бейсенбі|жұма|сенбі|жексенбі
//             [date_words] => бүгін|кеңес|ертең|таңертең
//             [date_format] => d.m.Y
//             [locale] => kk_KZ
//         )

//     [russian] => Array
//         (
//             [month_names] => январь|февраль|март|апрель|май|июнь|июль|август|сентябрь|октябрь|ноябрь|декабрь
//             [abbreviated_month_names] => янв|фев|мар|апр|май|июн|июл|авг|сен|окт|ноя|дек
//             [days_of_week] => понедельник|вторник|среда|четверг|пятница|суббота|воскресенье
//             [date_words] => сегодня|вчера|завтра
//             [date_format] => d.m.Y
//             [locale] => ru_RU
//         )

//     [chinese] => Array
//         (
//             [month_names] => 一月|二月|三月|四月|五月|六月|七月|八月|九月|十月|十一月|十二月
//             [abbreviated_month_names] => 1月|2月|3月|4月|5月|6月|7月|8月|9月|10月|11月|12月
//             [days_of_week] => 星期一|星期二|星期三|星期四|星期五|星期六|星期日
//             [date_words] => 今天|昨天|明天
//             [date_format] => Y年m月d日
//             [locale] => zh_CN
//         )

//     [arabic] => Array
//         (
//             [month_names] => كانون الثاني|شباط|آذار|نيسان|أيار|حزيران|تموز|آب|أيلول|تشرين الأول|تشرين الثاني|كانون الأول
//             [abbreviated_month_names] => كانون2|شباط|آذار|نيسان|أيار|حزيران|تموز|آب|أيلول|تشرين1|تشرين2|كانون1
//             [days_of_week] => الإثنين|الثلاثاء|الأربعاء|الخميس|الجمعة|السبت|الأحد
//             [date_words] => اليوم|أمس|غداً
//             [date_format] => d/m/Y
//             [locale] => ar_SA
//         )

//     [greek] => Array
//         (
//             [month_names] => Ιανουάριος|Φεβρουάριος|Μάρτιος|Απρίλιος|Μάιος|Ιούνιος|Ιούλιος|Αύγουστος|Σεπτέμβριος|Οκτώβριος|Νοέμβριος|Δεκέμβριος
//             [abbreviated_month_names] => Ιαν|Φεβ|Μάρ|Απρ|Μαΐ|Ιουν|Ιουλ|Αυγ|Σεπ|Οκτ|Νοε|Δεκ
//             [days_of_week] => Δευτέρα|Τρίτη|Τετάρτη|Πέμπτη|Παρασκευή|Σάββατο|Κυριακή
//             [date_words] => σήμερα|χθες|αύριο
//             [date_format] => d/m/Y
//             [locale] => el_GR
//         )

//     [japanese] => Array
//         (
//             [month_names] => 睦月|如月|弥生|卯月|皐月|水無月|文月|葉月|長月|神無月|霜月|師走
//             [abbreviated_month_names] => 睦月|如月|弥生|卯月|皐月|水無月|文月|葉月|長月|神無月|霜月|師走
//             [days_of_week] => 月曜日|火曜日|水曜日|木曜日|金曜日|土曜日|日曜日
//             [date_words] => 今日|昨日|明日
//             [date_format] => Y/m/d
//             [locale] => ja_JP
//         )

//     [armenian] => Array
//         (
//             [month_names] => հունվար|փետրվար|մարտ|ապրիլ|մայիս|հունիս|հուլիս|օգոստոս|սեպտեմբեր|հոկտեմբեր|նոյեմբեր|դեկտեմբեր
//             [abbreviated_month_names] => հուն|փետ|մար|ապր|մայ|հուն|հուլ|օգս|սեպ|հոկ|նոյ|դեկ
//             [days_of_week] => երկուշաբթի|երեքշաբթի|չորեքշաբթի|հինգշաբթի|ուրբաթ|շաբաթ|կիրակի
//             [date_words] => այսօր|երեկ|վերականգ|վերականգույց|վերադաս
//             [date_format] => d/m/Y
//             [locale] => hy_AM
//         )

//     [ukrainian] => Array
//         (
//             [month_names] => січень|лютий|березень|квітень|травень|червень|липень|серпень|вересень|жовтень|листопад|грудень
//             [abbreviated_month_names] => січ|лют|бер|кві|тра|чер|лип|сер|вер|жов|лис|гру
//             [days_of_week] => понеділок|вівторок|середа|четвер|п’ятниця|субота|неділя
//             [date_words] => сьогодні|вчора|завтра
//             [date_format] => d.m.Y
//             [locale] => uk_UA
//         )

//     [czech] => Array
//         (
//             [month_names] => leden|únor|březen|duben|květen|červen|červenec|srpen|září|říjen|listopad|prosinec
//             [abbreviated_month_names] => led|úno|bře|dub|kvě|čer|čec|srp|zář|říj|lis|pro
//             [days_of_week] => pondělí|úterý|středa|čtvrtek|pátek|sobota|neděle
//             [date_words] => dnes|včera|zítra
//             [date_format] => d.m.Y
//             [locale] => cs_CZ
//         )

//     [polish] => Array
//         (
//             [month_names] => styczeń|luty|marzec|kwiecień|maj|czerwiec|lipiec|sierpień|wrzesień|październik|listopad|grudzień
//             [abbreviated_month_names] => sty|lut|mar|kwi|maj|cze|lip|sie|wrz|paź|lis|gru
//             [days_of_week] => poniedziałek|wtorek|środa|czwartek|piątek|sobota|niedziela
//             [date_words] => dzisiaj|wczoraj|jutro
//             [date_format] => d.m.Y
//             [locale] => pl_PL
//         )

//     [latvian] => Array
//         (
//             [month_names] => janvāris|februāris|marts|aprīlis|maijs|jūnijs|jūlijs|augusts|septembris|oktobris|novembris|decembris
//             [abbreviated_month_names] => jan|feb|mar|apr|mai|jūn|jūl|aug|sep|okt|nov|dec
//             [days_of_week] => pirmdiena|otrdiena|trešdiena|ceturtdiena|piektdiena|sestdiena|svētdiena
//             [date_words] => šodien|vakar|rīt
//             [date_format] => d.m.Y
//             [locale] => lv_LV
//         )

//     [romanian] => Array
//         (
//             [month_names] => ianuarie|februarie|martie|aprilie|mai|iunie|iulie|august|septembrie|octombrie|noiembrie|decembrie
//             [abbreviated_month_names] => ian|feb|mar|apr|mai|iun|iul|aug|sep|oct|nov|dec
//             [days_of_week] => luni|marți|miercuri|joi|vineri|sâmbătă|duminică
//             [date_words] => azi|ieri|maine
//             [date_format] => d.m.Y
//             [locale] => ro_RO
//         )

//     [italian] => Array
//         (
//             [month_names] => gennaio|febbraio|marzo|aprile|maggio|giugno|luglio|agosto|settembre|ottobre|novembre|dicembre
//             [abbreviated_month_names] => gen|feb|mar|apr|mag|giu|lug|ago|set|ott|nov|dic
//             [days_of_week] => lunedì|martedì|mercoledì|giovedì|venerdì|sabato|domenica
//             [date_words] => oggi|ieri|domani
//             [date_format] => d/m/Y
//             [locale] => it_IT
//         )

//     [spanish] => Array
//         (
//             [month_names] => enero|febrero|marzo|abril|mayo|junio|julio|agosto|septiembre|octubre|noviembre|diciembre
//             [abbreviated_month_names] => ene|feb|mar|abr|may|jun|jul|ago|sep|oct|nov|dic
//             [days_of_week] => lunes|martes|miércoles|jueves|viernes|sábado|domingo
//             [date_words] => hoy|ayer|mañana
//             [date_format] => d/m/Y
//             [locale] => es_ES
//         )

//     [portuguese] => Array
//         (
//             [month_names] => janeiro|fevereiro|março|abril|maio|junho|julho|agosto|setembro|outubro|novembro|dezembro
//             [abbreviated_month_names] => jan|fev|mar|abr|mai|jun|jul|ago|set|out|nov|dez
//             [days_of_week] => segunda-feira|terça-feira|quarta-feira|quinta-feira|sexta-feira|sábado|domingo
//             [date_words] => hoje|ontem|amanhã
//             [date_format] => d/m/Y
//             [locale] => pt_PT
//         )

// )
$this->print_pre($this->getDateLib());
```


---

## session_check()

It is used to provide personalized implementation of the `session_start()` command, it is used to activate the sessions in the light of the settings in the Session Settings section. It is activated by running the `__construct()` method in the **Mind.php** file.

##### Example

```php
$this->session_check();
```

---

## remoteFileSize()

It is useful to learn the neck (as byte) of the file shelling on the remote server.

##### Example

```php
echo $this->remoteFileSize('https://github.com/fluidicon.png');
```

---

## addLayer()

It is used to include the file or files with the `.php` extension into the project. `$file` and `$cache` represent variables where paths of files are kept. File paths must be specified without the `.php` extension.

File paths can be sent as `string` or `array` to both variables, if files exist, they are included in the project with the `require_once` method.

It takes two parameters, first the second parameter `$cache` files, then the first parameter `$file` files included in the project. The `$file` and `$cache` parameters are optional and do not have to be specified. The `public` property is defined to allow access from outside the class.

Unextendable file paths can be specified in string or array format for both parameters, as well as paths that call class method within these file paths.

##### Example

```php
$this->addLayer('app/views/home');
```

**or**

```php
$file = array(
    'app/views/header',
    'app/views/content',
    'app/views/footer'
);
$this->addLayer($file);
```

**or**

```php
$this->addLayer('app/views/home', 'app/model/home');
```

**or**

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

**or** 

```php
$this->addLayer('HomeController:index@create',
[
    'BlogController:index@create',
    'LogController:index@create'
]);
```

**or**

```php
$this->addLayer([
    'BlogController:index@create',
    'LogController:index@create'
]);
```

**or** 

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
This function is used to create the `sql` syntax that must be written when creating a database table or column. The `sql` syntax is created by interpreting the schema sent to the `tableCreate` and `columnCreate` methods.

---

## wayMaker()
This function is used to parse the parameterized address sent to the `route` and `addLayer` methods.

---

## generateToken()
This function is used to generate a random parameter of specified character length, it takes a parameter of type `integer`, it does not have to be specified. By default, the character length is specified as `100`.

##### Example

```php
echo $this->generateToken();
```

**or**

```php
echo $this->generateToken(30);
```

---

## coordinatesMaker()

This function is used to obtain the location information if the visitor's GPS location is allowed to be shared. `string` takes a parameter and is not required. Since this parameter is sent to javascript's `querySelectorAll` method, it must be specified with reference to javascript's element access approach (like `form.example #my-coordinates`). If no parameter is specified, it adds the visitor location to elements with id `#coordinates` by default.

##### Example

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

**or**

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



****Information:**** Chrome has been tested in Firefox browsers.The accuracy of the locations shared by mobile phone is an average of 4 to 12 m2 on average.The accuracy of the locations shared via the old generation GPS modular desktop computer is 7,000 m2 on average.

---

## encodeSize()

It serves to convert the specified byte value to the largest type of size it can convert.Only byte type of value or a key to you (such as file sequence) can be sent.

**Supported Dimensions**
`KB`, `MB`, `GB`, `TB`, `PB`, `EB`

##### Example


```php
// 1 KB
echo $this->encodeSize(1024);
```

**or**

```php
// 1 MB
echo $this->encodeSize(1048576);
```

**or**

```php
// 1 GB
echo $this->encodeSize(1073741824);
```

**or**

```php
// 1 TB
echo $this->encodeSize(1099511627776);
```

**or**

```php
// 1 PB
echo $this->encodeSize(1125899906842624);
```

**or**

```php
// 1 EB
echo $this->encodeSize(1152921504606850000);
```

**or**

```php
// 1 MB
$file = array('size'=>1048576);
echo $this->encodeSize($file);
```

---

## decodeSize()

It is used to convert the specified type of size into byte.Size and size abbreviation should be specified by leaving a gap once in a while.

**Supported Dimensions**
`KB`, `MB`, `GB`, `TB`, `PB`, `EB`


```php
// 1024
echo $this->decodeSize('1 KB');
```

**or**


```php
// 1048576
echo $this->decodeSize('1 MB');
```

**or**


```php
// 1073741824
echo $this->decodeSize('1 GB');
```

**or**


```php
// 1099511627776
echo $this->decodeSize('1 TB');
```

**or**


```php
// 1125899906842624
echo $this->decodeSize('1 PB');
```

**or**


```php
// 1152921504606846976
echo $this->decodeSize('1 EB');
```



---

## toSeconds()

It is used to convert `string` type time data shared with it to seconds. At least two time values must be specified.

##### Example


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

It serves to convert a shared second of type `integer` into a timestamp consisting of Hours, Minutes and Seconds.

##### Example

```php
echo '7320 - 02:02:00<br>';
echo $this->toTime(7320);
```


---

## toRFC3339()

It converts a date of type `string` shared with it to a timestamp in the [RFC3339](https://datatracker.ietf.org/doc/html/rfc3339) standard.

##### Example

```php
$ndate = "10/06/2023";
echo $this->toRFC3339($ndate);
```

**or**

```php
echo $this->toRFC3339($this->timestamp);
```


---

## summary()

It serves to shorten the `string` type text shared with it up to the specified number of characters. takes four parameters. The first parameter is text, the second parameter is the number of characters, the third parameter is the `text` or `html` value that is desired to appear when the abbreviation occurs, and the fourth parameter is used to purify the text from codes and spaces. Only the third and fourth parameters do not have to be specified. By default, the fourth parameter is specified as `true` so that the shortened text is free of codes and abnormal spaces.
##### Example

```php
$str = 'In Turkey, about 10,000 plant species grow. About 3,000 of these plant species are endemic to Turkey. With this feature, Turkey has more endemic plant species than all of Europe.';
echo $this->summary($str, 46, ' ...');
```


---

## getIPAddress()

It serves to obtain the ip address of the user displaying the project.

##### Example


```php
echo $this->getIPAddress();
```

---

## getLang()

It serves to obtain the abbreviation of the language of the internet browser of the user viewing the project. Care has been taken to ensure that the provided language abbreviation is compatible with the abbreviations of the languages in the [languages()](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#languages-1) method.

##### Example

```php
echo $this->getLang();
```


---

## getAddressCode()

Used to obtain HTTP response codes of domain names and IP addresses.It is possible to request the response code of one or more addresses.

It takes two parameters, the first parameter contains the addresses sent in the `string` and `array` data types, while the second parameter specifies the `string` or `array` data type from which the queries of the addresses with the HTTP response codes should be returned.

###### **Exampl**

```php
$ip = $this->addressGenerator('174.129.25.170', '174.129.25.200');
$result = $this->getAddressCode($ip);
$this->print_pre($result);
```

**or**

```php
$ip = $this->addressGenerator('174.129.25.170', '174.129.25.200');
$result = $this->getAddressCode($ip, 403);
$this->print_pre($result);
```

**or**

```php
$ip = $this->addressGenerator('174.129.25.170', '174.129.25.200');
$result = $this->getAddressCode($ip, array(403));
$this->print_pre($result);
```

**or**

```php
$ip = $this->addressGenerator('174.129.25.170', '174.129.25.200');
$result = $this->getAddressCode($ip, array(301,403));
$this->print_pre($result);
```

**or**

```php
$result = $this->getAddressCode('https://twitter.com/', array(200, 301,403));
$this->print_pre($result);
```

---

## addressCodeList()

It is a method to return HTTP response codes as `array`.

##### Example

```php
$this->print_pre($this->addressCodeList());
```

---

## addressGenerator()

This method is used to create addresses between two different addresses (ipv4, ipv6 and onion) and return them in `array` type.

##### Example


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

Choosing to send the `$this->post` dataset to the database as it is, instead of working on the dataset that was intended to be added to the database, made updating the table containing the parameters that require authorization such as user role risky.

That is, if the form is posted by creating a field with the role name and assigning a value, with the help of a small surgical cut made on the interface, although there is no user role in the form, this request is reflected in the database, so the role of the relevant user is changed.

I do not use the `$this->post` dataset in this way in my projects, and I do not recommend it, but I created this method, thinking that it would be useful to raise awareness with the help of a method.

I named it the board/commission, inspired by the task of overseeing the dataset.

This method takes 3 parameters, one of which is mandatory. The first parameter represents the dataset and must be sent in `array` format. The second parameter represents the fields to be considered and the third parameter represents the fields to be ignored. The second and third parameters can be sent in `string` or `array` format. If there are conflicts from the second and third parameters, they are ignored.

To better understand the 3rd parameter, you can think of it as follows; If you absolutely do not want the user role and username to be changed, when you specify ['username', 'role'], even if data is sent in this direction from the form, it will be ignored.

If only the first parameter is sent, all elements of the dataset are checked and returned by assigning `null` instead of null values.

##### Example
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

It is used to obtain the server operating system name on which the project is running. It supports `Darwin`, `Windows`, `Linux` operating systems, other operating systems are named `Unknown`.

##### Example

```php
echo $this->getOS();
```

---

## getSoftware()

It is used to obtain the server software name on the operating system on which the project is running. `Apache`, `Microsoft ISS`, `LiteSpeed` and `Nginx` software are supported, other server software is named `Unknown`.

##### Example

```php
echo $this->getSoftware();
```

---

## getBrowser()

It serves to display the name of the user browser, if the `HTTP_USER_AGENT` value is specified, it will return the name of the browser from which that value was generated.

**Supported browsers:**

* Edge
* Firefox
* Safari
* Chrome
* Opera

##### Example

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

The Route function is used to define customizable routes and to install custom minds on these routes. The word mind is used to describe various layers such as Model, View, Controller, Middleware. In this way, the developer can clearly see which route the layers are defined, manage and create a design pattern specific to the project need.
  
Routes are defined in the `index.php` file in the same directory as the `Mind.php` file, so it works by prefixing the variable that the `new Mind()` call is assigned to.

The `route()` function, which can take `url`, `file` and `cache` parameters, accepts the `url` parameter as `string`, the `file` and `cache` parameters as `string` and `array`. Of these three parameters, `file` and `cache` parameters do not have to be specified.

The `file` and `cache` parameters consist of paths to `php` files with no extension specified. The `file` and `cache` parameter can also be used to call class methods.

For more information on loading layers, see [addLayer()](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#addLayer).


##### Example

```php
<?php

require_once '../src/Mind.php';

$Mind = new Mind();

$Mind->route('/', 'app/views/welcome');

?>
```


#### Url

It is possible to define parameter names for the routes other than the `/` slash symbol, if `edit/users/1` is written in the address line and if you want to name the `users` parameter with the `table` name and the `1` parameter with the `id` name, follow the path below must.

```php
$Mind->route('edit:table@id', 'app/view/edit');
```

To control it, put the `edit.php` file in the `app/view/edit` path.

```php
$this->print_pre($this->post);
```

After adding the code, it can be seen that the parameter names are allocated to the parameter names defined in the `url` by typing `edit/users/1` in the address line.

```php
Array (
    [table] => users
    [id] => 1
)
```

Also, if unnamed parameters such as `edit/users/1/2/other` are written in the address line, they are ignored. If parameter names as below are not defined in `url` parameter

```php
$Mind->route('edit', 'app/view/edit');
```

and if the route address to be reached is `edit/users/1`, enter the `edit.php` file in the `app/view/edit` path.

```php
$this->print_pre($this->post);
```

When the code is added, the unnamed parameters will appear as follows.

```php
Array (
    [0] => users
    [1] => 1
)
```

#### File

After the file or files specified in the `cache` parameter are included in the project, the file(s) defined in the `file` parameter are included in the project.

##### Example

```php
$Mind->route('/', 'app/view/home');
```

**or**

```php
$arr = array(
    'app/view/layout/header',
    'app/view/home',
    'app/view/layout/footer'
    );
$Mind->route('/', $arr);
```

#### Cache

If the `cache` parameter is specified, the specified `cache` files are included in the project one by one, from the first to the last added, before the file(s) specified in the `file` parameter are included in the project, one by one.

##### Example

```php
$Mind->route('/', 'app/view/home', 'database/CreateTable');
```

**or**

```php
$arr = array(
    'database/CreateTable',
    'model/home'
);
$Mind->route('/', 'view/home', $arr);
```
    
**or**

Create the `app/controller/HomeController.php` file and save the following codes in it.
 
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

Then define and check the route below.

    
```php
$Mind->route('home', 'app/views/home', 'app/controller/HomeController:index@create');
```

You can see that the `index` and `create` methods in the class work. It is possible to define one or more methods to a route.

Within this created `HomeController` class, `Mind` methods can be accessed with `$this->` prefix.

If the method is called, the class name must be the same as the file name.


---

## write()

It is used to write the specified content to the file with the specified name, it is created if the file and its directory do not exist, `true` if the operation is successful, `false` value is returned if the operation is successful. takes three parameters;

##### First parameter

represents the content and can be sent as `string` or `array`.

##### Second parameter

It represents the file path, if there is a file, the data in question is appended to the end of the file, if there is no file, a file with the specified name in the path is created and written to this file.

##### Third parameter

Represents the value to be used to separate data specified as an array. It is not required to be specified, by default `:` is defined.

##### Example

```php
$str = 'Hello world';
$this->write($str, 'new.txt');
```

**or** 

```php
$str = array('Hello', 'World');
$this->write($str, 'new.txt');
```
    

**or**

```php
$str = array('Hello', 'World');
$this->write($str, 'new.txt', '~');
```
    
**or**

```php
$str = 'Hello world';
$this->write($str, 'folder/sub_folder/new.txt');
```

**or**

```php
$str = array('Hello', 'World');
$this->write($str, 'folder/sub_folder/new.txt');
```



---

## upload()

It uses the specified file or files to upload to the specified folder, `$this->post['singlefile']` and `$this->post['multifile']` the variables where the files are kept `$path` the path to the folder where the files will be uploaded, `$ force` represents the information whether to use the filename or not.

**Information:** During the file upload process, you can update the maximum number of files to be uploaded at once from the `max_file_uploads` section in the `php.ini` file. The `$force` parameter is not required to be specified, it is defined as `false` by default. If not specified, the file name is preserved and the file name is uniquely uploaded.

##### Example

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

**or** 

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

## duplicate()

It is used to copy the roads of the files that are located on the local or remote server to the specified directory positions. File paths and directory positions should be specified as `string` or `array`. Both parameters should be specified.

##### Example

```php
$this->print_pre($this->duplicate('../contributing.md', 'download'));
```

**or** 

```php
$this->print_pre($this->duplicate('https://github.com/fluidicon.png', 'download'));
```
        
**or**

```php
$links = array(
    'https://github.com/aliyilmaz/Mind/archive/master.zip',
    '.htaccess'
);    
$this->print_pre($this->duplicate($links, ['download1','download2']));
```
    
---

## get_contents()

It is used to obtain the content between the values specified in the `$left` and `$right` variables in the data in the `string` structure shared with it or in the source code of the page located at the destination of a url. `$left` represents the container parameter on the left, and `$right` represents the container parameter on the right.

If there is one or more items, it presents them all as an 'array'. If you want to obtain the source code of the URL shared with it, the first two parameters with the `$left` and `$right` variables are sent null and the page source is returned as `string`.

The fourth optional parameter is used to send Basic Authorization, POST, Header, Proxy, Referer information and file to the destination address, and to obtain session information, if available, during access.

##### Example

```php
$url = 'https://www.cloudflare.com/';
$left = '';
$right = '';
$data 	= $this->get_contents($left, $right, $url);
$this->print_pre($data);
```

**or**

```php
$url = 'https://www.hepsiburada.com/';
$left = '';
$right = '';
$data 	= $this->get_contents($left, $right, $url);
$this->print_pre($data);
```


**or**

```php
$url 	= 'https://www.cloudflare.com/';
$left 	= '<title>';
$right	= '</title>';
$data 	= $this->get_contents($left, $right, $url);
$this->print_pre($data);
```

**or**

```php
$url 	= 'https://www.cloudflare.com/';
$left 	= '<link rel="alternate" hreflang="';
$right	= '"';
$data 	= $this->get_contents($left, $right, $url);
$this->print_pre($data);
```
    
**or**

```php
$url 	= 'Is an exemplary content. <title>Merhaba Dünya!</title>';
$left 	= '<title>';
$right	= '</title>';
$data 	= $this->get_contents($left, $right, $url);
$this->print_pre($data);
```

**or**

```php
$url = 'src=\'-str\'-after src=\'-str\'-after src=\'-str\'-after src=\'-str\'-after';
$left = 'src=\'';
$right = '\'-after';
$data 	= $this->get_contents($left, $right, $url);
$this->print_pre($data);
```

**or**

```php
$url = '{"filmler": [  {"imdb": "tt0116231", "url": "&lt;iframe src=&#039;https://example.com&#039; width=&#039;640&#039; height=&#039;360&#039; frameborder=&#039;0&#039; marginwidth=&#039;0&#039; marginheight=&#039;0&#039; scrolling=&#039;NO&#039; allowfullscreen=&#039;allowfullscreen&#039;&gt;&lt;/iframe&gt;"} ]}';
$left = 'src=&#039;';
$right = '&#039;';
$data 	= $this->get_contents($left, $right, $url);
$this->print_pre($data);
```

**or**

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

**or**

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

**or**

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

**or**

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


**or**


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

**or**


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

**or**


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

It serves to calculate the distance between two different coordinate points shared with it, as a bird flight. Coordinate information can be sent in `int`, `float` and `string` structures and is required.

The unit of measure of the distance between two coordinates can be specified as `string` or `array`, it is not required, if not specified, `m`, `km`, `mi`, `ft` and `yd` are returned as array type.

It is possible to obtain distance information according to one or more measurement units. If only one UoM is requested, the response for that UoM is returned as a string.

**Information:**

Measurement units and abbreviations are as follows.

* m (Meters)
* km (Kilometer)
* mi (Miles)
* ft (feet)
* yd (Yard)

##### Coordinates
```php
/* These are two points in Turkey */
$point1 = array('lat' => 41.008610, 'long' => 28.971111); // Istanbul
$point2 = array('lat' => 39.925018, 'long' => 32.836956); // Anitkabir
```


##### Example
    
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

**or**

```php
//4188.59

$distance = $this->distanceMeter($point1['lat'], $point1['long'], $point2['lat'], $point2['long'], 'm');
echo $distance;
```
    
**or**

```php
//4188.59

$distance = $this->distanceMeter($point1['lat'], $point1['long'], $point2['lat'], $point2['long'], array('m'));
echo $distance;
```
    
**or**

```php
//Array
//(
//    [m] => 4188.59
//    [km] => 4.19
//)

$distance = $this->distanceMeter($point1['lat'], $point1['long'], $point2['lat'], $point2['long'], array('m', 'km'));

$this->print_pre($distance);
```
    
**or**

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
    
**or**

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

This function is used to append `string` type data to the part where it is used with `PHP` codes. If there are `PHP` codes converted to HTML special characters, it also uses them by converting them to `PHP` code.


###### Example

```php
$code = 'Hello &lt;?=$this-&gt;timestamp;?&gt;';
$this->evalContainer($code);
```

**or**

```php
$code = 'hello &lt;?=$this-&gt;timestamp;?&gt;

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

This method is used to purify a `string` data from inline javascript and css codes, javascript, css and iframe tags. Exceptions in the purge operation can be specified in the 2nd parameter of type `string` or `array`. If the 2nd parameter is not specified, all extractions are performed.

#### Exceptions

* inlinejs (Ignores inline javascript codes)
* inlinecss (Ignores inline css codes)
* tagjs (ignores Javascript tags)
* tagcss (ignores css tags)
* iframe (ignores the iframe tag)
###### Example


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

This function serves to check the validity of the specified date or dates. The date or dates can be specified as **year-month-day**, **year-month-day hour:minute:second** or any other date format.


```php
$start_date = '2022-09-02';
if($this->lifetime($start_date)){
    echo 'There is time.';
} else {
    echo 'The time is over.';
}
```
or 

```php
$start_date = '2022-09-02 14:20:10';
if($this->lifetime($start_date)){
    echo 'There is time.';
} else {
    echo 'The time is over.';
}
```

or 

```php
$start_date = '2022-09-02';
$end_date = '2022-09-02';
if($this->lifetime($start_date, $end_date)){
    echo 'There is time.';
} else {
    echo 'The time is over.';
}
```

or 

```php
$start_date = '2022-09-02 22:02:34';
$end_date = '2022-09-02 22:02:35';
if($this->lifetime($start_date, $end_date)){
    echo 'There is time.';
} else {
    echo 'The time is over.';
}
```

---

## morse_encode()

This function returns the data in the `string` structure shared with it, defined in the method [morsealphabet()](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#morsealphabet) or sent in the second parameter to a custom morse useful for converting to codes.

###### Example


```php
$encode = $this->morse_encode('Mustafa Kemal Atatürk'); // -- ..- ... - .- ..-. .- / -.- . -- .- .-.. / .- - .- - ..-- .-. -.-

echo $encode;
```


**or** 


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

This function tries to decode the parameter that is shared with it and converted to custom morse codes defined in the method [morsealphabet()](https://github.com/aliyilmaz/Mind/blob/main/docs/en-readme.md#morsealphabet) or sent in the second parameter. benefit.


###### Example

```php
echo $this->morse_decode('-- ..- ... - .- ..-. .- / -.- . -- .- .-.. / .- - .- - ..-- .-. -.-');
```


**or**


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

This function serves to convert the string -type data to the binary code.

###### Example

```php
$data = 'Ali Yılmaz';
echo $this->stringToBinary($data);
```

---

## binaryToString()

This function serves to convert the binary data shared with it to string.

###### Example

```php
$data = '1000001 1101100 1101001 100000 1011001 11000100 10110001 1101100 1101101 1100001 1111010';
echo $this->binaryToString($data);
```

---

## hexToBinary()

This function serves to convert the HEX -type data shared with it to the string.

###### Example

```php
$data = bin2hex('Hello world');

echo $this->hexToBinary($data);
```


---

## siyakat_encode()

This function serves to encrypt the string type data according to the dictionaries shared with him.It takes two parameters, the first is the data to be encrypted, the second is dictionaries.

To create a dictionary on demand, the array keys in the example must be replaced with other array keys. (Like changing `'s' => '-.-..' to 'ç' => '...'`)

###### Example

   
```php
$data = 'In Turkey, about 10,000 plant species grow. About 3,000 of these plant species are endemic to Turkey. With this feature, Turkey has more endemic plant species than all of Europe.';
$miftah = array(
    array(
        '1'=>'elif', '2'=>'selim', '3'=>'silver', '4'=>'epic', '5'=>'abdulhamid',
        '6'=>'cuma', '7'=>'mustafakemal', '8'=>'cem', '9'=>'core', '0'=>'republic',
        'a'=>'pickle', 'b'=>'rival', 'c'=>'silhouette', 'd'=>'turan', 'e'=>'bal', 'f'=>'yellow'
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

This function serves to solve the encrypted data in the string type and siyakat_encode () shared with it.It takes two parameters, the first is the dictionaries used when encrypted data.
###### Example

```php
$data = '.-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. -.... -. ....- ... -..- -.--. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ....- .-. -.... .-. ... ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. -.... -. ....- ... -..- -.--. -.... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ....- .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ....- .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ....- .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. -.... -. ....- ... -..- -.--. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ....- .-. -.... .-. ... ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ....- .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- -. .-- -. ....- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ....- .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- -. .-- -. ....- ... .-- -.-.. ..-. -. .-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. -.... -. ....- ... -..- -.--. -.... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- -. .-- -. ....- .-. -.... .-. ----. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ....- .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ....- .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ...-- .-. .-- .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. -..- -. .-- -. ....- ... .-- -.-.. ..-. -. .-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ....- .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- -. .-- -. ....- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... -. ....- .-. -.... .-. -.--. .-. -.-.. -. .-... ....- .-... -. ...-- .-. -.-.. .-. ... ... ...-- -.--. ... .-. .-- -. -..- ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ....- .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. -.... .-. ....- .-. -..- -. .-- .-. ... .-. . .-. -.... .-. -.. .-. -.-.. .-. -..- ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -. ... ...-- -.--. ... .-. -.. ... ...-- -.--. ... ... .-- -.-.. ..-. .-. ... ... ...-- -.--. ... .-. -.--. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. .-- .-. ... .-. -.-.. .-. .-. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... .-. ...-- .-. .-- .-. -.. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. ...-- -. .-- .-. -.. .-. . -. .-- -. ....- .-. -.-.. -. -.-.. .-. .-- -. -..- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... .-. -..- .-. .-- -. ...-- -. -..- .-. -.... .-. ----. ....- .-... .-. ...-- -. .-- .-. -.. .-. -.... ....- .-... -. -..- .-. .-- -. ....- .-. -.... -. ...-- ....- .-... .-. -.. -. .-- -. ...-- -. -..- .-. -.... .-. .-. .-. -.... .-. -.--. .-. .-- .-. -.. .-. -.... .-. ... ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... -. ...-- .-. .-- .-. ... .-. -.-.. .-. -.. ....- .-... .-. ....- .-. -.... .-. ...';

$miftah = array(
    array(
        '1'=>'elif', '2'=>'selim', '3'=>'silver', '4'=>'epic', '5'=>'abdulhamid',
        '6'=>'cuma', '7'=>'mustafakemal', '8'=>'cem', '9'=>'core', '0'=>'republic',
        'a'=>'pickle', 'b'=>'rival', 'c'=>'silhouette', 'd'=>'turan', 'e'=>'bal', 'f'=>'yellow'
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

This method is used in cases where the specified access requests or application should be stopped.This method, which includes the error message, back and return to the homepage, takes two string parameters, the first is the short code of the error and the second is an error message.


###### Example

```php
$this->abort('404', 'The page not found');
```

## captcha()
This method serves to stop robots that aim to perform automatic form operations using the page interface, this method is used when there is a need to understand whether the visitor is a human or a robot. It adds an image containing a random parameter to the place where it is run and a text area below it so that that parameter can be written.

If the visitor enters the parameter in the image in the text field and performs the post operation, the form is sent, otherwise the form is not sent and a captcha error is added to the `$this->errors` variable by creating the required key under the captcha key, assuming that the visitor is a potential robot. In this way, it is possible to interrupt the automation algorithm of the robot.


It takes 4 parameters, they are `level`, `length`, `width` and `height` respectively.

**level**
Used to specify the reading difficulty level, by default it is 3. If it is not desired to make reading difficult, the `null` parameter should be specified.

**length**
It is used to specify the parameter length, when a length is specified by the developer in this section, the width and height values must be updated according to this definition so that the parameter to be created can be seen easily. The default length value is 8.

**width**
It is used to specify the width of the captcha code image. Dimensions should be specified in pixels or %. 320 is defined by default.

**height**
It is used to specify the height of the captcha code image. Dimensions should be specified in pixels or %. By default 60 is defined.

Not all parameters need to be specified.

Since the visitor can send the form by deleting the captcha input left by this method with the browser tools, a check must be performed in the light of the example below, before processing the form data.

The following examples are intended to show how it is used on the same page with another form that does not validate.

###### Example

```php
// $this->captcha(); 
// $this->captcha(null); // null
// $this->captcha(''); // null
// $this->captcha(3, 9); length
$this->captcha(3, 8, 320); //width
// $this->captcha(3, 8, 320, 60); height

```

**or**

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

    if(empty($this->errors['captcha'])){
        echo 'captcha form';
        $this->print_pre($this->post);
    } else {
        $this->abort('401', 'Captcha not found.');
        exit;
    }
    
}

// captcha olmadan
if(isset($this->post['btn_without_captcha'])){
    if(isset($this->post['age'])){
        echo 'Form sent without captcha';
        $this->print_pre($this->post);
    }
}

```

---

## rm_r()

It is used to delete files and folders. File and folder paths to be deleted can be specified as `string` or `array`. If the directory path is specified, the folder and the files and folders in it are also deleted.

**Info:** Since deletion is an action that requires authorization, the project should be allowed to interfere with directories via `chmod`.
###### Example

```php
if($this->rm_r('theywillbedeleted')){
  echo 'Deleted.';
} else {
  echo 'It could not be deleted.';
}
```

**or** 

```php
$paths = array(
    'theywillbedeleted1',
    'theywillbedeleted2',
    'theywillbedeleted3/delete1.txt'
);
if($this->rm_r($paths)){
  echo 'Deleted.';
} else {
  echo 'It could not be deleted.';
}
```
---

## ffsearch()

It serves to return the specified file and folder paths as a series.It also searches for the files and folders in the directory where the project is located.

code:
```php
$this->print_pre($this->ffsearch('./', '*.sqlite'));
```

output:
```php
Array
(
    [0] => ./app/migration/mydb.sqlite
)
```

---

## json_encode()
It serves to convert the specified string to json format. Unlike PHP's `json_encode` method, it uses the `JSON_UNESCAPED_UNICODE` definition by default, the second parameter is specified as `true` by default. In this way, the json data is compressed and takes up less space.

If the json data is to be obtained in a legible structure, the second parameter should be specified as `false`. Thus, a legible json output is obtained by applying the `JSON_PRETTY_PRINT` definition.

code:
```php
$data = ['Beyazıt Karataş: The name of the national combat aircraft must be "Turkish Eagle"!', 'Ali Yılmaz'];
echo $this->json_encode($data); // $this->json_encode($data, false);
```

output:
```php
[
    "Beyazıt Karataş: The name of the National Combat Aircraft should be \"Turkish Eagle\"!",
    "Ali Yılmaz"
]
```

---

## json_decode()
It converts the specified json parameter to array format. Unlike PHP's `json_decode` method, the second parameter is set to `true` so that the data is only converted into an array.

code:
```php
$data = '[
    "Beyazıt Karataş: The name of the National Combat Aircraft should be \"Turkish Eagle\"!",
    "Ali Yılmaz"
]';
$this->print_pre($this->json_decode($data));
````

output:
```php
Array
(
    [0] => Beyazıt Karataş: The name of the national combat aircraft must be "Turkish Eagle"!
    [1] => Ali Yılmaz
)
```

---

## saveAs()

It is used to download the file located in the specified path or the content of certain `MIME` type, as when right-clicking / save as in the browser. This method also allows accessing the files in the local directory where direct access is blocked, or on remote servers that are allowed to be accessed.

It is necessary to specify a name in the second parameter, especially when downloading paths that do not have a filename or content of `MIME` type. For the download process, the 3rd parameter should either not be specified at all or should be specified as `true`. If it is desired to see the `MIME` version instead of downloading, the third parameter should be specified as `false`.

code:
```php
$this->saveAs('app/migration/mysql_backup_2022_02_14_01_00_53.json');
```

output:
```php
The save as window opens, the filename contains `mysql_backup_2022_02_14_01_00_53.json`.
```



code:
```php
$this->saveAs('app/migration/mysql_backup_2022_02_14_01_00_53.json', null, false);
```

output:
```
Data in `json` format is displayed.
```


---

## mime_content_type()

This method serves to display the `MIME` type of the file hosted on the local or remote server. It takes a value of type `string` and must be specified.

code:
```php
echo $this->mime_content_type('../screenshots/error.png');
```

output:
```php
image/png
```


code:
```php
echo $this->mime_content_type('https://raw.githubusercontent.com/aliyilmaz/Mind/master/screenshots/error.png');
```

output:
```php
image/png
```
**Info:** For more information about MIME Types, see [source](https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types).


---

## popup()

This method serves to create a pop-up area for display needs such as disclaimers, advertisements, announcements. The method supports three different theme options as `red`, `white` and `black`. The first parameter is the content, the second parameter is the settings. The drop-down field is displayed above all page elements.

* Defining `theme` is not mandatory. By default `red` is defined. Other than `red`, `white` and `black` are supported.
* Defining `position` is not mandatory. By default `bottom` is defined. `top`, `bottom` and `full` are supported.
* `button` is not mandatory to define. By default, the positive button is defined as `Yes` and the negative button as `No, Thanks`. If a button is to be removed, the corresponding button's `text` key should be left blank. If a button is to be redirected when it is clicked, the relevant address should be defined in the `href` part of the button.
* `script` is not mandatory to define. If specified, the buttons must exist, because this section hosts the codes whose fate will be determined according to visitor approval. (Like search engine tracking code to run after disclaimer acceptance)
* `timeout` is not mandatory to define. Makes the pop-up area disappear after the specified seconds.
* `url` is not required to define. Cannot be used without specifying `timeout`.
* `again` is used to determine whether the opened area should be opened when the page is accessed again, in cases other than clicks. By default `true` is specified so the dropdown field is displayed every time the page is accessed. `again` can be used together with `timeout`. If this usage is not desired to be displayed again, `again` should be specified as `false`.


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
    'script'=>"<!-- Google Tag Manager 2020 --><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].pusfh({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-XXXXXX');</script><!-- End Google Tag Manager -->",
    'redirect'=>[
        'timeout'=>5000, // default 0
        'url'=>'https://www.mozilla.com' // default empty (required timeout)
    ]
]);
```

---

## managerSentence()

It serves to break the specified number of sentences from the text shared with him by using the `.?!` signs as separators, and then to combine them by putting a space between them. Takes two `string` type parameters that must be specified.

###### Example

code:
```php
$str = 'A mysterious virus affects the whole city. Those affected by the virus become monsters one by one.';
echo $this->managerSentence($str, 1);
```

output:
```php
A mysterious virus affects the whole city.
```

or  

code:
```php
$str = 'A mysterious virus affects the whole city. Those affected by the virus become monsters one by one.';
echo $this->managerSentence($str, 2);
```

output:
```php
A mysterious virus affects the whole city. Those affected by the virus become monsters one by one.
```

---



## format_date()
It serves to convert and return the date shared with it according to the specified language code and specified date format. It takes three parameters, the first parameter is the date and is required. The second parameter is the language code and is not required, if not specified, `en_US` is used by default. The third parameter is the date format and is not required, if not specified, it references the current format of the date by default.

###### Example

```php
$date_string = '2023-04-28 00:00:00';
echo $this->format_date($date_string); // 2023-04-28 00:00:00
```

**or**

```php
$date_string = '25 Mayıs 2023';
echo $this->format_date($date_string); // 25 May 2023
```

**or**

```php
$date_string = '2023-04-28 00:00:00';
echo $this->format_date($date_string, 'en_US', 'd F Y'); // 28 April 2023
```

**or**

```php

$date_string = '2023-04-28 00:00:00';
echo $this->format_date($date_string, 'tr_TR', 'd F Y'); // 28 Nisan 2023

```

**or**

```php
$date_string = '28 April 2023';
echo $this->format_date($date_string); // 28 April 2023
```

**or**

```php
$date_string = '28 April 2023';
echo $this->format_date($date_string, 'tr_TR'); // 28 Nisan 2023
```

**or**

```php
$date_string = '28 Nisan 2023';
echo $this->format_date($date_string, 'en_US'); // 28 April 2023
```

**or**

```php
$date_string = '28 Nisan 2023';
echo $this->format_date($date_string, null, 'Y F d'); // 2023 April 28
```

**or**

```php
$date_string = '28 Nisan 2023';
echo $this->format_date($date_string, 'en_US', 'Y F d'); // 2023 April 28
```

**or**

```php
$date_string = '28 Nisan 2023';
echo $this->format_date($date_string, 'pl_PL', 'Y F d'); // 2023 Kwiecień 28
```

**or**

```php
$date_string = '28 Nisan 2023';
echo $this->format_date($date_string, 'uk_UA', 'Y F d'); // 2023 Квітень 28
```

**or**

```php
$date_string = '28 Nisan 2023';
echo $this->format_date($date_string, 'ro_RO', 'Y F d'); // 2023 Aprilie 28
```

**or**

```php
$date_string = '28 Nisan 2023';
echo $this->format_date($date_string, 'pt_PT', 'Y F d'); // 2023 Abril 28
```

