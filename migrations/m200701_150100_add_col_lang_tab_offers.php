<?php

use yii\db\Migration;

/**
 * Class m200701_150100_add_col_lang_tab_offers
 */
class m200701_150100_add_col_lang_tab_offers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tbl_offers', 'col_lang', $this->integer(2)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_offers', 'col_lang');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200701_150100_add_col_lang_tab_offers cannot be reverted.\n";

        return false;
    }
    */
}
