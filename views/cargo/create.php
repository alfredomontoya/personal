<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cargo */

$this->title = 'Registrar Cargo';
$this->params['breadcrumbs'][] = ['label' => 'Cargos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargo-create">
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
            'unidad' => $unidad,
            'unidades' => $unidades,
            'lunidades' => $lunidades,
        ]) ?>
    </div>
</div>
