<?php

use yii\db\Migration;

/**
 * Class m220220_140345_pedidos
 */
class m220220_140345_pedidos extends Migration
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

        $this->createTable('{{%productos}}', [
            'idPedido' => $this->primaryKey(),
            'idCliente' => $this->integer(),
            'idMensajero' => $this->integer(),
            'idRepartidor' => $this->integer(),
            'estado'=> $this->smallInteger()->notNull()->defaultValue(1),    
            'rirecion-compra' => $this->string(),           
                  ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220220_140345_pedidos cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220220_140345_pedidos cannot be reverted.\n";

        return false;
    }
    */
}
