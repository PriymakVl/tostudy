<?php

use yii\db\Migration;

/**
 * Class m200625_181700_add_col_meta_tab_cities
 */
class m200625_181700_add_col_meta_tab_cities extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tbl_cities', 'col_meta_title', $this->string(255));
        $this->addColumn('tbl_cities', 'col_meta_description', $this->string(255));
        $this->addColumn('tbl_cities', 'col_meta_keywords', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_cities', 'col_meta_title');
        $this->dropColumn('tbl_cities', 'col_meta_description');
        $this->dropColumn('tbl_cities', 'col_meta_keywords');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200625_181700_add_col_meta_tab_cities cannot be reverted.\n";

        return false;
    }
    */
}
