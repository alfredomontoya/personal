<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetalledocumentoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalledocumento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_detalledocumento') ?>

    <?= $form->field($model, 'id_tramite_dd') ?>

    <?= $form->field($model, 'numero_dd') ?>

    <?= $form->field($model, 'fechadocumento_dd') ?>

    <?= $form->field($model, 'cantidad_dd') ?>

    <?php // echo $form->field($model, 'orignal_dd') ?>

    <?php // echo $form->field($model, 'copia_dd') ?>

    <?php // echo $form->field($model, 'legalizado_dd') ?>

    <?php // echo $form->field($model, 'fotocopia_dd') ?>

    <?php // echo $form->field($model, 'estado_dd') ?>

    <?php // echo $form->field($model, 'documento_dd') ?>

    <?php // echo $form->field($model, 'disabled') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
