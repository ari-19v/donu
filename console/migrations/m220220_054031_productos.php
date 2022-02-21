<?php

use yii\db\Migration;

/**
 * Class m220220_054031_productos
 */
class m220220_054031_productos extends Migration
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
            'idProducto' => $this->primaryKey(),
            'nombre' => $this->string(200)->unique(),
            'descripcion' => $this->string(),
            'precio' => $this->string(),
            'imagen' => $this->string(),
                  ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%productos}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220220_054031_productos cannot be reverted.\n";

        return false;
    }
    */
}
