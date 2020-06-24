<?php

use yii\db\Migration;

/**
 * Class m200624_041039_add_cols_meta_tab_articles
 */
class m200624_041039_add_cols_meta_tab_articles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tbl_articles', 'col_meta_title', $this->string(255));
        $this->addColumn('tbl_articles', 'col_meta_description', $this->string(255));
        $this->addColumn('tbl_articles', 'col_meta_keywords', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_articles', 'col_meta_title');
        $this->dropColumn('tbl_articles', 'col_meta_description');
        $this->dropColumn('tbl_articles', 'col_meta_keywords');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200624_041039_add_cols_meta_tab_articles cannot be reverted.\n";

        return false;
    }
    */
}
