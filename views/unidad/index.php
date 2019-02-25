<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidad-index">
    <div class="container">
        
        
        <?php
            $gridColumns=[
                ['class' => 'yii\grid\SerialColumn'],

                /*[
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
                ],*/
                ['label' => 'ID', 'attribute' => 'id_unidad', 'width' => '100px'],
                ['label' => 'Codigo Unidad', 'attribute' => 'codigo_uni', 'width' => '100px'],
                ['label' => 'Nombre Unidad', 'attribute' => 'nombre_uni'],
                ['label' => 'Comando', 'attribute' => 'nombre_com', 'value' => 'comandoUni.nombre_com'],
                [
                    'label' => 'Estado', 
                    'attribute' => 'estado_uni', 
                    'filterType' => GridView::FILTER_SELECT2, 
                    'filter' => [' ' => 'TODOS', 'AC' => 'ACTIVO', 'HI' => 'HISTORICO'],
                    'filterWidgetOptions' => [
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'filterInputOptions' => ['placeholder' => 'Seleccionar']
                ],
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
            ];
                        
            $fullExportMenu = ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'target' => ExportMenu::TARGET_BLANK,
                'pjaxContainerId' => 'kv-pjax-container',
                'exportContainer' => [
                    'class' => 'btn-group mr-2'
                ],
                'dropdownOptions' => [
                    'label' => 'Exportar',
                    'class' => 'btn btn-secondary',
                    'itemsBefore' => [
                        '<div class="dropdown-header">Exportar todos los datos</div>',
                    ],
                ],
            ]);
        ?>
        <?= GridView::widget([
            'filterModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
            'panel' => [
                'type' => GridView::TYPE_INFO,
                'heading' => '<h3 class="panel-title"><i class="fas fa-book"></i>'. Html::encode($this->title) .'</h3>',
            ],
            // set a label for default menu
            'export' => [
                'label' => 'Export. Pag',
            ],
            'exportContainer' => [
                'class' => 'btn-group mr-2'
            ],
            // your toolbar can include the additional full export menu
            'toolbar' => [
                [
                    'content'=>
                        Html::a('Inicio', ['/site/index'], ['class' => 'btn btn-primary']) .
                        ((Yii::$app->user->can('unidad-create'))? Html::a('Registrar', ['create'], ['class' => 'btn btn-success']):'').
                        Html::a('<i class="fas fa-redo"></i>', ['index'], ['class' => 'btn btn-primary'])
                    ,    
                    'options' => ['class' => 'btn-group']
                ],
                //'{export}',
                ((Yii::$app->user->can('unidad-exportar'))? $fullExportMenu:[]),
            ]
        ]); ?>
    </div>
    
</div>
