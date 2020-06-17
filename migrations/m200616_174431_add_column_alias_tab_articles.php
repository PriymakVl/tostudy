<?php

use yii\db\Migration;

/**
 * Class m200616_174431_add_column_alias_tab_articles
 */
class m200616_174431_add_column_alias_tab_articles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tbl_articles', 'col_alias', $this->string()->after('col_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_articles', 'col_alias');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200616_174431_add_column_alias_tab_articles cannot be reverted.\n";

        return false;
    }
    */
}
