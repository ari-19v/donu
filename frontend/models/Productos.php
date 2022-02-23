<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $idProducto
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property string|null $precio
 * @property string|null $imagen
 *
 * @property DetallePedido[] $detallePedidos
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 200],
            [['descripcion', 'precio', 'imagen'], 'string', 'max' => 255],
            [['nombre'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProducto' => 'Id Producto',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'precio' => 'Precio',
            'imagen' => 'Imagen',
        ];
    }

    /**
     * Gets query for [[DetallePedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetallePedidos()
    {
        return $this->hasMany(DetallePedido::className(), ['idProducto' => 'idProducto']);
    }
}
