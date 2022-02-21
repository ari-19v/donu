<?php

use yii\db\Migration;

/**
 * Class m220220_170311_detalle_pedido
 */
class m220220_170311_detalle_pedido extends Migration
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

        $this->createTable('{{%detalle_pedido}}', [
            'idDetallePedido' => $this->primaryKey(),
            'idPedido' => $this->integer(),
            'idProducto' => $this->integer(),                   
            'cantidad' => $this->integer(),           
                  ], $tableOptions);

           
            $this->addForeignKey('FK_pedi_detalle', 'detalle_pedido', 'idPedido', 'Pedidos', 'idPedido');
            $this->addForeignKey('FK_prod_detalle', 'detalle_pedido', 'idProducto', 'Productos', 'idProducto');
         
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
         
        $this->dropForeignKey('FK_cli_pedi', 'detalle_pedido');
        $this->dropForeignKey('FK_prod_detalle', 'detalle_pedido');     
      
        $this->dropTable('{{%detalle_pedido}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220220_170311_detalle_pedido cannot be reverted.\n";

        return false;
    }
    */
}
