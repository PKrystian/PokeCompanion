<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%types}}`.
 */
class m230808_203907_create_types_table extends Migration
{
    private const TABLE_NAME = 'types';
    private const FIELD_TYPE_ID = 'type_id';
    private const FIELD_NAME = 'name';
    private const FIELD_DESCRIPTION = 'description';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                self::FIELD_TYPE_ID => $this->primaryKey(),
                self::FIELD_NAME => $this->string()->notNull()->unique(),
                self::FIELD_DESCRIPTION => $this->text()->notNull(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
