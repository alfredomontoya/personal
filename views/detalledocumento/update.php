<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Detalledocumento */

$this->title = 'Update Detalledocumento: ' . $model->id_detalledocumento;
$this->params['breadcrumbs'][] = ['label' => 'Detalledocumentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detalledocumento, 'url' => ['view', 'id' => $model->id_detalledocumento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalledocumento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
