<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GradoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_grado') ?>

    <?= $form->field($model, 'codigo_gra') ?>

    <?= $form->field($model, 'descripcion_gra') ?>

    <?= $form->field($model, 'tipo_gra') ?>

    <?= $form->field($model, 'estado_gra') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
