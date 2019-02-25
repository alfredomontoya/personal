<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Comando;
use app\models\Departamento;
use app\models\ComandoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers;
use yii\helpers\ArrayHelper;
use yii\web\ForbiddenHttpException;

/**
 * ComandoController implements the CRUD actions for Comando model.
 */
class ComandoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'view', '_form', '_search'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['*'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'createcambiocargo', 'createcambioexterno', 'update', 'view', '_form', '_search'],
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    $this->redirect(['/site/login']);
                    //echo "<script>"."location.href ='http://localhost:8080/personal/web/index.php?r=site/login';"."/*alert('Denegado');*/ "."</script>";
                    //$this->redirect(['site/about'], 302);
                    //throw new \Exception('No tienes los suficientes permisos para acceder a esta página');
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Comando models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('comando-index')){
            $searchModel = new ComandoSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');
        }
    }

    /**
     * Displays a single Comando model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('comando-view')){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');
        }
        
    }

    /**
     * Creates a new Comando model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('comando-create')){
            $model = new Comando();
            $model->estado_com = 'AC';
            $model->fecha_com = date('Y-m-d H:i');
            
            $departamentos= \app\models\Departamento::find()->all();
            $ldepartamentos = ArrayHelper::map($departamentos,'id_departamento','nombre_dep');

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $model->fecha_com = date('Y-m-d H:i');
                return $this->redirect(['view', 'id' => $model->id_comando]);
            }

            return $this->render('create', [
                'model' => $model,
                'departamentos' => $departamentos,
                'ldepartamentos' => $ldepartamentos,
            ]);
        } else {
            throw new ForbiddenHttpException('acceso Denegado');
        }
        
    }

    /**
     * Updates an existing Comando model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('comando-index')){
            $model = $this->findModel($id);
        
            $departamentos= \app\models\Departamento::find()->all();
            $ldepartamentos = ArrayHelper::map($departamentos,'id_departamento','nombre_dep');

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_comando]);
            }

            return $this->render('update', [
                'model' => $model,
                'departamentos' => $departamentos,
                'ldepartamentos' => $ldepartamentos,
            ]);
        } else {
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');
        }
        
    }

    /**
     * Deletes an existing Comando model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();

        //return $this->redirect(['index']);
    }

    /**
     * Finds the Comando model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comando the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comando::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
