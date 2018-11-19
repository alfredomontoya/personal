<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CambioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cambio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cambio') ?>

    <?= $form->field($model, 'id_policia_cam') ?>

    <?= $form->field($model, 'id_cargo_cam') ?>

    <?= $form->field($model, 'glosa_cam') ?>

    <?= $form->field($model, 'fdesignacion_cam') ?>

    <?php // echo $form->field($model, 'fecha_cam') ?>

    <?php // echo $form->field($model, 'estado_cam') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
