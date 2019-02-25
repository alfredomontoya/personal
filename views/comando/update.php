<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comando */

$this->title = 'Modificar Comando: ' . $model->id_comando;
$this->params['breadcrumbs'][] = ['label' => 'Comandos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_comando, 'url' => ['view', 'id' => $model->id_comando]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comando-update">

    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
            'departamentos' => $departamentos,
                'ldepartamentos' => $ldepartamentos,
        ]) ?>
    </div>

</div>
