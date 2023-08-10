<?php

use yii\db\Migration;

/**
 * Class m230810_221735_delete_evolves_from_column_from_pokemon_table
 */
class m230810_221735_delete_evolves_from_column_from_pokemon_table extends Migration
{
    
    private const TABLE_NAME = 'pokemon';
    private const FIELD_EVOLVES_FROM = 'evolves_from';
    private const FK_NAME = 'fk_pokemon_evolves_from';
    private const FIELD_POKEMON_ID = 'pokemon_id';

    /**
     * {@inheritdoc}
     * 
     */
    public function safeUp() 
    {
    
        if ($this->db->getTableSchema(self::TABLE_NAME)->foreignKeys) {
            $this->dropForeignKey(self::FK_NAME, self::TABLE_NAME);
        }

        if ($this->db->getTableSchema(self::TABLE_NAME)->getColumn(self::FIELD_EVOLVES_FROM)) {
            $this->dropColumn(self::TABLE_NAME, self::FIELD_EVOLVES_FROM);
        }
    }

    /**
     * {@inheritdoc}
     * @skip
     */
    public function safeDown()
    {
        if (!$this->db->getTableSchema(self::TABLE_NAME)->getColumn(self::FIELD_EVOLVES_FROM)) {
            $this->addColumn(self::TABLE_NAME, self::FIELD_EVOLVES_FROM, $this->integer());
        }

        if (!$this->db->getTableSchema(self::TABLE_NAME)->foreignKeys) {
            $this->addForeignKey(
                self::FK_NAME,
                self::TABLE_NAME,
                self::FIELD_EVOLVES_FROM,
                self::TABLE_NAME,
                self::FIELD_POKEMON_ID,
                'SET NULL'
            );
        }
    }
}