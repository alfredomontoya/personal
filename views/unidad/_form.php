<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Unidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidad-form">
	<?php $form = ActiveForm::begin(); ?>
	<div class="panel panel-primary">
            <div class="panel-heading">
                    Datos unidad
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
                                    'onchange' => '$("#unidad-id_comando_uni").val($(this).val())',
                                    'value' => $comando->id_comando
                                ]
                            )->label('Comando');
                        ?>
                        <?= Html::activeHiddenInput($model, 'id_comando_uni') ?>
                        <?= $form->field($model, 'codigo_uni')->textInput(['maxlength' => true])->label('Codigo Unidad:') ?>
                        <?= $form->field($model, 'nombre_uni')->textInput(['maxlength' => true])->label('Nombre Unidad:') ?>
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
