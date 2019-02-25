<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PoliciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Policias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="policia-index">
    <div class="container">
        
    
        <?php
            $gridColumns = [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'label'=>'ID',
                    'attribute'=>'id_policia',
                    'width' => '80px'
                ],
                [
                    'label'=>'C.I.',
                    'attribute'=>'ci_pol',
                    'width' => '100px'
                ],
                [
                    'label'=>'Expedido',
                    'attribute'=>'exp_pol',
                    'width' => '80px'
                ],
                'paterno_pol',
                'materno_pol',
                'nombre1_pol',
                'nombre2_pol',
                [
                    'label'=>'Sexo',
                    'attribute'=>'sexo_pol',
                    'width' => '80px'
                ],
                

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Actions',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'template' => '{view} {update}',
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
                'heading' => '<h1 class="panel-title"><i class="fas fa-book"></i>'. Html::encode($this->title) .'</h2>',
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
                        ((Yii::$app->user->can('policia-create'))? Html::a('Registrar', ['create'], ['class' => 'btn btn-success']): '' ).
                        Html::a('<i class="fas fa-redo"></i>', ['index'], ['class' => 'btn btn-primary'])
                    ,    
                    'options' => ['class' => 'btn-group']
                ],
                //'{export}',
                ((Yii::$app->user->can('policia-exportar'))? $fullExportMenu : []),
            ]
        ]); ?>
    </div>
</div>