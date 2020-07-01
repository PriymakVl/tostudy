<?php

use yii\db\Migration;

/**
 * Class m200629_143320_tab_city_text
 */
class m200629_143320_tab_city_text extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tbl_city_texts', [
 
            'col_id' => $this->primaryKey(),
 
            'col_city_id' => $this->integer()->notNull(),
 
            'col_text_top' => $this->text(),
            
            'col_text_bottom' => $this->text(),
 
            'col_prog' => $this->smallInteger(1)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tbl_city_texts');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200629_143320_tab_city_text cannot be reverted.\n";

        return false;
    }
    */
}
