<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imagenes".
 *
 * @property int $id_imagen
 * @property string $nombre_im
 * @property string $direccion_im
 * @property string $fecha_im
 * @property string $estado_im
 */
class Imagen extends \yii\db\ActiveRecord
{
    public $archivo;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['archivo'], 'file', 
                'skipOnEmpty' => false,
                'on' => 'update-photo-upload',
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
            'imagen' => 'Cargar imagen',
        ];
    }
}
