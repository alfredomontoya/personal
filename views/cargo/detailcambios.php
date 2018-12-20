<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CambioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalle Cambios';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailcambio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Cambio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_cambio',
            'id_policia_cam',
            ['header' => 'CI', 'attribute' => 'ci_pol', 'value' => 'policiaCam.ci_pol'],
            ['header' => 'Ap. paterno', 'attribute' => 'paterno_pol', 'value' => 'policiaCam.paterno_pol'],
            ['header' => 'Ap. Materno', 'attribute' => 'materno_pol', 'value' => 'policiaCam.materno_pol'],
            ['header' => '1er Nombre', 'attribute' => 'nombre1_pol', 'value' => 'policiaCam.nombre1_pol'],
            ['header' => '2do Nombre', 'attribute' => 'nombre2_pol', 'value' => 'policiaCam.nombre2_pol'],
            //['header' => 'Codigo Unidad', 'attribute' => 'codigo_uni', 'value' => 'cargoCam.unidadCar.codigo_uni'],
            //['header' => 'Unidad', 'attribute' => 'nombre_uni', 'value' => 'cargoCam.unidadCar.nombre_uni'],
            //['header' => 'Cargo', 'attribute' => 'nombre_car', 'value' => 'cargoCam.nombre_car'],
            
            //'glosa_cam',
            'fdesignacion_cam',
            'estado_cam',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
