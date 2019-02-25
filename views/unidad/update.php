<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Unidad */

$this->title = 'Modificar Unidad: ' . $model->id_unidad;
$this->params['breadcrumbs'][] = ['label' => 'Unidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_unidad, 'url' => ['view', 'id' => $model->id_unidad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unidad-update">

	<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>
	    <?= $this->render('_form', [
	        'model' => $model,
	        'departamento' => $departamento,
	        'departamentos' => $departamentos,
	        'ldepartamentos' => $ldepartamentos,
                'comando' => $comando,
	        'comandos' => $comandos,
	        'lcomandos' => $lcomandos,
	    ]) ?>
    </div>

</div>
