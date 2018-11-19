<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cambio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cambio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_policia_cam')->textInput() ?>

    <?= $form->field($model, 'id_cargo_cam')->textInput() ?>

    <?= $form->field($model, 'glosa_cam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fdesignacion_cam')->textInput() ?>

    <?= $form->field($model, 'fecha_cam')->textInput() ?>

    <?= $form->field($model, 'estado_cam')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
