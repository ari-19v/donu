<?php

use yii\db\Migration;

/**
 * Class m220220_141529_estado_pedidos
 */
class m220220_141529_estado_pedidos extends Migration
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

        $this->createTable('{{%estado_pedidos}}', [
            'idEstado' => $this->primaryKey(),
            'Nombre' => $this->string(200)->unique(), //despachado, entregado, revisado, regresado,cancelado.
                  ], $tableOptions);
                 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%estado_pedidos}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220220_141529_estado_pedidos cannot be reverted.\n";

        return false;
    }
    */
}
