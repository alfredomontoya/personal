<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetalleformularioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalleformularios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalleformulario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detalleformulario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_detalleformulario',
            [
                'attribute' => 'id_tramite_df',
                'value' => 'tramiteDf.numero_tra'
            ],
            [
                'attribute' => 'id_formulario_df',
                'value' => 'formularioDf.nombre_form'
            ],
            'fecha_df',
            'estado_df',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
