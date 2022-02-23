<?php

namespace backend\models;

use Yii;
use yii\web\uploadedFile;
use yii\base\Model;
use dosamigos\fileinput\FileInput;

/**
 * This is the model class for table "pedidos".
 *
 * @property int $idPedido
 * @property int|null $idCliente
 * @property int|null $idEncargado
 * @property int|null $idMensajero
 * @property int|null $idRepartidor
 * @property int|null $idEstado
 * @property string|null $rireccion
 *
 * @property User $idCliente0
 * @property EstadoPedidos $idEstado0
 * @property User $idMensajero0
 * @property User $idPedido0
 * @property User $idRepartidor0
 */
class Pedidos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedidos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCliente', 'idEncargado', 'idMensajero', 'idRepartidor', 'idEstado'], 'integer'],

            [['rireccion'], 'string', 'max' => 255],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idCliente' => 'id']],
            [['idEstado'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoPedidos::className(), 'targetAttribute' => ['idEstado' => 'idEstado']],
            [['idMensajero'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idMensajero' => 'id']],
            [['idPedido'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idPedido' => 'id']],
            [['idRepartidor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idRepartidor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            // 'idPedido' => 'Id Pedido',
            'idCliente' => 'Id Cliente',            
            'idEncargado' =>  Yii::t('app', 'Id Encargado'),
            'idMensajero' => 'Id Mensajero',
            'idRepartidor' => 'Id Repartidor',
            'idEstado' => 'Id Estado',
            'rireccion' => 'Rireccion',
        ];
    }

    public function beforeSave($insert){      
      
        $this->idEncargado=yii::$app->user->id;
        return true;
    }

    /**
     * Gets query for [[IdCliente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
    {
        return $this->hasOne(User::className(), ['id' => 'idCliente']);
    }

    /**
     * Gets query for [[IdEstado0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado0()
    {
        return $this->hasOne(EstadoPedidos::className(), ['idEstado' => 'idEstado']);
    }

    /**
     * Gets query for [[IdMensajero0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdMensajero0()
    {
        return $this->hasOne(User::className(), ['id' => 'idMensajero']);
    }

    /**
     * Gets query for [[IdPedido0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdPedido0()
    {
        return $this->hasOne(User::className(), ['id' => 'idPedido']);
    }

    /**
     * Gets query for [[IdRepartidor0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdRepartidor0()
    {
        return $this->hasOne(User::className(), ['id' => 'idRepartidor']);
    }

    public function getDetallePedido()
    {
        return $this->hasMany(DetallePedido::className(), ['idPedido' => 'idPedido']);
    }

   
}
