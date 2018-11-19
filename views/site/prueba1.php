<?php
use yii\bootstrap\ActiveForm;
use unclead\multipleinput\MultipleInput;
use unclead\multipleinput\examples\models\ExampleModel;
use yii\helpers\Html;

/* @var $this \yii\base\View */
/* @var $model ExampleModel */
?>

<?php $form = ActiveForm::begin([
    'enableAjaxValidation'      => true,
    'enableClientValidation'    => false,
    'validateOnChange'          => false,
    'validateOnSubmit'          => true,
    'validateOnBlur'            => false,
]);?>

<?= $form->field($model, 'cliente')->widget(MultipleInput::className(), [
    'max' => 4,
    'columns' => [
        [
            'name'  => 'nombre_cli',
            'title' => 'Nombre',
            'enableError' => true,
        ],
        [
            'name'  => 'nitci_cli',
            'title' => 'Nit o Cedula de identidad',
        ],
        [
            'name'  => 'direccion_cli',
            'title' => 'Diteccion',
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
<?= Html::submitButton('Update', ['class' => 'btn btn-success']);?>
<?php ActiveForm::end();?>