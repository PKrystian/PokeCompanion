<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%moves}}`.
 */
class m230813_180426_create_moves_table extends Migration
{
    private const TABLE_NAME = 'moves';
    private const FIELD_MOVE_ID = 'move_id';
    private const FIELD_NAME = 'name';
    private const FIELD_TYPE = 'type';
    private const FIELD_CATEGORY = 'category';
    private const FIELD_POWER = 'power';
    private const FIELD_ACCURACY = 'accuracy';
    private const FIELD_POWER_POINT = 'power_point';
    private const FK_CATEGORY = 'fk_category';
    private const FOREIGN_TABLE_NAME = 'types';
    private const FOREIGN_FIELD_TYPE_ID = 'type_id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                self::FIELD_MOVE_ID => $this
                    ->primaryKey(),
                self::FIELD_NAME => $this
                    ->string()
                    ->notNull(),
                self::FIELD_TYPE => $this
                    ->integer(),
                self::FIELD_CATEGORY => $this
                    ->string()
                    ->notNull(),
                self::FIELD_POWER => $this
                    ->integer()
                    ->notNull(),
                self::FIELD_ACCURACY => $this
                    ->float()
                    ->notNull(),
                self::FIELD_POWER_POINT => $this
                    ->integer()
                    ->notNull(),
            ]
        );
        $this->addForeignKey(
            self::FK_CATEGORY,
            self::TABLE_NAME,
            self::FIELD_TYPE,
            self::FOREIGN_TABLE_NAME,
            self::FOREIGN_FIELD_TYPE_ID,
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::FK_CATEGORY, self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);
    }
}
