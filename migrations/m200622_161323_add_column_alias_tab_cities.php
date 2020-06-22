<?php

use yii\db\Migration;

/**
 * Class m200622_161323_add_column_alias_tab_cities
 */
class m200622_161323_add_column_alias_tab_cities extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    	 $this->addColumn('tbl_cities', 'col_alias', $this->string()->after('col_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_cities', 'col_alias');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200622_161323_add_column_alias_tab_cities cannot be reverted.\n";

        return false;
    }
    */
}
