<?php

use yii\db\Migration;

/**
 * Class m200707_042626_add_tab_programs
 */
class m200707_042626_add_tab_programs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tbl_programs', [
 
            'id' => $this->primaryKey(),
         
            'col_name' => $this->string()->notNull()->unique(),

            'col_alias' => $this->string()->notNull()->unique(),
         
            'col_key' => $this->smallInteger(2),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tbl_programs');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200707_042626_add_tab_programs cannot be reverted.\n";

        return false;
    }
    */
}
