<?php

use yii\db\Migration;

/**
 * Class m180315_073027_Create_Foreign_Key
 */
class m180315_073027_Create_Foreign_Key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'html_createdBy_auth_id',
            '{{%html}}',
            'createdBy',
            '{{%auth}}',
            'id',
            'SET NULL',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('html_createdBy_auth_id', '{{%html}}');
    }
}
