<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Regimen */

$this->title = 'Update Regimen: ' . $model->id_regimen;
$this->params['breadcrumbs'][] = ['label' => 'Regimens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_regimen, 'url' => ['view', 'id' => $model->id_regimen]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="regimen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
