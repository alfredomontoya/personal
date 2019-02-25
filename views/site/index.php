<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Personal Aplication';
$this->registerCssFile(yii\helpers\BaseUrl::base().'/web/MDB-Free_4.7.0/css')
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
    
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    
    <section>
      <div class="site-index">
          <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                
              </ol>
  <!--/.Indicators-->
    <div class="carousel-inner" role="listbox">
        <!--First slide-->
        <div class="carousel-item active">
          <div class="view">
            <div class="mascara">
              <img class="d-block w-100" src="banner21.png" alt="First slide">
            </div>
            <div class="mask rgba-black-light">
            </div>
          </div>
          <div class="carousel-caption">
            
            
          </div>
        </div>
        <div class="carousel-item">
          <div class="view">
             <div class="mascara">
              <img class="d-block w-100" src="banner22.png" alt="First slide">
            </div>
            <div class="mask rgba-black-light">
              
            </div>
          </div>
          <div class="carousel-caption">
            <div class="row">
                <!--Grid column-->
               
            </div>
          </div>
        </div>

        <!--/First slide-->
        <!--Second slide-->
        <!--/Second slide-->
        <!--Third slide-->
        
     </div>
      <!--/Third slide-->
   </div>
  <!--/.Slides-->
  <!--Controls-->
  
  <!--/.Controls-->

  <div class="texto_baner">
   <div class="col-md-12 white-text text-center wow fadeInDown" data-wow-delay="0.3s">
                <img src="policias.png" alt="" class="img-fluid">
              <h1 class="h1-responsive font-weight-bold mt-sm-5 p1">COMANDO DEPARTAMENTAL  DE SANTA CRUZ DE LA SIERRA </h1>
              <hr class="hr-light">
             
            
   <h6 class="mb-4 font-weight">
        <p> “La Policía Boliviana, como fuerza pública, tiene la misión específica de la defensa de la sociedad y la conservación del orden público, y el cumplimiento de las leyes en todo el territorio boliviano”.
        </p>
        <p class="oculta"> "CONTRA EL MAL POR EL BIEN DE TODOS"
        </p>
                     
                </h6>
  </div>
  
</div>


    </section>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
