<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Comando */

$this->title = 'Registrar Comando';
$this->params['breadcrumbs'][] = ['label' => 'Comandos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comando-create">
    <div class="container">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
            'departamentos' => $departamentos,
        'ldepartamentos' => $ldepartamentos,
        ]) ?>
    </div>
</div>
