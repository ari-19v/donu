<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int|null $idRole
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property string|null $celular
 * @property string|null $direccion
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 *
 * @property Roles $idRole0
 * @property Pedidos[] $pedidos
 * @property Pedidos[] $pedidos0
 * @property Pedidos[] $pedidos1
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idRole', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'celular', 'direccion', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['idRole'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['idRole' => 'idRole']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idRole' => 'Id Role',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'celular' => 'Celular',
            'direccion' => 'Direccion',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
        ];
    }

    /**
     * Gets query for [[IdRole0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdRole0()
    {
        return $this->hasOne(Roles::className(), ['idRole' => 'idRole']);
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::className(), ['idCliente' => 'id']);
    }

    /**
     * Gets query for [[Pedidos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos0()
    {
        return $this->hasMany(Pedidos::className(), ['idMensajero' => 'id']);
    }

    /**
     * Gets query for [[Pedidos1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos1()
    {
        return $this->hasMany(Pedidos::className(), ['idRepartidor' => 'id']);
    }
}
