<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "documento".
 *
 * @property int $id_documento
 * @property string $nombre_doc
 * @property string $sigla_doc
 * @property string $estado_doc
 *
 * @property Detalledocumento[] $detalledocumentos
 */
class Documento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_doc', 'estado_doc'], 'required'],
            [['nombre_doc'], 'string', 'max' => 64],
            [['sigla_doc'], 'string', 'max' => 8],
            [['estado_doc'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_documento' => 'Id Documento',
            'nombre_doc' => 'Nombre',
            'sigla_doc' => 'Sigla',
            'estado_doc' => 'Estado Doc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalledocumentos()
    {
        return $this->hasMany(Detalledocumento::className(), ['id_documento_dd' => 'id_documento']);
    }
}
