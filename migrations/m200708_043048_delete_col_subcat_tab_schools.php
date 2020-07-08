<?php

use yii\db\Migration;

/**
 * Class m200708_043048_delete_col_subcat_tab_schools
 */
class m200708_043048_delete_col_subcat_tab_schools extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('tbl_schools', 'col_subcategory');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('tbl_schools', 'col_subcategory', $this->integer()); 
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200708_043048_delete_col_subcat_tab_schools cannot be reverted.\n";

        return false;
    }
    */
}
