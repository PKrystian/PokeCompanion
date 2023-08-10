<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%evolutions}}`.
 */
class m230810_202113_create_evolutions_table extends Migration
{
    private const TABLE_NAME = 'evolutions';
    private const FIELD_EVOLUTION_ID = 'evolution_id';
    private const FIELD_BASE_POKEMON_ID = 'base_pokemon_id';
    private const FIELD_EVOLVED_POKEMON_ID = 'evolved_pokemon_id';
    private const FIELD_METHOD = 'method';
    private const FIELD_CONDITION = 'condition';
    private const FK_BASE = 'fk_base';
    private const FK_EVOLVED = 'fk_evolved';
    private const FOREIGN_TABLE_NAME = 'pokemon';
    private const FOREIGN_FIELD_POKEMON_ID = 'pokemon_id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                self::FIELD_EVOLUTION_ID => $this->primaryKey(),
                self::FIELD_BASE_POKEMON_ID => $this->integer(),
                self::FIELD_EVOLVED_POKEMON_ID => $this->integer(),
                self::FIELD_METHOD => $this->string()->notNull(),
                self::FIELD_CONDITION => $this->string()->notNull(),
            ]
        );
        $this->addForeignKey(
            self::FK_BASE,
            self::TABLE_NAME,
            self::FIELD_BASE_POKEMON_ID,
            self::FOREIGN_TABLE_NAME,
            self::FOREIGN_FIELD_POKEMON_ID,
            'SET NULL'
        );
        $this->addForeignKey(
            self::FK_EVOLVED,
            self::TABLE_NAME,
            self::FIELD_EVOLVED_POKEMON_ID,
            self::FOREIGN_TABLE_NAME,
            self::FOREIGN_FIELD_POKEMON_ID,
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::FK_BASE, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_EVOLVED, self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);
    }
}
