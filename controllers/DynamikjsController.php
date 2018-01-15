<?php
/**
 * Created by PhpStorm.
 * User: dastanaron
 * Date: 15.01.18
 * Time: 12:54
 */

namespace dastanaron\dropzone\controllers;

use Yii;
use yii\web\Controller;
use dastanaron\dropzone\components\BuilderDropzoneJs;

class DynamikjsController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionDropzonejs()
    {
        $id = Yii::$app->request->get('id');
        $options = Yii::$app->request->get('options');

        return BuilderDropzoneJs::build($id, $options);
    }
}