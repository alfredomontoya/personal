<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CargoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cargo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cargo') ?>

    <?= $form->field($model, 'id_unidad_car') ?>

    <?= $form->field($model, 'nombre_car') ?>

    <?= $form->field($model, 'estado_car') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
