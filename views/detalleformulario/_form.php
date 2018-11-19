<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\Detalleformulario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalleformulario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modeltramitesearch, 'numero_tra')->widget(AutoComplete::classname(), [
                                'value' =>'helo',
                            'clientOptions' => [
                                    'source' => $datatramite,
                                    'minLength' => '3',
                                    'autoFill'=>true,
                                    'label'=>'',
                                    'select' => new \yii\web\JsExpression ("function( event, ui ) { "
                                            . "$('#detalleformulario-id_tramite_df').val(ui.item.id); "
                                            . "$('#clientesearch-nombre_cli').val(ui.item.label); "
                                            . "}"),
                                ],
                                'options' => [
                                    'class' => 'form-control',
                                    //'value'=>$tramite->numero_tra,
                                ],
                            ]) ?>

    <?= $form->field($model, 'id_tramite_df')->textInput() ?>

    <?= $form->field($modelformulariosearch, 'nombre_form')->widget(AutoComplete::classname(), [
                                'value' =>'helo',
                            'clientOptions' => [
                                    'source' => $dataformulario,
                                    'minLength' => '3',
                                    'autoFill'=>true,
                                    'label'=>'',
                                    'select' => new \yii\web\JsExpression ("function( event, ui ) { "
                                            . "$('#detalleformulario-id_formulario_df').val(ui.item.id); "
                                            . "$('#clientesearch-nombre_cli').val(ui.item.label); "
                                            . "}"),
                                ],
                                'options' => [
                                    'class' => 'form-control',
                                    'value'=>$formulario->nombre_form,
                                ],
                            ]) ?>

    <?= $form->field($model, 'id_formulario_df')->textInput() ?>
    

    <?= $form->field($model, 'fecha_df')->input('date') ?>

    <?= $form->field($model, 'estado_df')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
