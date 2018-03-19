<?php
/**
 * Created by PhpStorm.
 * User: nsign
 * Date: 15.03.18
 * Time: 18:11
 */

namespace tina\html\widgets;

use tina\html\models\Html;
use yii\base\Widget;

class HtmlWidget extends Widget
{
    public $name;

    /**
     * @return string
     */
    public function run()
    {
        $htmlBlocks = Html::find()->language()->hidden()->andWhere(['name' => $this->name])->one();
        if ($htmlBlocks) {
            return $htmlBlocks->text;
        } else {
            return null;
        }

    }
}
