<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imagenes".
 *
 * @property int $id_imagen
 * @property string $nombre_im
 * @property resource $datos_im
 * @property string $fecha_im
 * @property string $estado_im
 */
class Imagenes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    
    public $archivo;
    
    public static function tableName()
    {
        return 'imagenes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_im'], 'safe'],
            [['nombre_im'], 'string', 'max' => 32],
            [['estado_im'], 'string', 'max' => 2],
            [['archivo'], 'file', 
                'skipOnEmpty' => false,
                'on' => 'update',
                'uploadRequired' => 'No has seleccionado ningún archivo', //Error
                'maxSize' => 1024*1024*1, //1 MB
                'tooBig' => 'El tamaño máximo permitido es 1MB', //Error
                'minSize' => 10, //10 Bytes
                'tooSmall' => 'El tamaño mínimo permitido son 10 BYTES', //Error
                'extensions' => 'pdf, txt, doc, jpg, mp4',
                'wrongExtension' => 'El archivo {file} no contiene una extensión permitida {extensions}', //Error
                'maxFiles' => 4,
                'tooMany' => 'El máximo de archivos permitidos son {limit}', //Error
                ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_imagen' => 'Id Imagen',
            'nombre_im' => 'Nombre Im',
            'fecha_im' => 'Fecha Im',
            'estado_im' => 'Estado Im',
            'archivo' => 'Cargar imagen',
        ];
    }
    
    function scenario()
    {
        return [
            'create' => ['archivo', 'nombre_im','archivo'],
            'update' => ['archivo', 'nombre_im'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) { 
            //foreach ($this->archivo as $file) {
                $this->archivo->saveAs('archivos/' . $this->id_imagen . '.' . $this->archivo->extension);
            //}
            return true;
        } else {
            return false;
        }
    }
}
