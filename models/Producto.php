<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbproducto".
 *
 * @property int $id_producto
 * @property int $id_clase_pro
 * @property string $codigo_pro
 * @property string $descripcion_pro
 * @property double $precio_pro
 * @property int $stock_pro
 * @property int $stockmax_pro
 * @property int $stockmin_pro
 * @property resource $foto_pro
 * @property string $fecha_pro
 * @property string $estado_pro
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbproducto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_clase_pro', 'stock_pro', 'stockmax_pro', 'stockmin_pro'], 'integer'],
            [['codigo_pro', 'descripcion_pro', 'precio_pro', 'stock_pro', 'stockmax_pro', 'stockmin_pro'], 'required'],
            [['precio_pro'], 'number'],
            [['foto_pro'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['fecha_pro'], 'safe'],
            [['codigo_pro', 'descripcion_pro'], 'string', 'max' => 512],
            [['estado_pro'], 'string', 'max' => 2],
            [['codigo_pro'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'id_clase_pro' => 'Id Clase Pro',
            'codigo_pro' => 'Codigo Pro',
            'descripcion_pro' => 'Descripcion Pro',
            'precio_pro' => 'Precio Pro',
            'stock_pro' => 'Stock Pro',
            'stockmax_pro' => 'Stockmax Pro',
            'stockmin_pro' => 'Stockmin Pro',
            'foto_pro' => 'Foto Pro',
            'fecha_pro' => 'Fecha Pro',
            'estado_pro' => 'Estado Pro',
        ];
    }
}
