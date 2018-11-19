
   <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Tramite */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tramite-form">

    <?php $form = ActiveForm::begin([
    ]); ?>

    <div class="panel panel-primary">
        
        <div class="panel-heading">
            Datos Usuario Recepcion
        </div>
        
        <div class="panel-body">
           <div>
                <div class="col-md-4">
                    <?= $form->field($modelusuario, 'nombre_us')->textInput(['disabled' => 'disabled', 'value' => $datausuario[0]->nombre_us]) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($modelusuario, 'telefono_us')->textInput(['disabled' => 'disabled', 'value' => $datausuario[0]->telefono_us ]) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($modelusuario, 'email_us')->textInput(['disabled' => 'disabled', 'value' => $datausuario[0]->email_us]) ?>
                </div>
               <div class="col-md-2">
                    <?= $form->field($modelusuario, 'id_usuario')->textInput(['disabled' => 'disabled', 'value' => $datausuario[0]->id_usuario]) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'fecha_tra')->input('date') ?>
                </div>
            </div>
            

        </div>
        
    </div>
        
    <div class="panel panel-primary">
        
        <div class="panel-heading">
           Datos Recepcion
        </div>   
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($modelcli, 'nitci_cli')->widget(\yii\jui\AutoComplete::classname(), [
                        'clientOptions' => [
                                'source' => $datacli,
                                'minLength' => '3',
                                'autoFill'=>true,
                                'select' => new \yii\web\JsExpression ("function( event, ui ) { "
                                        . "$('#tramite-id_cliente_tra').val(ui.item.id); "
                                        . "$('#tramite-numero_tra').val(ui.item.label); "
                                        . "$('#cliente-nombre_cli').val(ui.item.nombre_cli);"
                                        . "$('#cliente-correo_cli').val(ui.item.correo_cli);"
                                        . "$('#cliente-telefono_cli').val(ui.item.telefono_cli);"
                                        . "}"),
                            ],
                            'options' => [
                                'class' => 'form-control'
                            ],
                    ]) ?>
                </div>
                <div class="col-md-1">
                    <?= $form->field($model, 'id_cliente_tra')->textInput()->label('Id Cli') ?>
                </div>
                <div class="col-md-5">
                    <?= $form->field($modelcli, 'nombre_cli')->textInput(['disabled' => 'disabled']) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($modelcli, 'correo_cli')->textInput(['disabled' => 'disabled']) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($modelcli, 'telefono_cli')->textInput(['disabled' => 'disabled']) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'numero_tra')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

        </div>
        
        <div class="panel-footer">
            @mc Derechos Reservados
        </div>
        
    </div>
    
    <div class="panel panel-primary">
        
        <div class="panel-heading">
            Otros Datos
        </div>
        
        <div class="panel-body">
            <div class="row">
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
                <div class="col-md-3">
                    <?= $form->field($model, 'proveedor_tra')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-1">
                    <?= $form->field($model, 'cantidadbultos_tra')->textInput()->label('C. Bul') ?>
                </div>
            </div>
            <div class="row">
                
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'referencia_tra')->textInput(['maxlength' => true]) ?>
                </div>
                
                <div class="col-md-4">
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
                <div class="col-md-2">
                    <?= $form->field($model, 'peso_tra')->textInput() ?>
                </div>
                <div class="col-md-2" >
                    <?= $form->field($model, 'tipocambio_tra')->textInput(['value' => '6.96'])->label('T. Camb.') ?>
                </div>
                
            </div>
            

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'mercancia_tra')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'docembarque_tra')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4" >
                    <?= $form->field($model, 'partidaarancelaria_tra')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            
          
        </div>
        
        <div class="panel-footer">
            @mc Derechos Reservados
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
        
                <div class="panel-heading">
                    Valores
                </div>
        
                <div class="panel-body">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'valorfob_tra')->textInput() ?>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-12">
                            <?= $form->field($model, 'seguro_tra')->textInput() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'otrosgastos_tra')->textInput() ?>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'valorcifsus_tra')->textInput() ?>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-lg-12" >
                            <?= $form->field($model, 'valorcifbs_tra')->textInput() ?>
                        </div>
                    </div>
                </div>          
        
                <div class="panel-footer">
                    @mc Derechos Reservados
                </div>

            </div>
        </div>
        <div class="col-md-6">
            
        </div>
    </div>
    

    
    
    
    

    
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

