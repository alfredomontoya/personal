<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cargo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cargo-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Datos Cargo
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($departamento, 'id_departamento')->dropDownList(
                                $ldepartamentos,           
                                [
                                    'prompt'=>'-Seleccione departamento-',
                                    'onchange'=>'
                                        $.post("'.Yii::$app->urlManager->createUrl(['unidad/comandos', 'id_departamento' => '']).'"+$(this).val(), function(data) {
                                            $("#comando-id_comando").html(data);
                                            //$("#cambio-id_cargo_cam").val("");
                                        });
                                       ',
                                    'value' => $departamento->id_departamento
                                ]
                            )->label('Departamento');
                        ?>
                    <?= $form->field($comando, 'id_comando')->dropDownList(
                            $lcomandos,           
                            [
                                'prompt'=>'-Seleccione comando-',
                                'onchange'=>'
                                        $.post("'.Yii::$app->urlManager->createUrl(['cargo/unidades', 'id_comando' => '']).'"+$(this).val(), function(data) {
                                            $("#unidad-id_unidad").html(data);
                                            //$("#cambio-id_cargo_cam").val("");
                                        });
                                       ',
                                'value' => $comando->id_comando
                            ]
                        )->label('Comando');
                    ?>
                    <?= $form->field($unidad, 'id_unidad')->dropDownList(
                            $lunidades,           
                            [
                                'prompt'=>'-Seleccione unidad-',
                                'onchange' => '$("#cargo-id_unidad_car").val($(this).val())',
                                'value' => $unidad->id_unidad
                            ]
                        )->label('Unidad');
                    ?>
                    <?= Html::activeHiddenInput($model, 'id_unidad_car') ?>
                    <?= $form->field($model, 'nombre_car')->textInput(['maxlength' => true])->label('Nombre Cargo:') ?>
                    <div class="form-group">
                        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                        <?= Html::a('Cancelar',['index'], ['class' => 'btn btn-warning']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    

    

    <?php ActiveForm::end(); ?>

</div>
