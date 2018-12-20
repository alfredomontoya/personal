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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_comando], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_comando], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_comando',
            [
                'label' => 'Departamento',
                'attribute' => 'nombre_dep',
                'value' => 'departamentoCom.nombre_dep'
            ],
            'departamentoCom.nombre_dep',
            'codigo_com',
            'nombre_com',
            'fefcha_com',
            'estado_com',
        ],
    ]) ?>

</div>
