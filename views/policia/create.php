<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Policia */

$this->title = 'Registrar Policia';
$this->params['breadcrumbs'][] = ['label' => 'Policias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="policia-create">
    <div class="container">
    <div class="panel panel-group">
        <div class="panel-heading">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
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
    </div>
</div>
