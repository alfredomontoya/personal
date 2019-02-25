<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Policia */
/* @var $form yii\widgets\ActiveForm */
$this->registerJs(
    ""
    ."$('#imagen-archivo').change(function(e) {
        addImage(e); 
     });"
    ."function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#output').attr('src',result);
     }"    
    . "",
 yii\web\View::POS_READY,
    'my-button-handler'
);
?>

<div class="policia-form">

    <?php $form = ActiveForm::begin([
        "method" => "post",
        "enableClientValidation" => true,
        "options" => ["enctype" => "multipart/form-data"],
    ]); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Datos Policia
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-7">
                            <?= $form->field($model, 'escalafon_pol')->textInput(['maxlength' => true])->label('Escalafon:') ?>
                        </div>
                        <div class="col-md-5">
                            <?= $form->field($model,'expescalafon_pol')->dropDownList([
                                            'prompt' => 'Seleccione expedido',
                                        'BE'=>'BENI',
                                        'SC'=>'SANTACRUZ',
                                        'PA'=>'PANDO',
                                        'LP'=>'LA PAZ',
                                        'OR'=>'ORURO',
                                        'PO'=>'POTOSI',
                                        'CO'=>'COCHABAMBA',
                                        'TA'=>'TARIJA',
                                        'CH'=>'CHUQUISACA',
                                    ])->label('Exp'); ?>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-4">
                     <div class="row">
                        <div class="col-md-7">
                            <?= $form->field($model, 'ci_pol')->textInput(['maxlength' => true])->label('Cedula Identidad:') ?>
                        </div>
                        <div class="col-md-5">
                            <?= $form->field($model,'exp_pol')->dropDownList([
                                            'prompt' => 'Seleccione expedido',
                                        'BE'=>'BENI',
                                        'SC'=>'SANTACRUZ',
                                        'PA'=>'PANDO',
                                        'LP'=>'LA PAZ',
                                        'OR'=>'ORURO',
                                        'PO'=>'POTOSI',
                                        'CO'=>'COCHABAMBA',
                                        'TA'=>'TARIJA',
                                        'CH'=>'CHUQUISACA',
                                    ])->label('Exp'); ?>
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
                    <?= $form->field($model,'sexo_pol')->dropDownList([
                                            'prompt' => 'Seleccionar sexo',
                                        'M'=>'MASCULINO',
                                        'F'=>'FEMENINO',
                                    ])->label('Sexo:'); ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'fnacimiento_pol')->input('date')->label('Fecha nacimiento:') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'dptonacimiento_pol')->dropDownList(
                            $ldepartamentos, 
                            [
                               'prompt'=>'-Seleccione departamento-',
                               'onchange'=>'
                                    $.post("'.Yii::$app->urlManager->createUrl(['policia/provincias', 'id' => '']).'"+$(this).val(), function(data) {
                                       $("#policia-provnacimiento_pol").html(data);
                                    });
                                   ',
                                
                            ]
                        );  
                    ?>
                    <?php //Html::activeHiddenInput($model, "dptonacimiento_pol") ?>
                    <?php // $form->field($model, 'dptonacimiento_pol')->textInput(['maxlength' => true])?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'provnacimiento_pol')->dropDownList(
                            $lprovincias,           
                            [
                                'prompt'=>'-Seleccione un provincia-',
                                'onchange'=>'
                                    $.post("'.Yii::$app->urlManager->createUrl(['policia/seleccionarprovincia', 'id' => '']).'"+$(this).val(), function(data) {
                                       //$("#policia-provnacimiento_pol").val(data);
                                       //$("#departamento-id_departamento").val(10);
                                    });
                                   '
                            ]
                        );
                    ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'locanacimiento_pol')->textInput(['maxlength' => true])->label('Localidad Nacimiento:') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'fincorporacion_pol')->input('date')->label('Fecha incorporacion:') ?>
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
                    <?= $form->field($model, 'fpresentacion_pol')->input('date')->label('Fecha presentacion:') ?>
                </div>
                
                <div class="col-md-7">
                    <?= $form->field($model, 'direccion_pol')->textInput(['maxlength' => true])->label('Direccion:') ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($imagen, 'archivo[]')->widget(
                        FileInput::className(),
                        [
                            'name' => 'attachments', 
                            'options' => [
                                'multiple' => true,
                                'accept' => 'image/*'
                                ], 
                            'pluginOptions' => ['previewFileType' => 'any']
                        ]
                        ) ?>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">

                            <div id="mdb-lightbox-ui"></div>

                            <div class="mdb-lightbox">
                                <?php
                                    //$dir = \yii\helpers\Url::to('@web');
                                    //Yii::warning($dir);
                                    //$directorio = opendir('/web/policias'); //ruta actual
                                    $files=\yii\helpers\FileHelper::findFiles($directorio, ['only' => [$model->id_policia . '_*.*']]); 
                                    foreach ($files as $file){
                                        $nameFicheiro = substr($file, strrpos($file, '/')); 
                                        echo '<figure class="col-md-4">';
                                        echo Html::a(
                                                $nameFicheiro.
                                                Html::img(
                                                        $nameFicheiro, 
                                                        [
                                                            'alt' => 'placeholder',
                                                            'class' => 'img-fluid',
                                                        ]), 
                                                $nameFicheiro,
                                                ['data-size'=>'1600x1067']
                                                ) ; // render do ficheiro no browser 
                                                //<a href=../web/policias/'.$nameFicheiro.' data-size="1600x1067">
                                                //    <img src=../web/policias/'.$nameFicheiro.'  alt="placeholder" class="img-fluid">
                                                //</a>
                                        echo '</figure>';
                                    }
                              
                                ?>
                            

                          </div>

                        </div>
                      </div>
                </div>
                
            </div>
            
            
            
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <?= Html::submitButton('Registrar', ['class' => 'btn btn-success']) ?>
                <?= Html::a('Cancelar',['index'], ['class' => 'btn btn-warning']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
