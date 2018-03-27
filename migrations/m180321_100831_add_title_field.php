<?php

use yii\db\Migration;

/**
 * Class m180321_100831_add_title_field
 */
class m180321_100831_add_title_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            '{{%html}}',
            'title',
            $this->string(256)->null()->after('[[name]]')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%html}}', 'title');
    }
}
