<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container">
    <div class="cliente-form">
        <?php $form = ActiveForm::begin(); ?>

                <div class="row">

                        <div class="col-md-6">
                            <?= $form->field($model, 'nitci_cli')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-md-5" >
                            <?= $form->field($model, 'nombre_cli')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                           <?= $form->field($model, 'telefono_cli')->textInput(['maxlength' => true]) ?> 
                        </div>

                        <div class="col-md-5">
                            <?= $form->field($model, 'correo_cli')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-11">
                           <?= $form->field($model, 'direccion_cli')->textInput(['maxlength' => true]) ?> 
                        </div>
                    </div>    
                        <div class="form-group">  
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                        </div>
                            

            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
