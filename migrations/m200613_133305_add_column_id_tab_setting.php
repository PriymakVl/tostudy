<?php

use yii\db\Migration;

/**
 * Class m200613_133305_add_column_id_tab_setting
 */
class m200613_133305_add_column_id_tab_setting extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = 'ALTER TABLE `tbl_settings` ADD `col_id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`col_id`)';
        $this->execute($sql); 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_settings', 'col_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200613_133305_add_column_id_tab_setting cannot be reverted.\n";

        return false;
    }
    */
}
