<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetallegradoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grado Policia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallegrado-index">
    <div class="container">

        
        <?php
            $gridColumns = [
                ['class' => 'yii\grid\SerialColumn'],

                //'id_detallegrado',
                //'id_policia_dg',
                //'id_grado_dg',
                //['header' => 'Escalafón',   'attribute' => 'escalafon_pol', 'value' => 'policiaDg.escalafon_pol'],
                ['label' => 'ID',          'attribute' => 'id_policia_dg',      'value' => 'id_policia_dg',         'width' => '80px'],
                ['label' => 'C.I.',          'attribute' => 'ci_pol',      'value' => 'policiaDg.ci_pol',         'width' => '80px'],
                ['label' => 'Ap. paterno', 'attribute' => 'paterno_pol', 'value' => 'policiaDg.paterno_pol'],
                ['label' => 'Ap. materno', 'attribute' => 'materno_pol', 'value' => 'policiaDg.materno_pol'],
                ['label' => '1er. Nombre', 'attribute' => 'nombre1_pol', 'value' => 'policiaDg.nombre1_pol'],
                ['label' => '2do. Nombre', 'attribute' => 'nombre2_pol', 'value' => 'policiaDg.nombre2_pol'],
                ['label' => 'Grado', 'attribute' => 'descripcion_gra', 'value' => 'gradoDg.descripcion_gra'],
                [
                    'label' => 'Estado',
                    'attribute' => 'estado_dg', 
                    'width' => '80px',
                    'value' => 'estado_dg',
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ['AC'=>'ACTIVO', 'HI'=>'HISTORICO', ' ' =>'TODOS'],//yii\helpers\ArrayHelper::map(\app\models\Cambio::find()->orderBy('estado_cam')->asArray()->all(), 'id_cambio', 'estado_cam'), 
                    'filterWidgetOptions' => [
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'filterInputOptions' => ['placeholder' => 'Seleccionar']
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}',
                ],
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
                        ((Yii::$app->user->can('detallegrado-create'))? Html::a('Nuevo Registro', ['create'], ['class' => 'btn btn-success']):'').
                        Html::a('<i class="fas fa-redo"></i>', ['index'], ['class' => 'btn btn-primary'])
                    ,    
                    'options' => ['class' => 'btn-group']
                ],
                //'{export}',
                ((Yii::$app->user->can('detallegrado-exportar'))? $fullExportMenu:[]),
            ]
        ]); ?>
    </div>
</div>
