<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Receiptdetail */

$this->title = 'Create Receiptdetail';
$this->params['breadcrumbs'][] = ['label' => 'Receiptdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receiptdetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
