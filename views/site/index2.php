<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?= $msg ?>

<h3>Subir archivos</h3>

<?php $form = ActiveForm::begin([
     "method" => "post",
     "enableClientValidation" => true,
     "options" => ["enctype" => "multipart/form-data"],
     ]);
?>

<?= $form->field($model, "file[]")->fileInput(['multiple' => true]) ?>
<p>
<?= Html::submitButton("Subir", ["class" => "btn btn-primary"]) ?>
</p>
<p>
<?= Html::img('@web/policias/11964_45', ['alt'=>'some', 'class'=>'thing']);?> 
    </p>
<?php
    $files=\yii\helpers\FileHelper::findFiles('policias', ['only' => ['1495*.*']]); 
    if (isset($files[0])) { 
     foreach ($files as $index => $file) { 
      $nameFicheiro = substr($file, strrpos($file, '/') + 1); 
      echo Html::a($nameFicheiro, \yii\helpers\Url::base().'/uploads/'.$nameFicheiro) . "<br/>" . "<br/>" ; // render do ficheiro no browser 
     } 
    } else { 
     echo "There are no files available for download."; 
} 
?>

<?php $form->end() ?>