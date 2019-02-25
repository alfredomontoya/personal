<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Policia */

$this->title = 'Modificar Policia: ' . $model->id_policia;
$this->params['breadcrumbs'][] = ['label' => 'Policias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_policia, 'url' => ['view', 'id' => $model->id_policia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="policia-update">
    <div class="container"> 
    
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
             'model' => $model,
                'imagen' => $imagen,
                'departamentos' => $departamentos,
                'ldepartamentos' => $ldepartamentos,
                'provincias' => $provincias,
                'lprovincias' => $lprovincias,
                'directorio' => $directorio,
                'msg' => $msg,
        ]) ?>
    </div>
</div>
