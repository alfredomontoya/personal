<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormularioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formulario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_formulario') ?>

    <?= $form->field($model, 'nombre_form') ?>

    <?= $form->field($model, 'sigla_form') ?>

    <?= $form->field($model, 'estado_form') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
