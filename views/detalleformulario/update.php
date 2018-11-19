<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Detalleformulario */

$this->title = 'Update Detalleformulario: ' . $model->id_detalleformulario;
$this->params['breadcrumbs'][] = ['label' => 'Detalleformularios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detalleformulario, 'url' => ['view', 'id' => $model->id_detalleformulario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalleformulario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelformulariosearch' => $modelformulariosearch,
        'modeltramitesearch' => $modeltramitesearch,
        'dataformulario' => $dataformulario,
        'datatramite' => $datatramite,
        'tramite' => $tramite,
            'formulario' => $formulario,
    ]) ?>

</div>
