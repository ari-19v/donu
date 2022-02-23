<?php

use yii\db\Migration;

/**
 * Class m220220_141751_pedidos
 */
class m220220_141751_pedidos extends Migration
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

        $this->createTable('{{%pedidos}}', [
            'idPedido' => $this->primaryKey(),
            'idCliente' => $this->integer(),
            'idEncargado' => $this->integer(),
            'idMensajero' => $this->integer(),
            'idRepartidor' => $this->integer(),
            'idEstado' => $this->integer(),         
            'rireccion' => $this->string(),           
                  ], $tableOptions);

           
            $this->addForeignKey('FK_cli_donu', 'pedidos', 'idCliente', 'User', 'id');
            $this->addForeignKey('FK_mens_donu', 'pedidos', 'idMensajero', 'User', 'id');
            $this->addForeignKey('FK_encar_donu', 'pedidos', 'idEncargado', 'User', 'id');
            $this->addForeignKey('FK_rep_donu', 'pedidos', 'idRepartidor', 'User', 'id');
            $this->addForeignKey('FK_esta_donu', 'pedidos', 'idEstado', 'estado_pedidos', 'idEstado');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
        $this->dropForeignKey('FK_cli_donu', 'pedidos');
        $this->dropForeignKey('FK_mens_donu', 'pedidos');
        $this->dropForeignKey('FK_encar_donu', 'pedidos');
        $this->dropForeignKey('FK_rep_donu', 'pedidos');
        $this->dropForeignKey('FK_esta_donu', 'pedidos');
      
        $this->dropTable('{{%pedidos}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220220_141751_pedidos cannot be reverted.\n";

        return false;
    }
    */
}
