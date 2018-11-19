<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Grado */

$this->title = $model->id_grado;
$this->params['breadcrumbs'][] = ['label' => 'Grados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_grado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_grado], [
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
            'id_grado',
            'codigo_gra',
            'descripcion_gra',
            'tipo_gra',
            'estado_gra',
        ],
    ]) ?>

</div>
