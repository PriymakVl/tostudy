<?php

use yii\db\Migration;

/**
 * Class m200707_090649_add_col_pro_id_tab_courses
 */
class m200707_090649_add_col_pro_id_tab_courses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tbl_courses', 'col_prog_id', $this->integer()->notNull()->after('col_school_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tbl_courses', 'col_prog_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200707_090649_add_col_pro_id_tab_courses cannot be reverted.\n";

        return false;
    }
    */
}
