dropzone-widget
===============
Виджет для удобной загрузки файлов, с помощью известной библиотеки DropZone.js.

Данный виджет отличается от многих тем, что:

1. Все работает, в том числе конвертация массива php в объект JS.
2. Не выбрасывает скрипты в тело html - документа, чем грешат большинство виджетов на yii2


Installation
------------

Устанавлиевается решение с помощью [композера](http://getcomposer.org/download/).

Введите команду:

```
composer require dastanaron/yii2-dropzone-widget "@dev" --prefer-dist 

```

После этого, вам необходимо сконфигурировать конфиг. Но это только на тот случай,
если вы будете использовать виджет с генерацией JS файла, а не с публикацией его в тело html.


Сначала добавить модуль в main.php:

```php
<?php
    'modules' => [       
        //other modules //--//--//--//
        'dynamikjs' => [
            'class' => 'dastanaron\dropzone\DynamicJSModule'
        ],
    ]
```

Использование
----------------------------

```php
<?=dastanaron\dropzone\DropZoneWidget::widget([
        'id' => 'myDropZone', //ID на div элементе
        'site_url' => 'http://site.com/', //Если используется генерация JS файла, то обязательно указать
        'generateJSFile' => true, //Генерация js файла (по умолчанию - включена)
        'options'=> [
            'url' => '/file-upload/image-upload', //Куда посылать запрос на сохранение файла
            'maxFiles' => 1, //Максимальное количество файлов
            'acceptedFiles' => 'image/*', //MIME - типы файлов
        ]
])?>
```

В массив опций, вы можете указывать все опции, доступные в dropZoneLib, [список опций](http://www.dropzonejs.com/#configuration-options)

Пример контролера принятия данных, подробно [здесь](http://www.yiiframework.com/doc-2.0/guide-input-file-upload.html):

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
 ```
