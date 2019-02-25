<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detallegrado".
 *
 * @property int $id_detallegrado
 * @property int $id_policia_dg
 * @property int $id_grado_dg
 * @property string $glosa_dg
 * @property string $fechaascenso_dg
 * @property string $fecha_dg
 * @property string $estado_dg
 */
class Detallegrado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detallegrado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_policia_dg', 'id_grado_dg', 'glosa_dg', 'fecha_dg', 'estado_dg', 'fechaascenso_dg', ], 'required'],
            [['id_policia_dg', 'id_grado_dg'], 'integer'],
            [['fecha_dg'], 'safe'],
            [['glosa_dg'], 'string', 'max' => 256],
            [['estado_dg'], 'string', 'max' => 2],
            [['id_policia_dg'], 'exist', 'skipOnError' => true, 'targetClass' => Policia::className(), 'targetAttribute' => ['id_policia_dg' => 'id_policia']],
            [['id_grado_dg'], 'exist', 'skipOnError' => true, 'targetClass' => Grado::className(), 'targetAttribute' => ['id_grado_dg' => 'id_grado']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_detallegrado' => 'Id Detallegrado',
            'id_policia_dg' => 'Id Policia Dg',
            'id_grado_dg' => 'Id Grado Dg',
            'glosa_dg' => 'Glosa Dg',
            'fechaascenso_dg' => 'Fechaascenso Dg',
            'fecha_dg' => 'Fecha Dg',
            'estado_dg' => 'Estado',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoliciaDg()
    {
        return $this->hasOne(Policia::className(), ['id_policia' => 'id_policia_dg']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGradoDg()
    {
        return $this->hasOne(Grado::className(), ['id_grado' => 'id_grado_dg']);
    }
}
