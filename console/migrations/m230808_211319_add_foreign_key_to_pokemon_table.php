<?php

use yii\db\Migration;

/**
 * Class m230808_211319_add_foreign_key_to_pokemon_table
 */
class m230808_211319_add_foreign_key_to_pokemon_table extends Migration
{
    private const TABLE_NAME = 'pokemon';
    private const FIELD_POKEMON_ID = 'pokemon_id';
    private const FIELD_TYPE_ONE = 'type_one';
    private const FK_TYPE_ONE = 'fk_type_one';
    private const FIELD_TYPE_TWO = 'type_two';
    private const FK_TYPE_TWO = 'fk_type_two';
    private const FIELD_EVOLVES_FROM = 'evolves_from';
    private const FK_POKEMON_ID = 'fk_pokemon_id';
    private const FOREIGN_TABLE_NAME = 'types';
    private const FOREIGN_FIELD_TYPE_ID = 'type_id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            self::FK_TYPE_ONE,
            self::TABLE_NAME,
            self::FIELD_TYPE_ONE,
            self::FOREIGN_TABLE_NAME,
            self::FOREIGN_FIELD_TYPE_ID
        );
        $this->addForeignKey(
            self::FK_TYPE_TWO,
            self::TABLE_NAME,
            self::FIELD_TYPE_TWO,
            self::FOREIGN_TABLE_NAME,
            self::FOREIGN_FIELD_TYPE_ID,
            'SET NULL'
        );
        $this->addForeignKey(
            self::FK_POKEMON_ID,
            self::TABLE_NAME,
            self::FIELD_EVOLVES_FROM,
            self::TABLE_NAME,
            self::FIELD_POKEMON_ID,
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(self::FK_TYPE_ONE, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_TYPE_TWO, self::TABLE_NAME);
        $this->dropForeignKey(self::FK_POKEMON_ID, self::TABLE_NAME);
    }
}
