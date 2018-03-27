<?php

namespace tina\html;

use krok\system\components\backend\NameInterface;
use Yii;

/**
 * html module definition class
 */
class Module extends \yii\base\Module implements NameInterface
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = null;

    /**
     * @var array
     */
    public $templates = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->registerEditor();
    }

    /**
     * @return string
     */
    public static function getName()
    {
        return Yii::t('system', 'Html');
    }

    protected function registerEditor()
    {
        Yii::$container->set(\krok\editor\interfaces\EditorInterface::class, \krok\ace\AceWidget::class);
    }
}
