<?php

use yii\db\Migration;

/**
 * Class m200702_040746_add_col_meta_en_tab_schools
 */
class m200702_040746_add_col_meta_en_tab_schools extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tbl_schools', 'col_meta_title_en', $this->string(255));
        $this->addColumn('tbl_schools', 'col_meta_description_en', $this->string(255));
        $this->addColumn('tbl_schools', 'col_meta_keywords_en', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_schools', 'col_meta_title_en');
        $this->dropColumn('tbl_schools', 'col_meta_description_en');
        $this->dropColumn('tbl_schools', 'col_meta_keywords_en');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200702_040746_add_col_meta_en_tab_schools cannot be reverted.\n";

        return false;
    }
    */
}
