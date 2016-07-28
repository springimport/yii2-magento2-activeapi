ActiveAPI for Magento 2
=======================
Implementation of Magento 2 REST API, made in the ActiveRecord-style.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist springimport/yii2-magento2-activeapi "*"
```

or add

```
"springimport/yii2-magento2-activeapi": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
...

$quoteCartManagement = new QuoteCartManagement;

$quoteCartManagement->setScenario(QuoteCartManagement::SCENARIO_CUSTOMERS_CARTS);
$quoteCartManagement->customer_id = 4;

if ($quoteCartManagement->validate() && $result = $quoteCartManagement->post()) {
    print_r($result);
}

...
```