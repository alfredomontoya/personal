<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Unidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo_uni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_uni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado_uni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_comando_uni')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
