<?php

use yii\db\Migration;

/**
 * Class m200623_075710_add_col_alias_tab_info
 */
class m200623_075710_add_col_alias_tab_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tbl_info', 'col_alias', $this->string()->after('col_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_info', 'col_alias');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200623_075710_add_col_alias_tab_info cannot be reverted.\n";

        return false;
    }
    */
}
