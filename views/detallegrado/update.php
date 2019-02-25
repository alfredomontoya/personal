<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Detallegrado */

$this->title = 'Modificar Grado Policia: ' . $model->id_detallegrado;
$this->params['breadcrumbs'][] = ['label' => 'Detallegrados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detallegrado, 'url' => ['view', 'id' => $model->id_detallegrado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detallegrado-update">
    <?= $this->render('_form', [
        'model' => $model,
        'policia' => $policia,
        'policias' => $policias,
        'grado' => $grado,
        'grados' => $grados,
        'detallegrado' => $detallegrado,
    ]) ?>

</div>
