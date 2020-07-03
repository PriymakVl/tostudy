<?php

use yii\db\Migration;

/**
 * Class m200703_054511_rename_tab_text_cities_in_text_countries
 */
class m200703_054511_rename_tab_text_cities_in_text_countries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('tbl_city_texts', 'tbl_country_texts');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameTable('tbl_country_texts', 'tbl_city_texts');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200703_054511_rename_tab_text_cities_in_text_countries cannot be reverted.\n";

        return false;
    }
    */
}
