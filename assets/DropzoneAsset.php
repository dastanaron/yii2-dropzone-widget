<?php
/**
 * Created by PhpStorm.
 * User: dastanaron
 * Date: 15.01.18
 * Time: 12:14
 */

namespace dastanaron\dropzone\assets;


use yii\web\AssetBundle;

/**
 * Class DropzoneAsset
 * @package backend\assets
 */
class DropzoneAsset extends AssetBundle
{

    public $sourcePath = __DIR__;

    public $css = [
        "css/dropzone.css",
    ];
    public $js = [
        "js/dropzone.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}