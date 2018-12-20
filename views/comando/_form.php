<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comando */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comando-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_departamento_com')->textInput() ?>

    <?= $form->field($model, 'codigo_com')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_com')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fefcha_com')->textInput() ?>

    <?= $form->field($model, 'estado_com')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
