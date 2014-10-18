#Installation

1. Download AdunsulagDoctrineEncryptBundle using composer
2. Enable the Bundle
3. Add configuration

### Step 1: Download AdunsulagDoctrineEncryptBundle using composer

Add AdunsulagDoctrineEncryptBundle in your composer.json:

```js
{
    "require": {
        "adunsulag/doctrine-encrypt-bundle": "dev-master"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update adunsulag/doctrine-encrypt-bundle
```

Composer will install the bundle to your project's `vendor/adunsulag` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Adunsulag\DoctrineEncryptBundle\AdunsulagDoctrineEncryptBundle(),
    );
}
```

### Step 3: Add configuration to config.yml

See details at: [Configuration reference](https://github.com/adunsulagobility/DoctrineEncryptBundle/blob/master/Resources/doc/configuration_reference.md)
