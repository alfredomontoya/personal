<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker

/* @var $this yii\web\View */
/* @var $model app\models\Cambio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cambio-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-warning']) ?>
        </div>
        <!-- busqueda policia -->
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
                                        . '$("#cambio-id_policia_cam").val(ui.item.id); '
                                        . '$("#policia-ci_pol").val(ui.item.label3); '
                                        . '$.post("'.Yii::$app->urlManager->createUrl(['cambio/cargoactual', 'id_policia' => '']).'"+$("#cambio-id_policia_cam").val(), function(data) {'
                                            . '$("#cargoactual").html(data);'
                                        . '});'
                                        . '$.post("'.Yii::$app->urlManager->createUrl(['cambio/cargosunidadpolicia', 'id_policia' => '']).'"+$("#cambio-id_policia_cam").val(), function(data) {'
                                            . '$("#cargo-id_cargo").html(data);'
                                        . '});'
                                    . "}"),
                            ],
                            'options' => [
                                'class' => 'form-control',
                                'value'=>$policia->escalafon_pol,
                            ],
                        ])->label('Documento Identidad') ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($policia, 'ci_pol')->textInput(['readonly' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($policia, 'nombre1_pol')->textInput(['readonly' => true]) ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- CARGO ACTUAL -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Cargo actual
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Unidad</th>
                                <th scope="col">Comando</th>
                                <th scope="col">Departamento</th>
                          </tr>
                        </thead>
                        <tbody id="cargoactual">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--NUEVO CARGO-->
        <div class="panel panel-primary">
            <div class="panel-heading">
                DATOS DEL NUEVO CARGO
            </div>    
            <div class="panel-body">
                <div class='row'>
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
                        <?= Html::activeHiddenInput($model, "id_policia_cam") ?>
                        <?= Html::activeHiddenInput($model, "tipo_cam", ['value' => 'IN']) ?>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-md-4">
                        <?= $form->field($model, 'fdesignacion_cam')->widget(
                            \yii\jui\DatePicker::className(), 
                            [
                                'language' => 'es',
                                'dateFormat' => 'dd/MM/yyyy',//'yyyy-MM-dd',
                                // si estás usando bootstrap, la siguiente linea asignará correctamente el estilo del campo de entrada
                                'options' => ['class' => 'form-control'],
                                
                                // ... puedes configurar más propiedades del DatePicker aquí
                            ]
                        ) ?>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-md-4">
                        <?= $form->field($model, 'glosa_cam')->textarea(['maxlength' => true])  ?>
                    </div>
                </div>
        
            </div>
        </div>   

        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-warning']) ?>
        </div>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
