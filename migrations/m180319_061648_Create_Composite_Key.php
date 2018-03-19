<?php

use yii\db\Migration;

/**
 * Class m180319_061648_Create_Composite_Key
 */
class m180319_061648_Create_Composite_Key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'html_names_language_unique_index',
            '{{%html}}',
            ['name', 'language'],
            true
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'html_names_language_unique_index',
            '{{%html}}'
        );
    }
}
