# Yii2 Web Application

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/13.png)

Yii2 Web Application is a Starter Project dedicated to the yii2 developer community which is equipped with features for fast application creation needs with extra security.

### This project was built with :

AdminLTE 3 https://adminlte.io/docs/3.0

Yii2 Lastest Version https://www.yiiframework.com/doc/guide/2.0/en

Bootstrap 4 https://getbootstrap.com/docs/4.0/getting-started/introduction

### Become an Open Source Collective contributor :

https://opencollective.com/yiisoft

---

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/18.png)

## Installation

$ git clone https://github.com/adyoi/yii2-webapps.git webapps<br>
$ cd webapps<br>
$ cd system<br>
$ chmod +x ./init<br>
$ ./init<br>
$ composer update

## Configuration

* import webapps.sql

* /system/common/config/main-local.php
```php
<?php
return [
    'components' => [
        'application' => [
            'class' => 'common\components\Application',
        ],
        
        ...
        ...
        
    ],
];
```

* /system/common/config/param-local.php
```php
<?php
return [
    'bsVersion' => '4.x',
    'bsDependencyEnabled' => false,
    'upload' => '/images/upload/',
];
```

* /system/common/config/main.php
```php
<?php
return [
    // Language
    'language' => 'id_ID',
    // Timezone
    'timeZone' => 'Asia/Jakarta',

    ...
    ...
    
];
```

* /backend/.htaccess
```php
RewriteEngine on
# link generate to http://localhost/webapps/backend
RewriteBase /webapps/backend
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . index.php
```

* Default Account 
```php
// User Access
username : root
password : root

// Demo Menu
username : menu
password : menu

// User 
username : admin
password : admin

username : user
password : user
```

* Browser
```php
Frontend : http://localhost/webapps/
Backend  : http://localhost/webapps/backend
```

### Version 2.0
---

User Menu Level :

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/14.png)

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/15.png)


API Support :

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/16.png)

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/17.png)


### Version 1.0
---

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/1.png)

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/2.png)

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/3.png)

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/4.png)

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/5.png)

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/6.png)

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/7.png)

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/8.png)

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/9.png)

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/10.png)

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/11.png)

![alt text](https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/12.png)

### 🍔🍟🍕🍱🥪🥑🥛💻
---
<a href="https://paypal.me/adyoi?locale.x=id_ID"><img src="https://raw.githubusercontent.com/adyoi/yii2-webapps/master/images/donate-paypal.png" alt="donate-paypal" width="100"/></a>
