<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\i18n\Formatter;

/* @var $this yii\web\View */
/* @var $model app\models\Detalleformulario */

$this->title = $model->id_detalleformulario;
$this->params['breadcrumbs'][] = ['label' => 'Detalleformularios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalleformulario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_detalleformulario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_detalleformulario], [
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
            'id_detalleformulario',
            'tramiteDf.numero_tra',
            'formularioDf.nombre_form',
            [
                'attribute' => 'fecha_df',
                'value' => $model->fecha_df,
                'format' => 'date',
            ],
            'estado_df:html',
        ],
        'formatter' => [
            'class' => Formatter::className(),
            'dateFormat' => 'dd/MM/yyyy',
       ],
    ]) ?>

</div>
