<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Unidad */

$this->title = 'Registrar Unidad';
$this->params['breadcrumbs'][] = ['label' => 'Unidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidad-create">
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
