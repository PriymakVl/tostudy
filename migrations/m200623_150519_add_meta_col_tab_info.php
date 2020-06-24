<?php

use yii\db\Migration;

/**
 * Class m200623_150519_add_meta_col_tab_info
 */
class m200623_150519_add_meta_col_tab_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tbl_info', 'col_meta_title', $this->string(255));
        $this->addColumn('tbl_info', 'col_meta_description', $this->string(255));
        $this->addColumn('tbl_info', 'col_meta_keywords', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_info', 'col_meta_title');
        $this->dropColumn('tbl_info', 'col_meta_description');
        $this->dropColumn('tbl_info', 'col_meta_keywords');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200623_150519_add_meta_col_tab_info cannot be reverted.\n";

        return false;
    }
    */
}
