<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Formulario */

$this->title = 'Update Formulario: ' . $model->id_formulario;
$this->params['breadcrumbs'][] = ['label' => 'Formularios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_formulario, 'url' => ['view', 'id' => $model->id_formulario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="formulario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
