MelnikovedPopplerBundle
==================

This bundle allows you to merge pdf files with poppler util - pdfUnit

Installation
-------------

### Step 1: Download the bundle

Open your command console, browse to your project and execute the following:

```sh
$ composer require melnikoved/poppler-bundle:dev-master
```

### Step 2: Enable the bundle

``` php
// app/AppKernel.php
public function registerBundles()
{
    return array(
        // ...
         new Melnikoved\PopplerBundle\MelnikovedPopplerBundle(),
    );
}
```

Usage
-----
For merging pdf files you should use service 'poppler'

``` php
    $this->get('poppler')->merge($inputFileNames, $outputFileName);
```