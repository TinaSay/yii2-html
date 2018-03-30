<?php

use yii\db\Migration;

/**
 * Class m180330_094201_drop_column
 */
class m180330_094201_drop_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('html_createdBy_auth_id', '{{%html}}');
        $this->dropColumn('{{%html}}', 'createdBy');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%html}}', 'createdBy', $this->integer()->null()->after('[[language]]'));

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
}
