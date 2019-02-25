<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Cambio */

$this->title = 'Cambio: ' . $model->id_cambio;
$this->params['breadcrumbs'][] = ['label' => 'Cambios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cambio-view">
    <div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aceptar', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
        <!--<?= Html::a('Modificar', ['update', 'id' => $model->id_cambio], ['class' => 'btn btn-primary']) ?>-->
        <!--<?= Html::a('Eliminar', ['delete', 'id' => $model->id_cambio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>-->
    </p>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Cambio cargo</div>
                <div class="panel-body">
                    <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    ['label' => 'ID:', 'attribute' => 'id_cambio'],
                    ['label' => 'Tipo:', 'attribute' => 'tipo_cam'],
                    ['label' => 'Departamento:', 'attribute' => 'cargoCam.unidadCar.comandoUni.departamentoCom.nombre_dep'],
                    ['label' => 'Comando:', 'attribute' => 'cargoCam.unidadCar.comandoUni.nombre_com'],
                    ['label' => 'Unidad:', 'attribute' => 'cargoCam.unidadCar.nombre_uni'],
                    ['label' => 'Cargo:', 'attribute' => 'cargoCam.nombre_car'],
                    
                    
                    ['label' => 'Fecha Designación:', 'attribute' => 'fdesignacion_cam'],
                    ['label' => 'Fecha Registro:', 'attribute' => 'fecha_cam'],
                    ['label' => 'Glosa:', 'attribute' => 'glosa_cam'],
                    ['label' => 'Estado:', 'attribute' => 'estado_cam'],
                ],
                'options' => [
                    'class' => 'table table-bordered table-striped detail-view'
                ],
                'template' => "<tr><th class='text-right' width=200>{label}</th><td{contentOptions}>{value}</td></tr>"
            ]) ?>
                </div>
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Datos policia</div>
                <div class="panel-body">
                    <?= DetailView::widget([
                'model' => $policia,
                'attributes' => [
                    ['label' => 'Escalafon:', 'attribute' => 'escalafon_pol'],
                    ['label' => 'CI:', 'attribute' => 'ci_pol'],
                    ['label' => 'Expedido:', 'attribute' => 'exp_pol'],
                    ['label' => 'Nombres', 'value' => $policia->nombre1_pol . ' ' .$policia->nombre2_pol,],
                    ['label' => 'Apellidos:', 'value' => $policia->paterno_pol . ' ' .$policia->materno_pol,],
                ],
                'options' => [
                    'class' => 'table table-striped detail-view'
                ],
                'template' => "<tr><th class='text-right' width=200>{label}</th><td{contentOptions}>{value}</td></tr>"
            ]) ?>
                </div>
            </div>
            
        </div>
    </div>
 
</div>
    
</div>
