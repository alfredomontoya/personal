<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Detallegrado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detallegrado-form">
    <div class="container">
        
        <h1><?= Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin(); ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Buscar policia
            </div>    
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($policia, 'id_policia')->widget(
                            AutoComplete::classname(), 
                            [
                                'clientOptions' => [
                                    'source' => $policias,
                                    'minLength' => '3',
                                    'autoFill'=>true,
                                    'select' => new \yii\web\JsExpression ("function( event, ui ) { "
                                            . '$("#detallegrado-id_policia_dg").val(ui.item.id); '
                                            . '$("#policia-nombrecompleto_pol").val(ui.item.label2); '
                                            . '$("#policia-ci_pol").val(ui.item.label3); '
                                            . '$.post("'.Yii::$app->urlManager->createUrl(['detallegrado/grados', 'id_policia' => '']).'"+$("#detallegrado-id_policia_dg").val(), function(data) {'
                                                . '$("#grados").html(data);'
                                                . '$("#cambio-id_cargo_cam").val("");'
                                            . '});'
                                            . '$.post("'.Yii::$app->urlManager->createUrl(['detallegrado/gradoactual', 'id_policia' => '']).'"+$("#detallegrado-id_policia_dg").val(), function(data) {'
                                                . '$("#gradoactual").html(data);'
                                            . '});'
                                            . "}"),
                            ],
                            'options' => [
                                'class' => 'form-control',
                                'value'=>$policia->id_policia,
                            ],
                        ])->label('Documento identidad:') ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($policia, 'ci_pol')->textInput(['readonly' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($policia, 'nombrecompleto_pol')->textInput(['readonly' => true]) ?>
                    </div>

                </div>
            </div>
        </div>
        
        <!-- GRADO ACTUAL -->
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
                                <th scope="col">Codigo</th>
                                <th scope="col">Grado</th>
                                <th scope="col">Ascenso</th>
                          </tr>
                        </thead>
                        <tbody id="gradoactual">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- FIN GRADO ACTUAL -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Registrar grado 
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($grado, 'id_grado')->dropDownList(
                            $lgrados, 
                            [
                               'prompt'=>'-Seleccione grado-',
                               'onchange'=>'
                                    $.post("'.Yii::$app->urlManager->createUrl(['detallegrado/seleccionargrado', 'id' => '']).'"+$(this).val(), function(data) {
                                       $("#detallegrado-id_grado_dg").val(data);
                                    });
                                    $.post("'.Yii::$app->urlManager->createUrl(['detallegrado/seleccionarcodigogra', 'id' => '']).'"+$(this).val(), function(data) {
                                       $("#grado-codigo_gra").val(data);
                                    });
                                   ',
                                
                            ]
                        );  
                    ?>
                    <?= Html::activeHiddenInput($model, "id_grado_dg") ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($grado, 'codigo_gra')->textInput(['maxlength' => true, 'readonly'=> true])->label('Grado:') ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'fechaascenso_dg')->widget(
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
                
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'glosa_dg')->textarea(['rows' => 3])->label('Glosa:') ?>
                        
                        <?= Html::activeHiddenInput($model, "id_policia_dg") ?>
                    </div>
                </div>
    <!--
        <div class="panel panel-info">
            <div class="panel panel-heading">Historial de grados</div>
            <div class="panel panel-body">
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id</th>
                            <th scope="col">id policia</th>
                            <th scope="col">id grado</th>
                            <th scope="col">Codigo grado</th>
                            <th scope="col">Descripcion grado</th>
                            <th scope="col">Fecha Ascenso</th>
                            <th scope="col">Fecha registro</th>
                            <th scope="col">Estado</th>
                      </tr>
                    </thead>
                    <tbody id="grados">
                        <?php
                        /*$nro=1;
                         foreach ($detallegrado as $i => $row) {
                             echo '<tr>';
                             echo '<td>' . $nro . '</td>';
                             echo '<td>' . $row->id_detallegrado . '</td>';
                             echo '<td>' . $row->id_policia_dg . '</td>';
                             echo '<td>' . $row->id_grado_dg . '</td>';
                             echo '<td>' . $row->gradoDg->codigo_gra . '</td>';
                             echo '<td>' . $row->gradoDg->descripcion_gra . '</td>';
                             echo '<td>' . $row->fechaascenso_dg . '</td>';
                             echo '<td>' . $row->fecha_dg . '</td>';
                             echo '<td>' . $row->estado_dg . '</td>';
                             echo '</tr>';
                             $nro++;
                         }*/
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    -->
                <div class="form-group">
                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                    <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-warning']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
