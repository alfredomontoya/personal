<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TramiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tramites';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tramite-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tramite', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tramite',
            'id_usuario_tra',
            'id_cliente_tra',
            'numero_tra',
            'aduana_tra',
            //'procedencia_tra',
            //'proveedor_tra',
            //'cantidadbultos_tra',
            //'referencia_tra',
            //'peso_tra',
            //'regimen_tra',
            //'tipocambio_tra',
            //'mercancia_tra',
            //'docembarque_tra',
            //'partidaarancelaria_tra',
            //'valorfob_tra',
            //'fletes_tra',
            //'seguro_tra',
            //'otrosgastos_tra',
            //'valorcifsus_tra',
            //'valorcifbs_tra',
            //'estado_tra',
            //'glosa_tra',
            //'fecha_tra',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
