<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CambioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cambios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cambio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cambio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_cambio',
            'id_policia_cam',
            'id_cargo_cam',
            'glosa_cam',
            'fdesignacion_cam',
            //'fecha_cam',
            //'estado_cam',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
