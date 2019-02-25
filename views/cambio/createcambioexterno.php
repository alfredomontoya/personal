<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cambio */

$this->title = 'Registrar cambio externo';
$this->params['breadcrumbs'][] = ['label' => 'Cambios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cambio-create">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= $this->render('_formcambioexterno', [
            'model' => $model,
            /*'cambioactual' => $cambioactual,
            'cargoactual' => $cargoactual,
            'unidadactual' => $unidadactual,
            'comandoactual' => $comandoactual,
            'departamentoactual' => $departamentoactual,
             * 
             */
            'policia' => $policia,
            'cargo' => $cargo,
            'unidad' => $unidad,
            'comando' => $comando,
            'departamento' => $departamento,
            'policias' => $policias,
            'departamento' => $departamento,
            'departamentos' => $departamentos,
            'ldepartamentos' => $ldepartamentos,
            'unidad' => $unidad,
            'unidades' => $unidades,
            'lunidades' => $lunidades,
            //'cargo' => $cargo,
            //'cargos' => $cargos,
            'lcargos' => $lcargos,
            'comando' => $comando,
            'comandos' => $comandos,
            'lcomandos' => $lcomandos,
            //'cambios' => $cambios,
            //'lcambios' => $lcambios,
        ]) ?>
    </div>
</div>
