<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReceiptdetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receiptdetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'receipt_id') ?>

    <?= $form->field($model, 'item_name') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'opcion1') ?>

    <?php // echo $form->field($model, 'opcion2') ?>

    <?php // echo $form->field($model, 'opcion3') ?>

    <?php // echo $form->field($model, 'opcion4') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
