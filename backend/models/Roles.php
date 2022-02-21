<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property int $idRole
 * @property string|null $Nombre
 *
 * @property User[] $users
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
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
            'idRole' => 'Id Role',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['idRole' => 'idRole']);
    }
}
