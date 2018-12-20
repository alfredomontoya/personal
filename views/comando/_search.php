<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ComandoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comando-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_comando') ?>

    <?= $form->field($model, 'id_departamento_com') ?>

    <?= $form->field($model, 'codigo_com') ?>

    <?= $form->field($model, 'nombre_com') ?>

    <?= $form->field($model, 'fefcha_com') ?>

    <?php // echo $form->field($model, 'estado_com') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
