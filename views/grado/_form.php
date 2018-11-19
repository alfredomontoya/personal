<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Grado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo_gra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion_gra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_gra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado_gra')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
