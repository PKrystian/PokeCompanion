<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%teams}}`.
 */
class m230815_152554_create_teams_table extends Migration
{
    private const TABLE_NAME = 'teams';
    private const FIELD_TEAM_ID = 'team_id';
    private const FIELD_TRAINER_ID = 'trainer_id';
    private const FIELD_POKEMON_1_ID = 'pokemon_1_id';
    private const FIELD_POKEMON_2_ID = 'pokemon_2_id';
    private const FIELD_POKEMON_3_ID = 'pokemon_3_id';
    private const FIELD_POKEMON_4_ID = 'pokemon_4_id';
    private const FIELD_POKEMON_5_ID = 'pokemon_5_id';
    private const FIELD_POKEMON_6_ID = 'pokemon_6_id';
    private const FOREIGN_TABLE_NAME_1 = 'trainers';
    private const FOREIGN_FIELD_TRAINER_ID = 'trainer_id';
    private const FK_TRAINERS = 'fk_trainers';
    private const FOREIGN_TABLE_NAME_2 = 'pokemon';
    private const FOREIGN_FIELD_POKEMON_ID = 'pokemon_id';
    private const FK_POKEMON_1 = 'fk_pokemon_1';
    private const FK_POKEMON_2 = 'fk_pokemon_2';
    private const FK_POKEMON_3 = 'fk_pokemon_3';
    private const FK_POKEMON_4 = 'fk_pokemon_4';
    private const FK_POKEMON_5 = 'fk_pokemon_5';
    private const FK_POKEMON_6 = 'fk_pokemon_6';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            self::TABLE_NAME,
            [
                self::FIELD_TEAM_ID => $this
                    ->primaryKey(),
                self::FIELD_TRAINER_ID => $this
                    ->integer(),
                self::FIELD_POKEMON_1_ID => $this
                    ->integer(),
                self::FIELD_POKEMON_2_ID => $this
                    ->integer(),
                self::FIELD_POKEMON_3_ID => $this
                    ->integer(),
                self::FIELD_POKEMON_4_ID => $this
                    ->integer(),
                self::FIELD_POKEMON_5_ID => $this
                    ->integer(),
                self::FIELD_POKEMON_6_ID => $this
                    ->integer(),
            ]
        );
        $this->addForeignKey(
            self::FK_TRAINERS,
            self::TABLE_NAME,
            self::FIELD_TRAINER_ID,
            self::FOREIGN_TABLE_NAME_1,
            self::FOREIGN_FIELD_TRAINER_ID,
            'SET NULL'
        );
        $this->addForeignKey(
            self::FK_POKEMON_1,
            self::TABLE_NAME,
            self::FIELD_POKEMON_1_ID,
            self::FOREIGN_TABLE_NAME_2,
            self::FOREIGN_FIELD_POKEMON_ID,
            'SET NULL'
        );
        $this->addForeignKey(
            self::FK_POKEMON_2,
            self::TABLE_NAME,
            self::FIELD_POKEMON_2_ID,
            self::FOREIGN_TABLE_NAME_2,
            self::FOREIGN_FIELD_POKEMON_ID,
            'SET NULL'
        );
        $this->addForeignKey(
            self::FK_POKEMON_3,
            self::TABLE_NAME,
            self::FIELD_POKEMON_3_ID,
            self::FOREIGN_TABLE_NAME_2,
            self::FOREIGN_FIELD_POKEMON_ID,
            'SET NULL'
        );
        $this->addForeignKey(
            self::FK_POKEMON_4,
            self::TABLE_NAME,
            self::FIELD_POKEMON_4_ID,
            self::FOREIGN_TABLE_NAME_2,
            self::FOREIGN_FIELD_POKEMON_ID,
            'SET NULL'
        );
        $this->addForeignKey(
            self::FK_POKEMON_5,
            self::TABLE_NAME,
            self::FIELD_POKEMON_5_ID,
            self::FOREIGN_TABLE_NAME_2,
            self::FOREIGN_FIELD_POKEMON_ID,
            'SET NULL'
        );
        $this->addForeignKey(
            self::FK_POKEMON_6,
            self::TABLE_NAME,
            self::FIELD_POKEMON_6_ID,
            self::FOREIGN_TABLE_NAME_2,
            self::FOREIGN_FIELD_POKEMON_ID,
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::FK_TRAINERS, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_POKEMON_1, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_POKEMON_2, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_POKEMON_3, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_POKEMON_4, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_POKEMON_5, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_POKEMON_6, self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);
    }
}
