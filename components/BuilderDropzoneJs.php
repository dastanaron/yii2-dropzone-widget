<?php

namespace dastanaron\dropzone\components;

use yii\helpers\Json;

class BuilderDropzoneJs
{

    public function ArrayToJsObject($array)
    {
        return Json::encode($array);

    }

    public static function build($id, $options, $events = array())
    {

        $optionObject = self::ArrayToJsObject($options);

        $string = 'jQuery(function ($) {
            var myDropzone = new Dropzone("div#'.$id.'", JSON.parse(\''.$optionObject.'\'));
            $("div#'.$id.'").addClass("dropzone");
            myDropzone.on("success", function (event, response) {
                console.log(event);
                console.log(response);
            });';


        if(!empty($events))
        {
            foreach($events as $type=>$function) {
                $string .= 'myDropzone.on("'.$type.'", '.$function.');';
            }
        }

        $string .= '});';

        return $string;
    }

}