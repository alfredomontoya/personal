<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CargoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cargos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cargo', ['create'], ['class' => 'btn btn-success']) ?> 
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'width' => '50px',
                'value' => function ($model, $key, $index, $column){
                    return kartik\grid\GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column){
                    //$searchModel = new \app\models\UnidadSearch();
                    //$searchModel->id_unidad = $model->id_unidad_com;
                    //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    $searchModel = new app\models\CambioSearch();
                    $searchModel->id_cargo_cam = $model->id_cargo;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial (
                            'detailcambios', 
                            [
                                //'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            ]
                    );

                },
            ],

            'id_cargo',
            [
                'label' => 'Unidad',
                'attribute' => 'nombre_uni',
                'value' => 'unidadCar.nombre_uni'
                ],
            'nombre_car',
            'estado_car',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
