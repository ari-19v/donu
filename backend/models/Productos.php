<?php

namespace backend\models;

use Yii;

use yii\web\uploadedFile;
use yii\base\Model;
use dosamigos\fileinput\FileInput;
use Imagine\Image\ManipulatorInterface;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use yii\imagine\Image;


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
     * @var UploadedFile
     */
    public $imagenFile;
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
    public function getIcon(){
        return '/uploads/thumbs/' . $this->imagen;
    }

    public function getFullImage(){
        return '/uploads/thumbs/' . $this->imagen;
    }

    public function removeOldPreviews(){
        if ($this->imagen){
            @unlink(getcwd() . '/uploads/' . $this->imagen);
            @unlink(getcwd() . '/uploads/thumbs/' . $this->imagen);
        }
    }

    public function upload()
    {
        if ($this->validate()) {
            if ($this->imagenFile){
                $this->removeOldPreviews();
                $this->imagen = uniqid($this->imagenFile->baseName) . '.' . $this->imagenFile->extension;
                $this->imagenFile->saveAs('uploads/' . $this->imagen);
                Image::thumbnail('uploads/' . $this->imagen, 100, 100, ManipulatorInterface::THUMBNAIL_OUTBOUND)
                    ->save('uploads/thumbs/' . $this->imagen, ['quality' => 50]);
            }
            return true;
        } else {
            return false;
        }
    }


    // public function upload()
    // {
    //     if ($this->validate()) {
    //         $this->imagen->saveAs('uploads/' . $this->imagen->baseName . '.' . $this->imagen->extension);
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    
}
