<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetallegradoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detallegrado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_detallegrado') ?>

    <?= $form->field($model, 'id_policia_dg') ?>

    <?= $form->field($model, 'id_grado_dg') ?>

    <?= $form->field($model, 'glosa_dg') ?>

    <?= $form->field($model, 'fechaascenso_dg') ?>

    <?php // echo $form->field($model, 'fecha_dg') ?>

    <?php // echo $form->field($model, 'estado_dg') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
