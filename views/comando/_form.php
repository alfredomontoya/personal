<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comando */
/* @var $form yii\widgets\ActiveForm */
$this->registerJs(''
        . '// MDB Lightbox Init
        $(function () {
        $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
        });
        ');
?>

<div class="comando-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Datos comando
        </div>
        <div class="panel-body">
            
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'id_departamento_com')->dropDownList(
                                $ldepartamentos,           
                                [
                                    'prompt'=>'-Seleccione departamento-',
                                ]
                            )->label('Departamento');
                        ?>
                    <?= $form->field($model, 'codigo_com')->textInput(['maxlength' => true])->label('Codigo:') ?>
                    <?= $form->field($model, 'nombre_com')->textInput(['maxlength' => true])->label('Nombre comando:') ?>
                </div>
            </div>
            
            <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-warning']) ?>
            </div>
        </div>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
