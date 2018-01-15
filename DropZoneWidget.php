<?php

namespace dastanaron\dropzone;

use Yii;
use yii\base\Widget;

/**
 * This is just an example.
 */
class DropZoneWidget extends Widget
{
    /**
     * @var string
     */
    public $id = 'dropzone-upload';

    /**
     * @var array
     */
    public $options;

    /**
     * validation public property
     */
    public function init()
    {
        if(empty($this->options)) {
            $this->options = [
                'url' => Yii::$app->urlManager->createUrl('site/upload'),
            ];
        }

        ob_start();
    }

    /**
     * The method returns a representation(view) when the widget is called
     * @return mixed
     */
    public function run()
    {
        $content = ob_get_clean();
        return $this->render('dropzone' ,[
            'id' => $this->id,
            'options' => $this->options,
        ]);
    }
}
