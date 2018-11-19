<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Formulario */
/* @var $form yii\widgets\ActiveForm */
?>

	<div class="formulario-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'nombre_form')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'sigla_form')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'estado_form')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>	
    

