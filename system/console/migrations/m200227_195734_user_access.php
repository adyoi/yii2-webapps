<?php

use yii\db\Migration;

/**
 * Class m200227_195734_user_access
 */
class m200227_195734_user_access extends Migration
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
        echo "m200227_195734_user_access cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200227_195734_user_access cannot be reverted.\n";

        return false;
    }
    */
}
