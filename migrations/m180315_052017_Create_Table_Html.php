<?php

use yii\db\Migration;

/**
 * Class m180315_052017_Create_Table_Html
 */
class m180315_052017_Create_Table_Html extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $options = ($this->db->getDriverName() === 'mysql') ? 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci' : null;

        $this->createTable('{{%html}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'text' => $this->text(),
            'hidden' => $this->integer()->defaultValue(0),
            'language' => $this->string(8),
            'createdBy' => $this->integer()->null(),
            'createdAt' => $this->dateTime()->null()->defaultValue(null),
            'updatedAt' => $this->dateTime()->null()->defaultValue(null),
        ], $options);

        $this->addForeignKey(
            'html_createdBy_auth_id',
            '{{%html}}',
            'createdBy',
            '{{%auth}}',
            'id',
            'SET NULL',
            'RESTRICT'
        );

        $this->createIndex('idx-name-language', '{{%html}}', ['name', 'language'], true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-name-language', '{{%html}}');
        $this->dropForeignKey('html_createdBy_auth_id', '{{%html}}');
        $this->dropTable('{{%html}}');
    }
}
