<?php

/** @var $this yii\web\View */
/** @var $id string */
/** @var $options array */

use yii\helpers\Html;
use dastanaron\dropzone\assets\DropzoneAsset;

DropzoneAsset::register($this);

?>

<div id="<?=$id;?>" class="dropzone-dev"></div>

<?php

$js = <<<JS
jQuery(function ($) {
    var myDropzone = new Dropzone("div#$id", { url: "{$options['url']}", paramName: 'file' });
    $("div#$id").addClass('dropzone');
    myDropzone.on('error', function (event) {
        console.log(event);
    })
});
JS;

$this->registerJs($js, \yii\web\View::POS_END);

