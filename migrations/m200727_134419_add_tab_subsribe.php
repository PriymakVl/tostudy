<?php

use yii\db\Migration;

/**
 * Class m200727_134419_add_tab_subsribe
 */
class m200727_134419_add_tab_subsribe extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tbl_subscribers', [
 
            'col_id' => $this->primaryKey(),
         
            'col_name' => $this->string(),

            'col_email' => $this->string()->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
         $this->dropTable('tbl_subscribers');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200727_134419_add_tab_subsribe cannot be reverted.\n";

        return false;
    }
    */
}
