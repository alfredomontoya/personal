<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Receiptdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receiptdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'receipt_id')->textInput() ?>

    <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opcion1')->textInput() ?>

    <?= $form->field($model, 'opcion2')->textInput() ?>

    <?= $form->field($model, 'opcion3')->textInput() ?>

    <?= $form->field($model, 'opcion4')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
