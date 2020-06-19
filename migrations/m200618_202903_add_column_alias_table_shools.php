<?php

use yii\db\Migration;

/**
 * Class m200618_202903_add_column_alias_table_shools
 */
class m200618_202903_add_column_alias_table_shools extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tbl_schools', 'col_alias', $this->string()->after('col_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_schools', 'col_alias');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200618_202903_add_column_alias_table_shools cannot be reverted.\n";

        return false;
    }
    */
}
