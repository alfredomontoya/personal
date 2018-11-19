<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'ci_us') ?>

    <?= $form->field($model, 'nombre_us') ?>

    <?= $form->field($model, 'direccion_us') ?>

    <?= $form->field($model, 'telefono_us') ?>

    <?php // echo $form->field($model, 'username_us') ?>

    <?php // echo $form->field($model, 'email_us') ?>

    <?php // echo $form->field($model, 'password_us') ?>

    <?php // echo $form->field($model, 'authKey_us') ?>

    <?php // echo $form->field($model, 'accessToken_us') ?>

    <?php // echo $form->field($model, 'activate_us') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
