<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "estado_pedidos".
 *
 * @property int $idEstado
 * @property string|null $Nombre
 *
 * @property Pedidos[] $pedidos
 */
class EstadoPedidos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estado_pedidos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre'], 'string', 'max' => 200],
            [['Nombre'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idEstado' => 'Id Estado',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::className(), ['idEstado' => 'idEstado']);
    }
}
