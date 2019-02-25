<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CambioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cambios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cambio-index">
    <div class="container">
        
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrapper-scroll-x">
                    <?php
                        $gridColumns=[
                            ['class' => 'yii\grid\SerialColumn'],

                            ['label' => 'ID', 'attribute' => 'id_cambio'],
                            ['label' => 'CI', 'attribute' => 'ci_pol', 'value' => 'policiaCam.ci_pol'],
                            ['label' => 'Ap. paterno', 'attribute' => 'paterno_pol', 'value' => 'policiaCam.paterno_pol'],
                            ['label' => 'Ap. Materno', 'attribute' => 'materno_pol', 'value' => 'policiaCam.materno_pol'],
                            ['label' => '1er Nombre', 'attribute' => 'nombre1_pol', 'value' => 'policiaCam.nombre1_pol'],
                            ['label' => '2do Nombre', 'attribute' => 'nombre2_pol', 'value' => 'policiaCam.nombre2_pol'],
                            ['label' => 'Cod. Unidad', 'attribute' => 'codigo_uni', 'value' => 'cargoCam.unidadCar.codigo_uni'],
                            ['label' => 'Unidad', 'attribute' => 'nombre_uni', 'value' => 'cargoCam.unidadCar.nombre_uni'],
                            ['label' => 'Cargo', 'attribute' => 'nombre_car', 'value' => 'cargoCam.nombre_car'],
                            [
                                'attribute' => 'tipo_cam', 
                                //'width' => '100px',
                                'value' => 'tipo_cam',
                                'filterType' => GridView::FILTER_SELECT2,
                                'filter' => ['IN'=>'INTERNO', 'EX'=>'EXTERNO', 'UN' =>'UNIDAD', ' ' => 'TODOS'],//yii\helpers\ArrayHelper::map(\app\models\Cambio::find()->orderBy('estado_cam')->asArray()->all(), 'id_cambio', 'estado_cam'), 
                                'filterWidgetOptions' => [
                                    'pluginOptions' => ['allowClear' => true],
                                ],
                                'filterInputOptions' => ['placeholder' => 'Tipo']
                            ],
                            [
                                'attribute' => 'estado_cam', 
                                //'width' => '100px',
                                'value' => 'estado_cam',
                                'filterType' => GridView::FILTER_SELECT2,
                                'filter' => ['AC'=>'ACTIVO', 'HI'=>'HISTORICO', ' ' =>'TODOS'],//yii\helpers\ArrayHelper::map(\app\models\Cambio::find()->orderBy('estado_cam')->asArray()->all(), 'id_cambio', 'estado_cam'), 
                                'filterWidgetOptions' => [
                                    'pluginOptions' => ['allowClear' => true],
                                ],
                                'filterInputOptions' => ['placeholder' => 'Estado']
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn', 
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
                        Html::a('Inicio', ['/site/index'], ['class' => 'btn btn-primary']).
                        ((Yii::$app->user->can('cambio-create-cambiocargo'))? Html::a('Cambio Cargo', ['createcambiocargo'], ['class' => 'btn btn-success']) : '').
                        ((Yii::$app->user->can('cambio-create-cambiounidad'))? Html::a('Cambio Unidad', ['create'], ['class' => 'btn btn-success']) : '').
                        ((Yii::$app->user->can('cambio-create-cambioexterno'))? Html::a('Cambio Externo', ['createcambioexterno'], ['class' => 'btn btn-success']) : '').
                        Html::a('<i class="fas fa-redo"></i>', ['index'], ['class' => 'btn btn-primary'])
                    ,    
                    'options' => ['class' => 'btn-group']
                ],
                //'{export}',
                ((Yii::$app->user->can('cambio-exportar'))? $fullExportMenu : []),
            ]
        ]); ?>
                    
                </div>
            </div>
            
        </div>
        
    </div>
</div>
