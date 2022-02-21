<?php

use yii\db\Migration;

/**
 * Class m220218_214011_roles
 */
class m220218_214011_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%Roles}}', [
            'idRole' => $this->primaryKey(),
            'Nombre' => $this->string(200)->unique(),
                  ], $tableOptions);
                 

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Roles}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220218_214011_roles cannot be reverted.\n";

        return false;
    }
    */
}
