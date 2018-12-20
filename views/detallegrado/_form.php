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

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Buscar policia
        </div>    
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($policia, 'id_policia')->widget(AutoComplete::classname(), [
                        'value' =>'helo',
                        'clientOptions' => [
                            'source' => $policias,
                            'minLength' => '3',
                            'autoFill'=>true,
                            'label'=>'',
                            'select' => new \yii\web\JsExpression ("function( event, ui ) { "
                                    . '$("#detallegrado-id_policia_dg").val(ui.item.id); '
                                    . '$("#policia-nombre1_pol").val(ui.item.label2); '
                                    . '$("#policia-ci_pol").val(ui.item.label3); '
                                    . '$.post("'.Yii::$app->urlManager->createUrl(['detallegrado/grados', 'id_policia' => '']).'"+$("#detallegrado-id_policia_dg").val(), function(data) {'
                                    . '$("#grados").html(data);'
                                    . '$("#cambio-id_cargo_cam").val("");'
                                    . '});'
                                    . "}"),
                        ],
                        'options' => [
                            'class' => 'form-control',
                            'value'=>$policia->id_policia,
                        ],
                    ]) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'id_policia_dg')->textInput(['readonly' => true]) ?>
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
            Grado 
        </div>
        <div class="panel-body">
            <div class="row">
                
                <div class="col-md-4">
                            <?= $form->field($grado, 'codigo_gra')->widget(AutoComplete::classname(), [
                                'value' =>'helo',
                            'clientOptions' => [
                                    'source' => $grados,
                                    'minLength' => '1',
                                    'autoFill'=>true,
                                    'label'=>'',
                                    'select' => new \yii\web\JsExpression ("function( event, ui ) { "
                                            . "$('#detallegrado-id_grado_dg').val(ui.item.id); "
                                            . "$('#grado-descripcion_gra').val(ui.item.descripcion_gra); "
                                            . "}"),
                                ],
                                'options' => [
                                    'class' => 'form-control',
                                    //'value'=>$grados->id_grado,
                                ],
                            ]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($grado, 'descripcion_gra')->textInput(['maxlength' => true, 'readonly'=> true])->label('Grado:') ?>
                </div>
                <div class="col-md-4">
                    <?= Html::activeHiddenInput($model, "id_grado_dg") ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'fechaascenso_dg')->input('date')->label("Fecha Ascenso:") ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'glosa_dg')->textarea(['rows' => 3])->label('Glosa:') ?>
                </div>
            </div>
            
        </div>
    </div>

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
                    $nro=1;
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
                     }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
