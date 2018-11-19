<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pais */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pais-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigoalf2_pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigoalf3_pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigonum_pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion_pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado_pais')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
