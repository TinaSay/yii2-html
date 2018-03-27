<?php

use yii\db\Migration;

/**
 * Class m180323_065117_add_template_field
 */
class m180323_065117_add_template_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            '{{%html}}',
            'template',
            $this->string(256)->notNull()->after('[[text]]'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%html}}', 'template');
    }
}
