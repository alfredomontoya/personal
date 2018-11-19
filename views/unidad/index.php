<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modelsUnidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unidads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Unidad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_unidad',
            'nombre_uni',
            'estado_uni',
            'departamentoUni.nombre_dep',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
