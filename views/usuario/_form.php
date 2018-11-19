<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ci_us')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_us')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion_us')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_us')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username_us')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_us')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_us')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authKey_us')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accessToken_us')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activate_us')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
