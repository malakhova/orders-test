<?php

use yii\db\Migration;

/**
 * Class m200502_113230_init_db
 */
class m200502_113230_init_db extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(file_get_contents(__DIR__ . '/dumps/test_db.sql'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }
}
