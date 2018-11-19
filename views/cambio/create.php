<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cambio */

$this->title = 'Create Cambio';
$this->params['breadcrumbs'][] = ['label' => 'Cambios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cambio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
