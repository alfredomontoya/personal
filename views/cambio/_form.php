<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Cambio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cambio-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            Datos
        </div>
        
        <div class="panel-body">
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Buscar policia
                </div>    
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($policia, 'escalafon_pol')->widget(AutoComplete::classname(), [
                                'value' =>'helo',
                                'clientOptions' => [
                                    'source' => $policias,
                                    'minLength' => '3',
                                    'autoFill'=>true,
                                    'label'=>'',
                                    'select' => new \yii\web\JsExpression ("function( event, ui ) { "
                                            . '$("#cambio-id_policia_cam").val(ui.item.id); '
                                            . '$("#policia-nombre1_pol").val(ui.item.label2); '
                                            . '$("#policia-ci_pol").val(ui.item.label3); '
                                            . '$.post("'.Yii::$app->urlManager->createUrl(['cambio/cambiospol', 'id_policia' => '']).'"+$("#cambio-id_policia_cam").val(), function(data) {'
                                            . '$("#cambios").html(data);'
                                            . '$("#cambio-id_cargo_cam").val("");'
                                            . '});'
                                            . "}"),
                                ],
                                'options' => [
                                    'class' => 'form-control',
                                    'value'=>$policia->escalafon_pol,
                                ],
                            ]) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($model, 'id_policia_cam')->textInput(['readonly' => true]) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($policia, 'ci_pol')->textInput(['readonly' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($policia, 'nombre1_pol')->textInput(['readonly' => true]) ?>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    Datos del cambio de cargo
                </div>    
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model,'tipo_cam')->dropDownList([
                                            'prompt' => 'Seleccione Tipo de cambio',
                                        'IN'=>'INTERNO',
                                        'EX'=>'EXTERNO',
                                    ])->label('Tipo'); ?>
                        </div>
                        
                        <div class="col-md-4">
                            <?= $form->field($departamento, 'id_departamento')->dropDownList(
                                    $ldepartamentos, 
                                    [
                                       'prompt'=>'-Seleccione departamento del pais-',
                                       'onchange'=>'
                                            $.post("'.Yii::$app->urlManager->createUrl(['cambio/comandos', 'id_departamento' => '']).'"+$(this).val(), function(data) {
                                               $("#comando-id_comando").html(data);
                                               $("#cambio-id_cargo_cam").val("");
                                            });
                                           '
                                    ]
                                );  
                            ?>        
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($comando, 'id_comando')->dropDownList(
                                    $lcomandos, 
                                    [
                                       'prompt'=>'-Seleccione comando-',
                                       'onchange'=>'
                                            $.post("'.Yii::$app->urlManager->createUrl(['cambio/unidades', 'id_comando' => '']).'"+$(this).val(), function(data) {
                                               $("#unidad-id_unidad").html(data);
                                               $("#cambio-id_cargo_cam").val("");
                                            });
                                           '
                                    ]
                                );  
                            ?>        
                        </div>
                    </div>
                    
                    <div class="row">
                
                        <div class="col-md-4">
                            <?= $form->field($unidad, 'id_unidad')->dropDownList(
                                    $lunidades,           
                                    [
                                        'prompt'=>'-Seleccione una unidad-',
                                        'onchange'=>'
                                            $.post("'.Yii::$app->urlManager->createUrl(['cambio/cargos', 'id_unidad' => '']).'"+$(this).val(), function(data) {
                                               $("#cargo-id_cargo").html(data);
                                               $("#cambio-id_cargo_cam").val("");
                                            });
                                           '
                                    ]
                                );
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($cargo, 'id_cargo')->dropDownList(
                                    $lcargos,           
                                    [
                                        'prompt'=>'-Seleccione un cargo-',
                                        'onchange'=>'
                                            $.post("'.Yii::$app->urlManager->createUrl(['cambio/seleccionarcargo', 'id_cargo' => '']).'"+$(this).val(), function(data) {
                                               $("#cambio-id_cargo_cam").val(data);
                                               //$("#departamento-id_departamento").val(10);
                                            });
                                           '
                                    ]
                                );
                            ?>
                            <?= Html::activeHiddenInput($model, "id_cargo_cam") ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'fdesignacion_cam')->input('date') ?>
                        </div>
                        
                        
                    </div>
            
                    <div class="row">
                        <div class="col-md-8">
                            <?= $form->field($model, 'glosa_cam')->textarea(['maxlength' => true]) ?>
                        </div>
                        
                    </div>
                </div>
            </div>   
            
            
            

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
            
            <div class="panel panel-info">
                <div class="panel panel-heading">Historial de cambios</div>
                <div class="panel panel-body">
                    <div class="table-responsive">
                        
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id</th>
                                <th scope="col">id policia</th>
                                <th scope="col">id cargo</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">unidad</th>
                                <th scope="col">departamento</th>
                                <th scope="col">fecha</th>
                                <th scope="col">estado</th>
                          </tr>
                        </thead>
                        <tbody id="cambios">
                            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="panel-footer">
            
        </div>
    </div>

    

    <?php ActiveForm::end(); ?>

</div>
