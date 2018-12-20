<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Comando */

$this->title = 'Create Comando';
$this->params['breadcrumbs'][] = ['label' => 'Comandos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comando-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
