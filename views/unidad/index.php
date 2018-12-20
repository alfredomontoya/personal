<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnidadSearch */
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

                    $searchModel = new app\models\CargoSearch();
                    $searchModel->id_unidad_car = $model->id_unidad;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial (
                            'detailcargos', 
                            [
                                //'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            ]
                    );

                },
            ],

            'id_unidad',
            'codigo_uni',
            'nombre_uni',
            'estado_uni',
            'id_comando_uni',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>
