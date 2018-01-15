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
     * @var string
     */
    public $site_url = '';

    /**
     * @var string
     */
    public $generateJSFile = true;

    /**
     * @var array
     */
    public $options;

    /**
     * validation public property
     */
    public function init()
    {

        if(!isset($this->options['url'])) $this->options['url'] = Yii::$app->urlManager->createUrl('site/upload');
        if(!isset($this->options['paramName'])) $this->options['paramName'] = 'file';

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
            'site_url' => $this->site_url,
            'generateJSFile' => $this->generateJSFile,
        ]);
    }
}
