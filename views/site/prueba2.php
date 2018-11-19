<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use unclead\multipleinput\MultipleInput;
use unclead\multipleinput\examples\models\ExampleModel;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="form">
    <?php $form = ActiveForm::begin([
    'enableAjaxValidation'      => true,
    'enableClientValidation'    => false,
    'validateOnChange'          => false,
    'validateOnSubmit'          => true,
    'validateOnBlur'            => false,
]);?>
    <?= $form->field($model, 'clientes')->widget(MultipleInput::className(), [
    'max' => 50,
    'columns' => [
        [
            'name'  => 'id_cliente',
            'title' => 'Id Cliente',
        ],
        [
            'name'  => 'nombre_cli',
            'title' => 'Nombre',
        ],
        [
            'name'  => 'nitci_cli',
            'title' => 'Nit o Cedula de identidad',
        ],
        [
            'name'  => 'direccion_cli',
            'title' => 'Direccion',
        ],
        [
            'name'  => 'telefono_cli',
            'title' => 'Telefono',
        ],
        [
            'name'  => 'correo_cli',
            'title' => 'Correo',
        ],
        [
            'name'  => 'estado_cli',
            'title' => 'Estado',
        ],
    ]
 ])
?>
    <?= Html::submitButton('Save'); ?>
    <?php ActiveForm::end(); ?>
</div><!-- form -->
    
