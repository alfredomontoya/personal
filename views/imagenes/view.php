<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Imagenes */

$this->title = $model->id_imagen;
$this->params['breadcrumbs'][] = ['label' => 'Imagenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagenes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_imagen], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_imagen], [
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
            'id_imagen',
            'nombre_im',
            'fecha_im',
            'estado_im',
        ],
    ]) ?>
    
    <div class="panel panel-info">
        <div class="panel-heading">Foto</div>
        <div class="panel-body">
            <?= Html::img('@web/archivos/'.$model->id_imagen, ['alt'=>'some', 'class'=>'thing', 'width' => '200']);?> 
        </div>
    </div>

</div>
