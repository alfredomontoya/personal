<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tramite".
 *
 * @property int $id_tramite
 * @property int $id_usuario_tra
 * @property int $id_cliente_tra
 * @property string $numero_tra
 * @property string $aduana_tra
 * @property string $procedencia_tra
 * @property string $proveedor_tra
 * @property int $cantidadbultos_tra
 * @property string $referencia_tra
 * @property double $peso_tra
 * @property string $regimen_tra
 * @property double $tipocambio_tra
 * @property string $mercancia_tra
 * @property string $docembarque_tra
 * @property string $partidaarancelaria_tra
 * @property double $valorfob_tra
 * @property double $fletes_tra
 * @property double $seguro_tra
 * @property double $otrosgastos_tra
 * @property double $valorcifsus_tra
 * @property double $valorcifbs_tra
 * @property string $estado_tra
 * @property string $glosa_tra
 * @property string $fecha_tra
 *
 * @property Usuario $usuarioTra
 * @property Cliente $clienteTra
 */
class Tramite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tramite';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente_tra', 'numero_tra', 'aduana_tra', 'procedencia_tra', 'proveedor_tra', 'cantidadbultos_tra', 'referencia_tra', 'peso_tra', 'regimen_tra', 'tipocambio_tra', 'mercancia_tra', 'docembarque_tra', 'partidaarancelaria_tra', 'valorfob_tra', 'fletes_tra', 'seguro_tra', 'otrosgastos_tra', 'valorcifsus_tra', 'valorcifbs_tra', 'estado_tra', 'glosa_tra'], 'required'],
            [['id_usuario_tra', 'id_cliente_tra', 'cantidadbultos_tra'], 'integer'],
            [['peso_tra', 'tipocambio_tra', 'valorfob_tra', 'fletes_tra', 'seguro_tra', 'otrosgastos_tra', 'valorcifsus_tra', 'valorcifbs_tra'], 'number'],
            [['fecha_tra'], 'safe'],
            [['numero_tra'], 'string', 'max' => 32],
            [['aduana_tra', 'procedencia_tra', 'proveedor_tra', 'referencia_tra', 'regimen_tra', 'mercancia_tra', 'docembarque_tra', 'partidaarancelaria_tra'], 'string', 'max' => 64],
            [['estado_tra'], 'string', 'max' => 2],
            [['glosa_tra'], 'string', 'max' => 256],
            [['id_usuario_tra'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario_tra' => 'id_usuario']],
            [['id_cliente_tra'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente_tra' => 'id_cliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tramite' => 'Id Tramite',
            'id_usuario_tra' => 'Usuario',
            'id_cliente_tra' => 'Cliente',
            'numero_tra' => 'Numero Tramite',
            'aduana_tra' => 'Aduana',
            'procedencia_tra' => 'Procedencia',
            'proveedor_tra' => 'Proveedor',
            'cantidadbultos_tra' => 'Cant. Bultos',
            'referencia_tra' => 'Referencia',
            'peso_tra' => 'Peso Kg.',
            'regimen_tra' => 'Regimen',
            'tipocambio_tra' => 'Tipo Cambio',
            'mercancia_tra' => 'Mercancia',
            'docembarque_tra' => 'Documento Embarque',
            'partidaarancelaria_tra' => 'Partida Arancelaria',
            'valorfob_tra' => 'Valor F.O.B',
            'fletes_tra' => 'Fletes I, II',
            'seguro_tra' => 'Seguro',
            'otrosgastos_tra' => 'Otros Gastos',
            'valorcifsus_tra' => 'Valor C.I.F ADUANA $us',
            'valorcifbs_tra' => 'Valor C.I.F ADUANA Bs',
            'estado_tra' => 'Estado',
            'glosa_tra' => 'Glosa',
            'fecha_tra' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioTra()
    {
        return $this->hasOne(Usuario::className(), ['id_usuario' => 'id_usuario_tra']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteTra()
    {
        return $this->hasOne(Cliente::className(), ['id_cliente' => 'id_cliente_tra']);
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalledocumento()
    {
        return $this->hasMany(Detalledocumento::className(), ['id_tramite_dd' => 'id_tramite']);
        //return $this->hasMany(ReceiptDetail::className(), ['receipt_id' => 'id']);
        //return $this->hasOne(Cliente::className(), ['id_cliente' => 'id_cliente_tra']);
    }
    
    public function getDetalleformulario()
    {
        return $this->hasMany(Detalleformulario::className(), ['id_tramite_df' => 'id_tramite']);
        //return $this->hasMany(ReceiptDetail::className(), ['receipt_id' => 'id']);
        //return $this->hasOne(Cliente::className(), ['id_cliente' => 'id_cliente_tra']);
    }
    
    
}
