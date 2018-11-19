<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Policia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="policia-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Datos Policia
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-8">
                            <?= $form->field($model, 'escalafon_pol')->textInput(['maxlength' => true])->label('Escalafon:') ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'expescalafon_pol')->textInput(['maxlength' => true])->label("Exp. Esc:") ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                     <div class="row">
                        <div class="col-md-8">
                            <?= $form->field($model, 'ci_pol')->textInput(['maxlength' => true])->label('Cedula Identidad:') ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'exp_pol')->textInput(['maxlength' => true])->label('Exp:') ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'paterno_pol')->textInput(['maxlength' => true])->label('Ap. Paterno:') ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'materno_pol')->textInput(['maxlength' => true])->label('Ap. Materno:') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'esposo_pol')->textInput(['maxlength' => true])->label('Ap. Esposo:') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'nombre1_pol')->textInput(['maxlength' => true])->label('Primer Nombre:') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'nombre2_pol')->textInput(['maxlength' => true])->label('Segundo Nombre:') ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'sexo_pol')->textInput(['maxlength' => true])->label('Sexo:') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'fnacimiento_pol')->textInput()->label('Fecha nacimiento:') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'dptonacimiento_pol')->textInput(['maxlength' => true])->label('Departamento Nacimiento:') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'provnacimiento_pol')->textInput(['maxlength' => true])->label('Provincia Nacimiento:') ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'locanacimiento_pol')->textInput(['maxlength' => true])->label('Localidad Nacimiento:') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'fincorporacion_pol')->textInput()->label('Fecha incorporacion:') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'telefono_pol')->textInput(['maxlength' => true])->label('Telefono:') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'telefonoref_pol')->textInput(['maxlength' => true])->label('Telefono referencia:') ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'fpresentacion_pol')->textInput()->label('Fecha presentacion:') ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'trabajosantacruz_pol')->textInput(['maxlength' => true])->label('Trab. en Santa Cruz?:') ?>
                </div>
                <div class="col-md-7">
                    <?= $form->field($model, 'direccion_pol')->textInput(['maxlength' => true])->label('Direccion:') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            Grado
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'escalafon_pol')->textInput(['maxlength' => true])->label('Grado:') ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'expescalafon_pol')->textInput(['maxlength' => true])->label("Fecha Grado:") ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'ci_pol')->textInput(['maxlength' => true])->label('Glosa:') ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            Puesto
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'escalafon_pol')->textInput(['maxlength' => true])->label('Departamento:') ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'expescalafon_pol')->textInput(['maxlength' => true])->label("Unidad:") ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'ci_pol')->textInput(['maxlength' => true])->label('Cargo:') ?>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'escalafon_pol')->textInput(['maxlength' => true])->label('Fecha designacion:') ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                     <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'ci_pol')->textInput(['maxlength' => true])->label('Glosa:') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    

    <?php ActiveForm::end(); ?>

</div>
