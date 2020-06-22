<?php

use yii\db\Migration;

/**
 * Class m200622_150537_add_column_alias_tab_lang
 */
class m200622_150537_add_column_alias_tab_lang extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tbl_languages', 'col_alias', $this->string()->after('col_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_languages', 'col_alias');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200622_150537_add_column_alias_tab_lang cannot be reverted.\n";

        return false;
    }
    */
}
