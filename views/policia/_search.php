<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PoliciaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="policia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_policia') ?>

    <?= $form->field($model, 'escalafon_pol') ?>

    <?= $form->field($model, 'expescalafon_pol') ?>

    <?= $form->field($model, 'ci_pol') ?>

    <?= $form->field($model, 'exp_pol') ?>

    <?php // echo $form->field($model, 'paterno_pol') ?>

    <?php // echo $form->field($model, 'materno_pol') ?>

    <?php // echo $form->field($model, 'esposo_pol') ?>

    <?php // echo $form->field($model, 'nombre1_pol') ?>

    <?php // echo $form->field($model, 'nombre2_pol') ?>

    <?php // echo $form->field($model, 'sexo_pol') ?>

    <?php // echo $form->field($model, 'fnacimiento_pol') ?>

    <?php // echo $form->field($model, 'dptonacimiento_pol') ?>

    <?php // echo $form->field($model, 'provnacimiento_pol') ?>

    <?php // echo $form->field($model, 'locanacimiento_pol') ?>

    <?php // echo $form->field($model, 'fincorporacion_pol') ?>

    <?php // echo $form->field($model, 'telefono_pol') ?>

    <?php // echo $form->field($model, 'telefonoref_pol') ?>

    <?php // echo $form->field($model, 'fpresentacion_pol') ?>

    <?php // echo $form->field($model, 'trabajosantacruz_pol') ?>

    <?php // echo $form->field($model, 'direccion_pol') ?>

    <?php // echo $form->field($model, 'estado_pol') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
