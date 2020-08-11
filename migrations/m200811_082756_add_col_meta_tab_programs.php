<?php

use yii\db\Migration;

/**
 * Class m200811_082756_add_col_meta_tab_programs
 */
class m200811_082756_add_col_meta_tab_programs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tbl_programs', 'col_meta_title', $this->string());
        $this->addColumn('tbl_programs', 'col_meta_description', $this->string());
        $this->addColumn('tbl_programs', 'col_meta_keywords', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_programs', 'col_meta_title');
        $this->dropColumn('tbl_programs', 'col_meta_description');
        $this->dropColumn('tbl_programs', 'col_meta_keywords');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200811_082756_add_col_meta_tab_programs cannot be reverted.\n";

        return false;
    }
    */
}
