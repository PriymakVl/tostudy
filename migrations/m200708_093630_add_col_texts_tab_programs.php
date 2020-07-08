<?php

use yii\db\Migration;

/**
 * Class m200708_093630_add_col_texts_tab_programs
 */
class m200708_093630_add_col_texts_tab_programs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tbl_programs', 'col_text_top', $this->text());
        $this->addColumn('tbl_programs', 'col_text_bottom', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_programs', 'col_text_top');
        $this->dropColumn('tbl_programs', 'col_text_bottom');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200708_093630_add_col_texts_tab_programs cannot be reverted.\n";

        return false;
    }
    */
}
