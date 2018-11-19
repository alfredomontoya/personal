<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TramiteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tramite-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tramite') ?>

    <?= $form->field($model, 'id_usuario_tra') ?>

    <?= $form->field($model, 'id_cliente_tra') ?>

    <?= $form->field($model, 'numero_tra') ?>

    <?= $form->field($model, 'aduana_tra') ?>

    <?php // echo $form->field($model, 'procedencia_tra') ?>

    <?php // echo $form->field($model, 'proveedor_tra') ?>

    <?php // echo $form->field($model, 'cantidadbultos_tra') ?>

    <?php // echo $form->field($model, 'referencia_tra') ?>

    <?php // echo $form->field($model, 'peso_tra') ?>

    <?php // echo $form->field($model, 'regimen_tra') ?>

    <?php // echo $form->field($model, 'tipocambio_tra') ?>

    <?php // echo $form->field($model, 'mercancia_tra') ?>

    <?php // echo $form->field($model, 'docembarque_tra') ?>

    <?php // echo $form->field($model, 'partidaarancelaria_tra') ?>

    <?php // echo $form->field($model, 'valorfob_tra') ?>

    <?php // echo $form->field($model, 'fletes_tra') ?>

    <?php // echo $form->field($model, 'seguro_tra') ?>

    <?php // echo $form->field($model, 'otrosgastos_tra') ?>

    <?php // echo $form->field($model, 'valorcifsus_tra') ?>

    <?php // echo $form->field($model, 'valorcifbs_tra') ?>

    <?php // echo $form->field($model, 'estado_tra') ?>

    <?php // echo $form->field($model, 'glosa_tra') ?>

    <?php // echo $form->field($model, 'fecha_tra') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
