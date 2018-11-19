<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id_usuario
 * @property string $ci_us
 * @property string $nombre_us
 * @property string $direccion_us
 * @property string $telefono_us
 * @property string $username_us
 * @property string $email_us
 * @property string $password_us
 * @property string $authKey_us
 * @property string $accessToken_us
 * @property int $activate_us
 *
 * @property Tramite[] $tramites
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ci_us', 'nombre_us', 'username_us', 'email_us', 'password_us', 'authKey_us', 'accessToken_us'], 'required'],
            [['activate_us'], 'integer'],
            [['ci_us'], 'string', 'max' => 16],
            [['nombre_us'], 'string', 'max' => 128],
            [['direccion_us'], 'string', 'max' => 256],
            [['telefono_us'], 'string', 'max' => 32],
            [['username_us'], 'string', 'max' => 50],
            [['email_us'], 'string', 'max' => 80],
            [['password_us', 'authKey_us', 'accessToken_us'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'ci_us' => 'Ci Us',
            'nombre_us' => 'Nombre Us',
            'direccion_us' => 'Direccion Us',
            'telefono_us' => 'Telefono Us',
            'username_us' => 'Username Us',
            'email_us' => 'Email Us',
            'password_us' => 'Password Us',
            'authKey_us' => 'Auth Key Us',
            'accessToken_us' => 'Access Token Us',
            'activate_us' => 'Activate Us',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTramites()
    {
        return $this->hasMany(Tramite::className(), ['id_usuario_tra' => 'id_usuario']);
    }
}
