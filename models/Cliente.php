<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id_cliente
 * @property string $nitci_cli
 * @property string $nombre_cli
 * @property string $direccion_cli
 * @property string $telefono_cli
 * @property string $estado_cli
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nitci_cli', 'nombre_cli', 'direccion_cli'], 'required'],
            [['nitci_cli'], 'string', 'max' => 16],
            [['nombre_cli'], 'string', 'max' => 64],
            [['direccion_cli'], 'string', 'max' => 128],
            [['telefono_cli'], 'string', 'max' => 32],
            [['correo_cli'], 'string', 'max' => 64],
            [['correo_cli'], 'email', 'message' => 'formato de correo incorrecto ej: nombre@correo.com'],
            [['estado_cli'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Id Cliente',
            'nitci_cli' => 'Nit o Cedula Identidad',
            'nombre_cli' => 'Nombres y apellidos',
            'direccion_cli' => 'Direccion',
            'telefono_cli' => 'Telefono',
            'correo_cli' => 'Correo',
            'estado_cli' => 'Estado Cli',
        ];
    }
}
