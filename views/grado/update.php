<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Grado */

$this->title = 'Update Grado: ' . $model->id_grado;
$this->params['breadcrumbs'][] = ['label' => 'Grados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_grado, 'url' => ['view', 'id' => $model->id_grado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
