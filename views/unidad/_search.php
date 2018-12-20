<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UnidadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_unidad') ?>

    <?= $form->field($model, 'codigo_uni') ?>

    <?= $form->field($model, 'nombre_uni') ?>

    <?= $form->field($model, 'estado_uni') ?>

    <?= $form->field($model, 'id_comando_uni') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
