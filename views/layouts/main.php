<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="MDB-Free_4.7.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="MDB-Free_4.7.0/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="MDB-Free_4.7.0/css/style.css" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark elegant-color-dark">
    <img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" height="30" class="d-inline-block align-top" alt="mdb logo">
    <a class="navbar-brand" href="#"><?= Yii::$app->name ?></a>
    
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/personal/web">Inicio
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <?php if (Yii::$app->user->can('policia-index')) {?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Policia
        </a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <?= (Yii::$app->user->can('policia-index'))? '<a class="dropdown-item" href="/personal/web/index?r=policia/index">Busqueda</a>' : ''?>
          <?= (Yii::$app->user->can('policia-create'))? '<a class="dropdown-item" href="/personal/web/index?r=policia/create">Registrar</a>' :''?>
          
        </div>
      </li>
      <?php }?>
      <?php if (Yii::$app->user->can('cambio-index')) {?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Cambio
        </a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <?= (Yii::$app->user->can('cambio-index'))? '<a class="dropdown-item" href="/personal/web/index?r=cambio/index">Busqueda</a>' : ''?>
          <?= (Yii::$app->user->can('cambio-create-cambiocargo'))? '<a class="dropdown-item" href="/personal/web/index?r=cambio/createcambiocargo">Cambio cargo</a>' : ''?>
          <?= (Yii::$app->user->can('cambio-create-cambiounidad'))? '<a class="dropdown-item" href="/personal/web/index?r=cambio/create">Cambio unidad</a>' : ''?>
          <?= (Yii::$app->user->can('cambio-create-cambioexterno'))? '<a class="dropdown-item" href="/personal/web/index?r=cambio/createcambioexterno">Cambio externo</a>' : ''?>
          
        </div>
      </li>
      <?php }?>
      <?php if (Yii::$app->user->can('detallegrado-index')) {?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Grado policia
        </a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <?= (Yii::$app->user->can('detallegrado-index'))? '<a class="dropdown-item" href="/personal/web/index?r=detallegrado/index">Busqueda</a>' : ''?>
          <?= (Yii::$app->user->can('detallegrado-create'))? '<a class="dropdown-item" href="/personal/web/index?r=detallegrado/create">Registrar</a>' : ''?>
          
        </div>
      </li>
      <?php }?>
      <?php if (Yii::$app->user->can('comando-index')) {?>
      <li class="nav-item">
        <a class="nav-link" href="/personal/web/index?r=comando/index">Comando</a>
      </li>
      <?php }?>
      <?php if (Yii::$app->user->can('unidad-index')) {?>
      <li class="nav-item">
        <a class="nav-link" href="/personal/web/index?r=unidad/index">Unidad</a>
      </li>
      <?php }?>
      <?php if (Yii::$app->user->can('cargo-index')) {?>
      <li class="nav-item">
        <a class="nav-link" href="/personal/web/index?r=cargo/index">Cargo</a>
      </li>
      <?php }?>
      <li class="nav-item">
        <a class="nav-link" href="/personal/web/index?r=site/about">Acerca de...</a>
      </li>
      
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-google-plus-g"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <i class="fas fa-user"></i>
          <?= Yii::$app->user->isGuest? 'Login': Yii::$app->user->identity->nombres  ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
            <?php
            echo Yii::$app->user->isGuest? 
                    '<a class="dropdown-item" href="/personal/web/index?r=site/login">Iniciar session</a>' 
                    : 
                      Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton('<h6>Cerrar Session (' . Yii::$app->user->identity->nombres . ')</h6>', ['class' => 'btn btn-link logout'])
                    . Html::endForm()
                    ;
            ?>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->
    <div class="full-width">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

    <!--
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; SofCruz <?= date('Y') ?></p>

        <p class="pull-right"><?php Yii::powered() ?></p>
    </div>
</footer>
    -->
    <!-- Footer -->
<footer class="page-footer font-small teal pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3">
                <!-- Content -->
                <h5 class="text-uppercase">COMANDO DEPARTAMENTAL DE LA POLICIA</h5>
                <p>2do Anillo - Av. Mendoza - frente al Hotel Cortez</p>
                <p>Teléfono:	345-5000</p>

            </div>
            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">
                
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">
                <!-- Links -->
                <h5 class="text-uppercase">Enlaces externos</h5>

                <ul class="list-unstyled">
                    <li><a href="#!">Policia Nacional</a></li>
                    <li><a href="#!">Diprove</a></li>
                    <li><a href="#!">FELCC</a></li>
                    <li><a href="#!">FELCN</a></li>
                </ul>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
        <a href="http://www.sofcruz.com"> sofcruz.com</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
    
<!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="MDB-Free_4.7.0/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="MDB-Free_4.7.0/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="MDB-Free_4.7.0/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="MDB-Free_4.7.0/js/mdb.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
