<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pais-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pais') ?>

    <?= $form->field($model, 'codigoalf2_pais') ?>

    <?= $form->field($model, 'codigoalf3_pais') ?>

    <?= $form->field($model, 'codigonum_pais') ?>

    <?= $form->field($model, 'nombre_pais') ?>

    <?php // echo $form->field($model, 'descripcion_pais') ?>

    <?php // echo $form->field($model, 'estado_pais') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
