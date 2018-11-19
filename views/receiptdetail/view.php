<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Receiptdetail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Receiptdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receiptdetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'receipt_id',
            'item_name',
            'descripcion',
            'opcion1',
            'opcion2',
            'opcion3',
            'opcion4',
        ],
    ]) ?>

</div>
