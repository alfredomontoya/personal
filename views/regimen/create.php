<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Regimen */

$this->title = 'Create Regimen';
$this->params['breadcrumbs'][] = ['label' => 'Regimens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regimen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
