<?php

namespace backend\models;

use Yii;

use yii\web\uploadedFile;
use yii\base\Model;
use dosamigos\fileinput\FileInput;


/**
 * This is the model class for table "productos".
 *
 * @property int $idProducto
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property string|null $precio
 * @property string|null $imagen
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
            [['descripcion', 'precio','imagen'], 'string', 'max' => 255],
            [['nombre'], 'unique'],           
            [['imagen'], 'file', 'skipOnEmpty' => true,  'extensions' => 'png, jpg' ],
            // [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
           
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

    public function upload()
    {
        if ($this->validate()) {
            $this->imagen->saveAs('uploads/' . $this->imagen->baseName . '.' . $this->imagen->extension);
            return true;
        } else {
            return false;
        }
    }

    
}
