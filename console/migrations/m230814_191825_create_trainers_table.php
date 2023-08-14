<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trainers}}`.
 */
class m230814_191825_create_trainers_table extends Migration
{
    private const TABLE_NAME = 'trainers';
    private const FIELD_TRAINER_ID = 'trainer_id';
    private const FIELD_NAME = 'name';
    private const FIELD_REGION = 'region';
    private const FIELD_BADGE_COUNT = 'badge_count';
    private const FIELD_USER_ID  = 'user_id';
    private const FK_USER = 'fk_user';
    private const FOREIGN_TABLE_NAME = 'user';
    private const FOREIGN_FIELD_USER_ID = 'id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                self::FIELD_TRAINER_ID => $this
                    ->primaryKey(),
                self::FIELD_USER_ID => $this
                    ->integer(),
                self::FIELD_NAME => $this
                    ->string()
                    ->notNull(),
                self::FIELD_REGION => $this
                    ->string()
                    ->notNull(),
                self::FIELD_BADGE_COUNT => $this
                    ->integer()
                    ->notNull(),
            ]
        );
        $this->addForeignKey(
            self::FK_USER,
            self::TABLE_NAME,
            self::FIELD_USER_ID,
            self::FOREIGN_TABLE_NAME,
            self::FOREIGN_FIELD_USER_ID,
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::FK_USER, self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);
    }
}
