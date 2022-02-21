<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detalle_pedido".
 *
 * @property int $idDetallePedido
 * @property int|null $idPedido
 * @property int|null $idProducto
 * @property int|null $cantidad
 *
 * @property Pedidos $idPedido0
 * @property Productos $idProducto0
 */
class DetallePedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalle_pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPedido', 'idProducto', 'cantidad'], 'integer'],
            [['idPedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedidos::className(), 'targetAttribute' => ['idPedido' => 'idPedido']],
            [['idProducto'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['idProducto' => 'idProducto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDetallePedido' => 'Id Detalle Pedido',
            'idPedido' => 'Id Pedido',
            'idProducto' => 'Id Producto',
            'cantidad' => 'Cantidad',
        ];
    }

    /**
     * Gets query for [[IdPedido0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdPedido0()
    {
        return $this->hasOne(Pedidos::className(), ['idPedido' => 'idPedido']);
    }

    /**
     * Gets query for [[IdProducto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducto0()
    {
        return $this->hasOne(Productos::className(), ['idProducto' => 'idProducto']);
    }
}
