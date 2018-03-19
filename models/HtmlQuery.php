<?php

namespace tina\html\models;

use Yii;

/**
 * This is the ActiveQuery class for [[Html]].
 *
 * @see Html
 */
class HtmlQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     * @return Html[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Html|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @param null|string $language
     *
     * @return $this
     */
    public function language($language = null)
    {
        if ($language === null) {
            $language = Yii::$app->language;
        }

        $this->andWhere(['[[language]]' => $language]);

        return $this;
    }

    /**
     * @param null|string $hidden
     *
     * @return $this
     */
    public function hidden($hidden = null)
    {
        if ($hidden === null) {
            $hidden = Html::HIDDEN_NO;
        }
        $this->andWhere(['[[hidden]]' => $hidden]);

        return $this;

    }
}
