dropzone-widget
===============

На русском [ТУТ](README_RU.md)


Widget for convenient downloading of files, using the well-known library DropZone.js.

This widget differs from many in that:

1. Everything works, including converting the php array to a JS object.
2. Does not throw scripts into the body of an html document, than most widgets on yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require dastanaron/yii2-dropzone-widget "@dev" --prefer-dist 

```
After that, you need to configure the config. But this is only in case,
if you use a widget with the generation of a JS file, and not with the publication of it in the body of html.


First add the module to main.php:
```php
<?php
    'modules' => [       
        //other modules //--//--//--//
        'dynamikjs' => [
            'class' => 'dastanaron\dropzone\DynamicJSModule'
        ],
    ]
```

Usage
-----

```php
<?=dastanaron\dropzone\DropZoneWidget::widget([
        'id' => 'myDropZone', // ID on the div element
        'site_url' => 'http://site.com/', //If you are using JS file generation, you must specify
        'generateJSFile' => true, //Generate js file (the default is on)
        'options'=> [
            'url' => '/file-upload/image-upload', //Where to send a request to save the file
        ]
])?>
```

Example of a data acceptance controller, [details here](http://www.yiiframework.com/doc-2.0/guide-input-file-upload.html):

```php
<?php

use Yii;
use yii\web\Controller;
use backend\models\UploadImage;
use yii\web\UploadedFile;

class DynamikjsController extends Controller
{
 public function actionImageUpload()
    {
        $model = new UploadImage();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstanceByName('file');
            if ($model->upload()) {
                return 'ok';
            }
        }

        Yii::$app->response->setStatusCode(400);
        return 'error';
    }
}