<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Cliente;
use app\models\Detalledocumento;

use app\models\FormUpload;
use yii\web\UploadedFile;

use yii\base\Model;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup', 'about'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup', 'about'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'about'],
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    throw new \Exception('No tienes los suficientes permisos para acceder a esta página');
                    //$this->render('site/login');
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex2()
    {
        $model = new FormUpload;
        $msg = null;

        if ($model->load(Yii::$app->request->post()))
        {
            $model->file = UploadedFile::getInstances($model, 'file');
            $carpeta = '../web';
            if (!is_dir($carpeta)) {
                Yii::warning('DIRECTORIO NO ESISTE: ' . $carpeta );
                \yii\helpers\FileHelper::createDirectory($carpeta, $mode = 0775, $recursive = true);
                if (file_exists($carpeta)) {
                    Yii::warning('DIRECTORIO CREADO: ' . $carpeta );
                }
                else
                    Yii::warning('error al crear carpeta');
            } else {
                Yii::warning('DIRECTORIO YA ESISTE: ' . $carpeta );
            }

         if ($model->file && $model->validate()) {
          foreach ($model->file as $file) {
           $file->saveAs($carpeta.'/' . $file->baseName . '.' . $file->extension);
           $msg = $msg . "<br><p><strong class='label label-info'>Enhorabuena, subida realizada con éxito</strong></p>";
           Yii::warning('Archivo creado: ' . $carpeta.'/' . $file->baseName . '.' . $file->extension);
          }
         }
        }
        return $this->render("index2", ["model" => $model, "msg" => $msg]);
        //return $this->render('index2');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionAuto(){
        $items= [new Cliente(), new Cliente(), new Cliente()];
        if (Model::loadMultiple($items, Yii::$app->request->post()) && 
            Model::validateMultiple($items)) {
            $count = 0;
            foreach ($items as $item) {
               // populate and save records for each model
                if ($item->validate()) {
                    if ($item->save()){
                        $count++;
                    }
                    // do something here after saving
                }
            }
            Yii::$app->session->setFlash('success', "Processed {$count} records successfully.");
            return $this->redirect(['auto']); // redirect to your next desired page
        } else {
            return $this->render('auto', [
                'items' => $items,   
            ]);
        }
    }
    
    public function actionPrueba1(){
        $model = new Cliente();

        if ($model->load(Yii::$app->request->post())){
            $model->estado_cli = 'AC';
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id_cliente]);
            }
        }
            
        return $this->render('prueba1', [
            'model' => $model,
        ]);
    }
    
    public function actionPrueba2(){
        $model = new Cliente();
        if (Model::loadMultiple($clientes, Yii::$app->request->post()) && 
            Model::validateMultiple($clientes)) {
            $count = 0;
            foreach ($clientes as $item) {
               // populate and save records for each model
                if ($item->validate()) {
                    if ($item->save()){
                        $count++;
                    }
                    // do something here after saving
                }
            }
            Yii::$app->session->setFlash('success', "Processed {$count} records successfully.");
            return $this->redirect(['auto']); // redirect to your next desired page
        } else {
            return $this->render('prueba2', [
                'model' => $model,   
            ]);
        }
    }
    
    public function actionUpload()
    {

     $model = new FormUpload;
     $msg = null;

     if ($model->load(Yii::$app->request->post()))
     {
      $model->file = UploadedFile::getInstances($model, 'file');

      if ($model->file && $model->validate()) {
       foreach ($model->file as $file) {
        $file->saveAs('archivos/' . $file->baseName . '.' . $file->extension);
        $msg = "<p><strong class='label label-info'>Enhorabuena, subida realizada con éxito</strong></p>";
       }
      }
     }
     return $this->render("upload", ["model" => $model, "msg" => $msg]);
    }
}
