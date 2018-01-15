<?php

/** @var $this yii\web\View */
/** @var $id string */
/** @var $site_url string */
/** @var $generateJSFile bool */
/** @var $options array */

use Yii;
use yii\helpers\Html;
use dastanaron\dropzone\assets\DropzoneAsset;
use dastanaron\dropzone\components\BuilderDropzoneJs;

DropzoneAsset::register($this);

?>

<div id="<?=$id;?>" class="dropzone-dev">
    <?= !empty($label) ? $label : '';?>
</div>

<?php

if($generateJSFile) {

    $generatejs = $site_url . 'dynamikjs/dynamikjs/dropzonejs?id=' . $id . '&options[generate]=true';

    foreach ($options as $key => $option) {
        $generatejs .= '&options[' . $key . ']=' . $option;
    }

    $this->registerJsFile($generatejs, ['depends' => ['yii\web\YiiAsset', 'yii\bootstrap\BootstrapAsset'], 'position' => \yii\web\View::POS_END]);
}
else {

    $js = BuilderDropzoneJs::build($id, $options, $events);

    $this->registerJs($js, \yii\web\View::POS_END);

}
