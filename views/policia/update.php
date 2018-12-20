<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Policia */

$this->title = 'Update Policia: ' . $model->id_policia;
$this->params['breadcrumbs'][] = ['label' => 'Policias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_policia, 'url' => ['view', 'id' => $model->id_policia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="policia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
         'model' => $model,
            'grado' => $grado,
            'grados' => $grados,
            'detallegrado' => $detallegrado,
            'imagen' => $imagen,
            'departamentos' => $departamentos,
            'ldepartamentos' => $ldepartamentos,
            'provincias' => $provincias,
            'lprovincias' => $lprovincias,
            'msg' => $msg,
    ]) ?>

</div>
