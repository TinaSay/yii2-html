<?php

namespace tina\html\models;

use app\modules\auth\models\Auth;
use krok\extend\behaviors\CreatedByBehavior;
use krok\extend\behaviors\LanguageBehavior;
use krok\extend\behaviors\TimestampBehavior;
use krok\extend\interfaces\HiddenAttributeInterface;
use krok\extend\traits\HiddenAttributeTrait;

/**
 * This is the model class for table "{{%html}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property integer $hidden
 * @property string $language
 * @property integer $createdBy
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property Auth $auth
 */
class Html extends \yii\db\ActiveRecord implements HiddenAttributeInterface
{
    use HiddenAttributeTrait;

    /**
     * @return array
     */
    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'TimestampBehavior' => [
                'class' => TimestampBehavior::class,
            ],
            'CreatedByBehavior' => [
                'class' => CreatedByBehavior::class,
            ],
            'LanguageBehavior' => [
                'class' => LanguageBehavior::class,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%html}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['text'], 'string'],
            [['hidden', 'createdBy'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['name'], 'string', 'max' => 64],
            [['name'], 'unique', 'targetAttribute' => ['name', 'language']],
            [['language'], 'string', 'max' => 8],
            [
                ['createdBy'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Auth::className(),
                'targetAttribute' => ['createdBy' => 'id'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'text' => 'Текст',
            'hidden' => 'Скрытый',
            'language' => 'Язык',
            'createdBy' => 'Создал',
            'createdAt' => 'Создано',
            'updatedAt' => 'Обновлено',
        ];
    }

    /**
     * @inheritdoc
     * @return HtmlQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HtmlQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuth()
    {
        return $this->hasOne(Auth::className(), ['id' => 'createdBy']);
    }
}
