<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Unidad */

$this->title = 'Unidad: ' . $model->id_unidad;
$this->params['breadcrumbs'][] = ['label' => 'Unidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidad-view">
    <div class="container">
        
        
        <h1><?= Html::encode($this->title) ?></h1>

        
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                ['label' => 'ID:', 'attribute' => 'id_unidad'],
                ['label' => 'Comando:', 'attribute' => 'comandoUni.nombre_com'],
                ['label' => 'Codigo Unidad:', 'attribute' => 'codigo_uni'],
                ['label' => 'Nombre Unidad:', 'attribute' => 'nombre_uni'],
                ['label' => 'Estado:', 'attribute' => 'estado_uni'],
            ],
            'options' => [
                    'class' => 'table table-bordered table-striped detail-view'
                ],
                'template' => "<tr><th class='text-right' width=200>{label}</th><td{contentOptions}>{value}</td></tr>"
        ]) ?>
        <p>
            <?= Html::a('Aceptar', ['index'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Nueva Unidad', ['create'], ['class' => 'btn btn-success']) ?>
            <!--<?= Html::a('Update', ['update', 'id' => $model->id_unidad], ['class' => 'btn btn-primary']) ?>-->
            <!--<?= Html::a('Delete', ['delete', 'id' => $model->id_unidad], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>-->
        </p>

    </div>

</div>
