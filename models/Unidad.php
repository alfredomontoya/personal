<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unidad".
 *
 * @property int $id_unidad
 * @property string $nombre_uni
 * @property string $estado_uni
 * @property int $id_departamento_uni
 */
class Unidad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unidad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_uni', 'estado_uni', 'id_departamento_uni'], 'required'],
            [['id_departamento_uni'], 'integer'],
            [['nombre_uni'], 'string', 'max' => 128],
            [['estado_uni'], 'string', 'max' => 2],
            [['id_departamento_uni'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['id_departamento_uni' => 'id_departamento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_unidad' => 'Id Unidad',
            'nombre_uni' => 'Nombre Uni',
            'estado_uni' => 'Estado Uni',
            'id_departamento_uni' => 'Id Departamento Uni',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamentoUni()
    {
        return $this->hasOne(Departamento::className(), ['id_departamento' => 'id_departamento_uni']);
    }
}
