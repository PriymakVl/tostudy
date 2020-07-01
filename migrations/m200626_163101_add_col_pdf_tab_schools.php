<?php

use yii\db\Migration;

/**
 * Class m200626_163101_add_col_pdf_tab_schools
 */
class m200626_163101_add_col_pdf_tab_schools extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tbl_schools', 'col_pdf', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_schools', 'col_pdf');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200626_163101_add_col_pdf_tab_schools cannot be reverted.\n";

        return false;
    }
    */
}
