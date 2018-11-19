<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\jui\DatePicker;
use app\models\Detalledocumento;
use app\models\Detalleformulario;


/* @var $this yii\web\View */
/* @var $model app\models\Tramite */
/* @var $form yii\widgets\ActiveForm */
$this->registerJs(
    ""
    . "$('.delete-button').click(function() {
        var detail = $(this).closest('.receipt-detail');
        alert('documento');
        var updateType = detail.find('.update-type');
        alert(updateType.val());
        if (updateType.val() === " . json_encode(Detalledocumento::UPDATE_TYPE_UPDATE) . ") {
            //marking the row for deletion
            updateType.val(" . json_encode(Detalledocumento::UPDATE_TYPE_DELETE) . ");
            detail.hide();
        } else {
            //if the row is a new row, delete the row
            detail.remove();
        }

    });"
    . "$('.close-button').click(function() {
        var detail = $(this).closest('.formulario-detail');
        alert('formulario');
        var updateType = detail.find('.delete-type');
        alert(updateType.val());
        if (updateType.val() === " . json_encode(Detalleformulario::UPDATE_TYPE_UPDATE) . ") {
            //marking the row for deletion
            updateType.val(" . json_encode(Detalleformulario::UPDATE_TYPE_DELETE) . ");
            detail.hide();
        } else {
            //if the row is a new row, delete the row
            detail.remove();
        }

    });"
        . "function sumar(){"
            . "var tc = parseFloat($('#tramite-tipocambio_tra').val());"
            . "var a;"
            . "var b;"
            . "var c;"
            . "var d;"
            . "if (!isNaN($('#tramite-valorfob_tra').val())){"
                . "a = parseFloat($('#tramite-valorfob_tra').val());"
            . "} else {"
                . "a = 0;"
            . "}"
            . "if (!isNaN($('#tramite-fletes_tra').val())){"
                . "b = parseFloat($('#tramite-fletes_tra').val());"
            . "} else {"
                . "b = 0;"
            . "}"
            . "if (!isNaN($('#tramite-seguro_tra').val())){"
                . "c = parseFloat($('#tramite-seguro_tra').val());"
            . "} else {"
                . "c = 0;"
            . "}"
            . "if (!isNaN($('#tramite-otrosgastos_tra').val())){"
                . "d = parseFloat($('#tramite-otrosgastos_tra').val());"
            . "} else {"
                . "d = 0;"
            . "}"
            . "var r = (a + b + c + d);"
            ."$('#tramite-valorcifsus_tra').val(r);"
            ."$('#tramite-valorcifbs_tra').val(r * tc);"
        . "}"
        . ""
        . "$('#tramite-valorfob_tra').on('keyup', "
        . "function() { "
            . "sumar();"
        . "});"
        . "$('#tramite-seguro_tra').on('keyup', "
        . "function() { "
            . "sumar();"
        . "});"
        . "$('#tramite-fletes_tra').on('keyup', "
        . "function() { "
            . "sumar();"
        . "});"
        . "$('#tramite-otrosgastos_tra').on('keyup', "
        . "function() { "
            . "sumar();"
        . "});"
        . "",
 yii\web\View::POS_READY,
    'my-button-handler'
);
?>

<div class="tramite-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => true,
        'options'=>['class'=>'form-vertical']
        ]); ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <b>DATOS GENERALES DEL IMPORTADOR</b>
            </div>

            <div class="panel-body">
                <div class="cliente-form">
                    <div class="row">
                        <div class="col-md-2">
                            <?= $form->field($modelclientesearch, 'nitci_cli')->widget(AutoComplete::classname(), [
                                'value' =>'helo',
                            'clientOptions' => [
                                    'source' => $datacliente,
                                    'minLength' => '3',
                                    'autoFill'=>true,
                                    'label'=>'',
                                    'select' => new \yii\web\JsExpression ("function( event, ui ) { "
                                            . "$('#tramite-id_cliente_tra').val(ui.item.id); "
                                            . "$('#clientesearch-nombre_cli').val(ui.item.label); "
                                            . "}"),
                                ],
                                'options' => [
                                    'class' => 'form-control',
                                    'value'=>$cliente->nitci_cli,
                                ],
                            ]) ?>
                        </div>  
                        
                        <div class="col-md-6">
                            <?= $form->field($modelclientesearch, 'nombre_cli')->textInput(['maxlength' => true,'value' => $cliente->nombre_cli, 'readonly'=> true]) ?>
                        </div>
                        
                        <div class="col-md-2">
                            <?= $form->field($model, 'id_cliente_tra')->textInput(['maxlength' => true, 'value' => $cliente->id_cliente, 'readonly'=> true]) ?>   
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($model, 'numero_tra')->textInput(['maxlength' => true]) ?>   
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'proveedor_tra')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model,'aduana_tra')->dropDownList([
                                            'prompt' => 'Seleccione Uno',
                                        '701.ADUANA INTERIOR SC'=>'701.ADUANA INTERIOR SC',
                                        '711.AEROPUERTO VIRU VIRU'=>'711.AEROPUERTO VIRU VIRU',
                                    ]); ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'procedencia_tra')->widget(\yii\jui\AutoComplete::classname(), [
                                            'clientOptions' => [
                                                    'source' => $datapais,
                                                    'minLength' => '2',
                                                    'autoFill'=>true,
                                                    'select' => new \yii\web\JsExpression ("function( event, ui ) { "
                                                            . "$('#tramite-procedencia_tra').val(ui.item.value); "
                                                            . "}"),
                                                ],
                                                'options' => [
                                                    'class' => 'form-control'
                                                ],
                                        ]) ?>
                        </div>
                        <div class="col-md-4">
                           <?= $form->field($model, 'partidaarancelaria_tra')->textInput(['maxlength' => true]) ?>
                       </div>
                       <div class="col-md-4">
                           <?= $form->field($model, 'docembarque_tra')->textInput(['maxlength' => true]) ?>
                       </div>
                       <div class="col-md-4">
                           <?= $form->field($model, 'mercancia_tra')->textInput(['maxlength' => true]) ?>
                       </div>
                       <div class="col-md-4">
                           <?= $form->field($model, 'cantidadbultos_tra')->textInput() ?>
                       </div>

                        <div class="col-md-4">
                            <?= $form->field($model, 'peso_tra')->textInput() ?>
                        </div>

                        <div class="col-md-4">
                            <?= $form->field($model, 'tipocambio_tra')->textInput(['value'=> 6.96,'readonly'=> true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'regimen_tra')->widget(\yii\jui\AutoComplete::classname(), [
                                            'clientOptions' => [
                                                    'source' => $dataregimen,
                                                    'minLength' => '2',
                                                    'autoFill'=>true,
                                                    'select' => new \yii\web\JsExpression ("function( event, ui ) { "
                                                            . "$('#tramite-regimen_tra').val(ui.item.value); "
                                                            . "}"),
                                                ],
                                                'options' => [
                                                    'class' => 'form-control'
                                                ],
                                        ]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'referencia_tra')->textInput(['maxlength' => true]) ?>
                        </div>
                    
                </div>

            </div>
            </div>
            <div class="panel-footer">
                @mc Derechos Reservados
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading"><b>VALORES</b></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4"> <?= $form->field($model, 'valorfob_tra')->input('number') ?> </div>
                    <div class="col-md-4"> <?= $form->field($model, 'fletes_tra')->input('number') ?> </div>
                    <div class="col-md-4"> <?= $form->field($model, 'seguro_tra')->input('number') ?> </div>
                    <div class="col-md-4"> <?= $form->field($model, 'otrosgastos_tra')->input('number') ?> </div>
                    <div class="col-md-4"> <?= $form->field($model, 'valorcifsus_tra')->textInput(['readonly'=> true]) ?> </div>
                    <div class="col-md-4"> <?= $form->field($model, 'valorcifbs_tra')->textInput(['readonly'=> true]) ?> </div>
                    <div class="col-md-12"> <?= $form->field($model, 'glosa_tra')->textInput(['maxlength' => true]) ?> </div>
                </div>
            </div>        
        </div>

        <div class="panel panel-primary">
            <div class="panel panel-heading"><?= $msgdd ?></div>
            <div class="panel panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach ($modelDetails as $i => $modelDetail) : 
                            $sw = false;
                            if ($i <0) $sw = true;
                            ?>
                        
                            <div class="row receipt-detail receipt-detail-<?= $i ?>">
                                <div class="col-md-3">
                                    <?= $form->field($modelDetail, "[$i]documento_dd")->widget(\yii\jui\AutoComplete::classname(), [
                                        'clientOptions' => [
                                                'source' => $datadocumento,
                                                'minLength' => '2',
                                                'autoFill'=>true,
                                                'select' => new \yii\web\JsExpression ("function( event, ui ) { "
                                                        . "$('#Detalledocumento[id_documento_dd]').val(ui.item.id); "
                                                        . "}"),
                                            ],
                                            'options' => [
                                                'class' => 'form-control',
                                                'readonly'=>$sw
                                            ],
                                    ]) ?>
                                </div>
                                <div class="col-md-1">
                                    <?= Html::activeHiddenInput($modelDetail, "[$i]id_detalledocumento") ?>
                                    <?= Html::activeHiddenInput($modelDetail, "[$i]updateType", ['class' => 'update-type']) ?>
                                    <?= $form->field($modelDetail, "[$i]numero_dd") ?>
                                </div>
                                <div class="col-md-2">
                                    <?= $form->field($modelDetail, "[$i]fechadocumento_dd")->input('date') ?>
                                </div>
                                <div class="col-md-1">
                                    <?= $form->field($modelDetail, "[$i]cantidad_dd") ?>
                                </div>
                                <div class="col-md-1">
                                    <?=  $form->field($modelDetail, "[$i]orignal_dd")->checkbox(array(
                                                        'label'=>'',
                                                        'labelOptions'=>array('style'=>'padding:5px;'),
                                                        ))
                                                        ->label('Original'); ?>
                                </div>
                                <div class="col-md-1">
                                    <?=  $form->field($modelDetail, "[$i]copia_dd")->checkbox(array(
                                                        'label'=>'',
                                                        'labelOptions'=>array('style'=>'padding:5px;'),
                                                        ))
                                                        ->label('Copia...'); ?>
                                </div>
                                <div class="col-md-1">
                                    <?=  $form->field($modelDetail, "[$i]legalizado_dd")->checkbox(array(
                                                        'label'=>'',
                                                        'labelOptions'=>array('style'=>'padding:5px;'),
                                                        ))
                                                        ->label('Legalizado'); ?>
                                </div>
                                <div class="col-md-1">
                                    <?=  $form->field($modelDetail, "[$i]fotocopia_dd")->checkbox(array(
                                                        'label'=>'',
                                                        'labelOptions'=>array('style'=>'padding:5px;'),
                                                        ))
                                                        ->label('Fotocopia'); ?>
                                </div>
                                <div class="col-md-1">
                                    <?= Html::button('x', ['class' => 'delete-button btn btn-danger', 'data-target' => "receipt-detail-$i", "disabled"=>$modelDetails[$i]->disabled]) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="row">
                            <div class="col col-md-12">
                                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                <?= Html::submitButton('Add row', ['name' => 'addRow', 'value' => 'true', 'class' => 'btn btn-info']) ?>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    
    <div class="panel panel-primary">
        <div class="panel panel-heading"><?=$msgdf ?></div>
            <div class="panel panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach ($modelDetalleformulario as $i => $detalle) : 
                            ?>
                            <div class="row formulario-detail formulario-detail-<?= $i ?>">
                                <div class="col-md-4">
                                    <?= $form->field($modelFormularioSearch[$i], "[$i]nombre_form")->widget(\yii\jui\AutoComplete::classname(), [
                                        'clientOptions' => [
                                                'source' => $dataformulario,
                                                'minLength' => '2',
                                                'autoFill'=>true,
                                                'select' => new \yii\web\JsExpression ("function( event, ui ) { "
                                                        . "$('#detalleformulario-$i-id_formulario_df').val(ui.item.id); "
                                                        . "}"),
                                            ],
                                            'options' => [
                                                'class' => 'form-control',
                                                //'readonly'=>$sw
                                            ],
                                    ]) ?>
                                </div>
                                
                                <div class="col-md-1">
                                    <?= Html::activeHiddenInput($detalle, "[$i]id_detalleformulario") ?>
                                    <?= Html::activeHiddenInput($detalle, "[$i]id_tramite_df") ?>
                                    <?= $form->field($detalle, "[$i]id_formulario_df") ?>
                                    <?= Html::activeHiddenInput($detalle, "[$i]updateType", ['class' => 'delete-type']) ?>
                                </div>
                                
                                <div class="col-md-1">
                                    <?= $form->field($detalle, "[$i]id_tramite_df") ?>
                                </div>
                                
                                <div class="col-md-2">
                                    <?= $form->field($detalle, "[$i]fecha_df")->input('date') ?>
                                </div>
                                <div class="col-md-1">
                                    <?= Html::button('x', ['class' => 'close-button btn btn-danger', 'data-target' => "formulario-detail-$i",]) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="row">
                            <div class="col col-md-12">
                                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                <?= Html::submitButton('Add row', ['name' => 'addRowformulario', 'value' => 'true', 'class' => 'btn btn-info']) ?>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    
    
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
