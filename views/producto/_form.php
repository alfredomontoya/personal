<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'id_clase_pro')->textInput() ?>

    <?= $form->field($model, 'codigo_pro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion_pro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio_pro')->textInput() ?>

    <?= $form->field($model, 'stock_pro')->textInput() ?>

    <?= $form->field($model, 'stockmax_pro')->textInput() ?>

    <?= $form->field($model, 'stockmin_pro')->textInput() ?>

    <?= $form->field($model, 'foto_pro')->fileInput() ?>
    

    <?= $form->field($model, 'fecha_pro')->input('date') ?>

    <?= $form->field($model, 'estado_pro')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
