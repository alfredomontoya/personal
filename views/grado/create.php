<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Grado */

$this->title = 'Create Grado';
$this->params['breadcrumbs'][] = ['label' => 'Grados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
