<?php

use yii\db\Migration;

/**
 * Class m200227_195716_user
 */
class m200227_195716_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200227_195716_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200227_195716_user cannot be reverted.\n";

        return false;
    }
    */
}
