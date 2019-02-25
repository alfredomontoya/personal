<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CargoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cargos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargo-index">
    <div class="container">
        <!--<h1><?= Html::encode($this->title) ?></h1>-->
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

       
        <?php
            $gridColumns = [
                ['class' => 'yii\grid\SerialColumn'],
                ['label' => 'ID', 'attribute' => 'id_cargo', 'value' => 'id_cargo', 'width' => '100px',],
                ['label' => 'Unidad', 'attribute' => 'nombre_uni', 'value' => 'unidadCar.nombre_uni', 'width' => 'px',],
                ['label' => 'Cargo', 'attribute' => 'nombre_car', 'value' => 'nombre_car', 'width' => '',],
                ['label' => 'Estado', 'attribute' => 'estado_car', 'value' => 'estado_car', 'width' => '100px',],
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],
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
                        ((Yii::$app->user->can('cargo-create'))? Html::a('Registrar', ['create'], ['class' => 'btn btn-success']):'').
                        Html::a('<i class="fas fa-redo"></i>', ['index'], ['class' => 'btn btn-primary'])
                    ,    
                    'options' => ['class' => 'btn-group']
                ],
                //'{export}',
                ((Yii::$app->user->can('cargo-exportar'))? $fullExportMenu:[]),
            ]
        ]); ?>
    </div>
</div>
