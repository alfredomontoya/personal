<?php

use app\models\Unidad;
use app\models\Cargo;

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\data\ActiveDataProvider;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ComandoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comandos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comando-index">
    <div class="container">

        <?php
            $gridColumns=[
                //['class' => 'yii\grid\SerialColumn'],
                
                /*[
                    'class' => 'kartik\grid\ExpandRowColumn',
                    'value' => function ($model, $key, $index, $column){
                        return kartik\grid\GridView::ROW_COLLAPSED;
                    },
                    'detail' => function ($model, $key, $index, $column){
                        $query = Unidad::find()->where(['id_comando_uni' => $model->id_comando])->orderBy(['nombre_uni'=>SORT_ASC])->all();
                        return Yii::$app->controller->renderPartial('_unidades', [
                            'dataProvider' => $query,
                        ]);

                    },
                ],*/
                
                ['label' => 'ID', 'attribute' => 'id_comando', 'width' => '100px'],
                ['label' => 'Codigo', 'attribute' => 'codigo_com', 'width' => '100px'],
                ['label' => 'Nombre', 'attribute' => 'nombre_com'],
                ['label' => 'Departamento', 'attribute' => 'nombre_dep', 'value' => 'departamentoCom.nombre_dep'],
                ['label' => 'Fecha registro', 'attribute' => 'fecha_com'],
                [
                    'label' => 'Estado', 
                    'attribute' => 'estado_com', 
                    'filterType' => GridView::FILTER_SELECT2, 
                    'filter' => [' ' => 'TODOS', 'AC' => 'ACTIVO', 'HI' => 'HISTORICO'],
                    'filterWidgetOptions' => [
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'filterInputOptions' => ['placeholder' => 'Seleccionar']
                ],
                ['label' => 'Unidades', 'attribute' => 'unidadesCount'],
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}',],
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
                        ((Yii::$app->user->can('comando-create'))? Html::a('Registrar', ['create'], ['class' => 'btn btn-success']):'').
                        Html::a('<i class="fas fa-redo"></i>', ['index'], ['class' => 'btn btn-primary'])
                    ,    
                    'options' => ['class' => 'btn-group']
                ],
                //'{export}',
                ((Yii::$app->user->can('comando-exportar'))? $fullExportMenu:[]),
            ]
        ]); ?>
        
    </div>
</div>
