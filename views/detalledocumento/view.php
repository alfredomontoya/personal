<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Detalledocumento */

$this->title = $model->id_detalledocumento;
$this->params['breadcrumbs'][] = ['label' => 'Detalledocumentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalledocumento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_detalledocumento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_detalledocumento], [
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
            'id_detalledocumento',
            'id_tramite_dd',
            'numero_dd',
            'fechadocumento_dd',
            'cantidad_dd',
            'orignal_dd',
            'copia_dd',
            'legalizado_dd',
            'fotocopia_dd',
            'estado_dd',
            'documento_dd',
            'disabled',
        ],
    ]) ?>

</div>
