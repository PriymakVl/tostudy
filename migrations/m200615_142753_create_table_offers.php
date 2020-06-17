<?php

use yii\db\Migration;

/**
 * Class m200615_142753_create_table_offers
 */
class m200615_142753_create_table_offers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tbl_offers', [
 
            'col_id' => $this->primaryKey(),
 
            'col_title_ru' => $this->string()->notNull(),
 
            'col_text_ru' => $this->text(),

            'col_alias' => $this->string()->notNull()->unique(),

            'col_img' => $this->string(100),
            
            'col_img_big' => $this->string(100),
 
            'col_date' => $this->date(),
 
            'col_status' => $this->smallInteger(1),
]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tbl_offers');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200615_142753_create_table_offers cannot be reverted.\n";

        return false;
    }
    */
}
