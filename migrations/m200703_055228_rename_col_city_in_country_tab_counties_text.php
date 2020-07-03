<?php

use yii\db\Migration;

/**
 * Class m200703_055228_rename_col_city_in_country_tab_counties_text
 */
class m200703_055228_rename_col_city_in_country_tab_counties_text extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('tbl_country_texts', 'col_city_id', 'col_country_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('tbl_country_texts', 'col_country_id', 'col_city_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200703_055228_rename_col_city_in_country_tab_counties_text cannot be reverted.\n";

        return false;
    }
    */
}
