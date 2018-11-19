<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_producto') ?>

    <?= $form->field($model, 'id_clase_pro') ?>

    <?= $form->field($model, 'codigo_pro') ?>

    <?= $form->field($model, 'descripcion_pro') ?>

    <?= $form->field($model, 'precio_pro') ?>

    <?php // echo $form->field($model, 'stock_pro') ?>

    <?php // echo $form->field($model, 'stockmax_pro') ?>

    <?php // echo $form->field($model, 'stockmin_pro') ?>

    <?php // echo $form->field($model, 'foto_pro') ?>

    <?php // echo $form->field($model, 'fecha_pro') ?>

    <?php // echo $form->field($model, 'estado_pro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
