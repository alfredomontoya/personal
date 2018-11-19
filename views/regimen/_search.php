<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegimenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regimen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_regimen') ?>

    <?= $form->field($model, 'nombre_reg') ?>

    <?= $form->field($model, 'sigla_reg') ?>

    <?= $form->field($model, 'estado_reg') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
