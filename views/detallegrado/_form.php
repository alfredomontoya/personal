<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Detallegrado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detallegrado-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            Datos actuales
        </div>      
        <div class="panel-body">
            <?= $form->field($model, 'id_policia_dg')->textInput() ?>
            <?= $form->field($model, 'id_grado_dg')->textInput() ?>
            <?= $form->field($model, 'glosa_dg')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'fechaascenso_dg')->textInput() ?>

            <?= $form->field($model, 'fecha_dg')->textInput() ?>

            <?= $form->field($model, 'estado_dg')->textInput(['maxlength' => true]) ?>
        </div>  
    </div>


    

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
