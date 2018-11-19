<?php

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
    <table>
        <tr>
            <th>Nit</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Estado</th>
        </tr>
        <?php foreach($items as $i=>$item): ?>
            <tr>
                <td><?= $form->field($item,"[$i]nitci_cli"); ?></td>
                <td><?= $form->field($item,"[$i]nombre_cli"); ?></td>
                <td><?= $form->field($item,"[$i]direccion_cli"); ?></td>
                <td><?= $form->field($item,"[$i]telefono_cli"); ?></td>
                <td><?= $form->field($item,"[$i]correo_cli"); ?></td>
                <td><?= $form->field($item,"[$i]estado_cli")->dropDownList([
                    'AC'=>'ACTIVO',
                    'IN'=>'INICIADO',
                    'PE'=>'PENDIENTE',
                ]); ?></td>

            </tr>
        <?php endforeach; ?>
    </table>
    <?= Html::submitButton('Save'); ?>
    <?php ActiveForm::end(); ?>
</div><!-- form -->
    