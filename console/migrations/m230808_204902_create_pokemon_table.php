<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pokemon}}`.
 */
class m230808_204902_create_pokemon_table extends Migration
{
    private const TABLE_NAME = 'pokemon';
    private const FIELD_POKEMON_ID = 'pokemon_id';
    private const FIELD_NAME = 'name';
    private const FIELD_HEIGHT = 'height';
    private const FIELD_WEIGHT = 'weight';
    private const FIELD_BASE_EXPERIENCE = 'base_experience';
    private const FIELD_TYPE_ONE = 'type_one';
    private const FIELD_TYPE_TWO = 'type_two';
    private const FIELD_ABILITY = 'ability';
    private const FIELD_HIT_POINTS = 'hit_points';
    private const FIELD_ATTACK = 'attack';
    private const FIELD_DEFENSE = 'defense';
    private const FIELD_SPECIAL_ATTACK = 'special_attack';
    private const FIELD_SPECIAL_DEFENSE = 'special_defense';
    private const FIELD_SPEED = 'speed';
    private const FIELD_EVOLVES_FROM = 'evolves_from';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                self::FIELD_POKEMON_ID => $this->primaryKey(),
                self::FIELD_NAME => $this->string()->notNull(),
                self::FIELD_HEIGHT => $this->float()->notNull(),
                self::FIELD_WEIGHT => $this->float()->notNull(),
                self::FIELD_BASE_EXPERIENCE => $this->integer()->notNull(),
                self::FIELD_TYPE_ONE => $this->integer(),
                self::FIELD_TYPE_TWO => $this->integer(),
                self::FIELD_ABILITY => $this->string()->notNull(),
                self::FIELD_HIT_POINTS => $this->integer()->notNull(),
                self::FIELD_ATTACK => $this->integer()->notNull(),
                self::FIELD_DEFENSE => $this->integer()->notNull(),
                self::FIELD_SPECIAL_ATTACK => $this->integer(),
                self::FIELD_SPECIAL_DEFENSE => $this->integer(),
                self::FIELD_SPEED => $this->integer()->notNull(),
                self::FIELD_EVOLVES_FROM => $this->integer(),
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
