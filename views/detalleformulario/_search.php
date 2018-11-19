<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleformularioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalleformulario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_detalleformulario') ?>

    <?= $form->field($model, 'id_tramite_df') ?>

    <?= $form->field($model, 'formulario_df') ?>

    <?= $form->field($model, 'sigla_df') ?>

    <?= $form->field($model, 'fecha_dd') ?>

    <?php // echo $form->field($model, 'estado_dd') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
