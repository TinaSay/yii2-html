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

/**
 * Class HtmlWidget
 *
 * @package tina\html\widgets
 */
class HtmlWidget extends Widget
{
    /**
     * @var string
     */
    public $name;

    /**
     * @return string
     */
    public function run()
    {
        $model = Html::find()->language()->hidden()->andWhere(['name' => $this->name])->one();
        if ($model instanceof Html) {
            return $this->render($model->template, [
                'model' => $model,
            ]);
        } else {
            return null;
        }
    }
}
