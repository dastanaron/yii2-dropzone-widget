<?php

namespace dastanaron\dropzone\components;

use yii\helpers\Json;

class BuilderDropzoneJs
{

    public function ArrayToJsObject($array)
    {
        return Json::encode($array);

    }

    public static function build($id, $options)
    {

        $optionObject = self::ArrayToJsObject($options);

        $string = 'jQuery(function ($) {
            var myDropzone = new Dropzone("div#'.$id.'", JSON.parse(\''.$optionObject.'\'));
            $("div#'.$id.'").addClass("dropzone");
            myDropzone.on("error", function (event) {
                console.log(event);
            })
        });';

        return $string;
    }

}