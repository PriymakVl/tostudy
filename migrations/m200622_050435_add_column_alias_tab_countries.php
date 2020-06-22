<?php

use yii\db\Migration;

/**
 * Class m200622_050435_add_column_alias_tab_countries
 */
class m200622_050435_add_column_alias_tab_countries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tbl_countries', 'col_alias', $this->string()->after('col_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_countries', 'col_alias');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200622_050435_add_column_alias_tab_countries cannot be reverted.\n";

        return false;
    }
    */
}
