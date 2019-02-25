<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cambio */

$this->title = 'Modificar Cambio: ' . $model->id_cambio;
$this->params['breadcrumbs'][] = ['label' => 'Cambios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cambio, 'url' => ['view', 'id' => $model->id_cambio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cambio-update">
    <div class="container">
        

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
                'policia' => $policia,
                'policias' => $policias,
                'departamento' => $departamento,
                'departamentos' => $departamentos,
                'ldepartamentos' => $ldepartamentos,
                'unidad' => $unidad,
                'unidades' => $unidades,
                'lunidades' => $lunidades,
                'comando' => $comando,
                'comandos' => $comandos,
                'lcomandos' => $lcomandos,
                'cargo' => $cargo,
                'cargos' => $cargos,
                'lcargos' => $lcargos,
                'cambios' => $cambios,
                //'lcambios' => $lcambios,
        ]) ?>
    </div>
</div>
