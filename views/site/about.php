<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Sofcruz';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <style type="text/css">
        .fade
        {
                opacity:0.5;
        }
        .fade:hover
        {
                opacity:1;
        }
    </style>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
</head>
<body>
<div class="site-about">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            Agencia de desarrollo de software
        </p>

        <img src="logo.svg" alt="..." class="img-rounded">

        <p>
            Equipo de desarrollo
        <ul>
            <li>Ing. Alfredo Montoya Calderón</li>
            <li>Ing. Cristian Marcelo Pizarroso Peredo</li>
            <li>Ing. Adhemar Franklin Romero</li>
            <li>Ing. Yina Noelia Jaldin Vaca</li>
            <li>Cabo. Gutierrez</li>
        </ul>
        

        <!--<code><?= __FILE__ ?></code>-->
    </div>
</div>

</body>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
