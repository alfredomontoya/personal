<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tramite */

$this->title = 'Update Tramite: ' . $model->id_tramite;
$this->params['breadcrumbs'][] = ['label' => 'Tramites', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tramite, 'url' => ['view', 'id' => $model->id_tramite]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tramite-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelclientesearch' => $modelclientesearch,
        'modelpais' => $modelpais,
        'modelregimen' => $modelregimen,
        'modelDetails' => $modelDetails,
        'modelDetalleformulario' => $modelDetalleformulario,
        'modelFormularioSearch' => $modelFormularioSearch,
        'modeldocumento' => $modeldocumento,
        'datausuario' => $datausuario,
        'datacliente' => $datacliente,
        'datapais' => $datapais,
        'dataregimen' => $dataregimen,
        'datadocumento' => $datadocumento,
        'dataformulario' => $dataformulario,
        'cliente' => $cliente,
        'msgdd' => $msgdd,
        'msgdf' => $msgdf,

    ]) ?>

</div>
