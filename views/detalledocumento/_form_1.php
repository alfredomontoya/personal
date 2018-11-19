<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Detalledocumento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalledocumento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_tramite_dd')->textInput() ?>

    <?= $form->field($model, 'id_documento_dd')->textInput() ?>

    <?= $form->field($model, 'numero_dd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechadocumento_dd')->textInput() ?>

    <?= $form->field($model, 'cantidad_dd')->textInput() ?>

    <?= $form->field($model, 'orignal_dd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'copia_dd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'legalizado_dd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fotocopia_dd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado_dd')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
