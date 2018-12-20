<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Imagenes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imagenes-form">

    <?php $form = ActiveForm::begin([
        "method" => "post",
        "enableClientValidation" => true,
        "options" => ["enctype" => "multipart/form-data"],
    ]); ?>

    <?= $form->field($model, 'nombre_im')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'archivo')->widget(
            FileInput::className(),
            [
                'name' => 'attachments', 
                'options' => [
                    'multiple' => false,
                    'accept' => 'image/*'
                    ], 
                'pluginOptions' => ['previewFileType' => 'any']
            ]
            ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
