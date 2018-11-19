<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetallegradoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detallegrados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallegrado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detallegrado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_detallegrado',
            [
                'header' => 'Grado',
                'format' => 'raw',
                'value' => 'id_grado_dg'
            ],
            [
                'header' => 'Nombres y apellidos',
                'format' => 'raw',
                'value'=>function ($model) {
                    return $model->policiaDg->nombre1_pol . ' ' . $model->policiaDg->paterno_pol;
                },
            ],
            'gradoDg.descripcion_gra',
            'glosa_dg',
            'fechaascenso_dg',
            //'fecha_dg',
            //'estado_dg',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
