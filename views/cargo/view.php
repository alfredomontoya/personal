<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cargo */

$this->title = 'Cargo: ' . $model->id_cargo;
$this->params['breadcrumbs'][] = ['label' => 'Cargos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargo-view">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                ['label' => 'ID:', 'attribute' => 'id_cargo'],
                ['label' => 'Cargo:', 'attribute' => 'nombre_car'],
                ['label' => 'Unidad:', 'attribute' => 'unidadCar.nombre_uni'],
                ['label' => 'Comando:', 'attribute' => 'unidadCar.comandoUni.nombre_com'],
                ['label' => 'Departamento:', 'attribute' => 'unidadCar.comandoUni.departamentoCom.nombre_dep'],
                ['label' => 'Estado:', 'attribute' => 'estado_car'],
            ],
            'options' => [
                    'class' => 'table table-bordered table-striped detail-view'
                ],
            'template' => "<tr><th class='text-right' width=200>{label}</th><td{contentOptions}>{value}</td></tr>"
        ]) ?>
         <p>
            <?= Html::a('Aceptar', ['index'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Nuevo Cargo', ['create'], ['class' => 'btn btn-success']) ?>
            <!--<?= Html::a('Update', ['update', 'id' => $model->id_cargo], ['class' => 'btn btn-primary']) ?>-->
            <!--<?= Html::a('Delete', ['delete', 'id' => $model->id_cargo], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>-->
        </p>

    </div>
    

</div>
