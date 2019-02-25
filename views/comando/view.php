<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comando */

$this->title = $model->id_comando;
$this->params['breadcrumbs'][] = ['label' => 'Comandos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comando-view">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Aceptar', ['index'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Nuevo comando', ['create'], ['class' => 'btn btn-success']) ?>
            <!--<?= Html::a('Update', ['update', 'id' => $model->id_comando], ['class' => 'btn btn-primary']) ?>-->
            <!--<?= Html::a('Delete', ['delete', 'id' => $model->id_comando], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>-->
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'label' => 'Id:',
                    'attribute' => 'id_comando',
                ],
                [
                    'label' => 'Departamento:',
                    'attribute' => 'departamentoCom.nombre_dep',
                ],
                [
                    'label' => 'Codigo de comando:',
                    'attribute' => 'codigo_com',
                ],
                [
                    'label' => 'Nombre comando:',
                    'attribute' => 'nombre_com',
                ],
                [
                    'label' => 'Fecha registro:',
                    'attribute' => 'fecha_com',
                ],
                [
                    'label' => 'Estado:',
                    'attribute' => 'estado_com',
                ],
            ],
            'options' => [
                'class' => 'table table-bordered table-striped'
            ],
            'template' => "<tr><th class='text-right' width=200>{label}</th><td{contentOptions}>{value}</td></tr>"
        ]) ?>
    </div>
</div>
