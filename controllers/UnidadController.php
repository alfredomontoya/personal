<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Unidad;
use app\models\Departamento;
use app\models\Comando;
use app\models\UnidadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\ForbiddenHttpException;

/**
 * UnidadController implements the CRUD actions for Unidad model.
 */
class UnidadController extends Controller
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
     * Lists all Unidad models.
     * @return mixed
     */
    public function actionIndex()
    {

        if (Yii::$app->user->can('unidad-index')){
            $searchModel = new UnidadSearch();
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
     * Displays a single Unidad model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->can('unidad-view')){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');
        }  
    }

    /**
     * Creates a new Unidad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('unidad-create')){
            $model = new Unidad();
            $model->estado_uni = 'AC';

            $departamento = new Departamento();
            $comando = new Comando();

            $departamentos= Departamento::find()->all();
            $ldepartamentos = ArrayHelper::map($departamentos,'id_departamento','nombre_dep');
            $comandos= Comando::find()->where(['id_comando' => 0])->all();
            $lcomandos = ArrayHelper::map($comandos,'id_comando','nombre_com');

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_unidad]);
            }

            return $this->render('create', [
                'model' => $model,
                'departamento' => $departamento,
                'departamentos' => $departamentos,
                'ldepartamentos' => $ldepartamentos,
                'comando' => $comando,
                'comandos' => $comandos,
                'lcomandos' => $lcomandos,

            ]);
        } else {
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');
        }
    }
    
    public function actionComandos($id_departamento=0){
        //echo $id_departamento;
        $departamento = Departamento::findOne(['id_departamento' => $id_departamento]);
        $datos = Comando::find()
                ->where(['id_departamento_com' => $id_departamento])
                ->all();
        if (!empty($datos)) {
            echo "<option value=''>-Seleccione comando de ". $departamento->nombre_dep ."-</option>";
            foreach($datos as $row) {
                echo "<option value='".$row->id_comando."'>".$row->nombre_com."</option>";
            }
        } else {
            echo "<option>-</option>";
        }
}

    /**
     * Updates an existing Unidad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('unidad-update')){
            $model = $this->findModel($id);

            $comando = Comando::find()->where(['id_comando' => $model->id_comando_uni])->one();
            $departamento = Departamento::find()->where(['id_departamento' => $comando->id_departamento_com])->one();

            $comandos = Comando::find()->where(['id_departamento_com' => $departamento->id_departamento])->all();
            $lcomandos = ArrayHelper::map($comandos,'id_comando','nombre_com');

            $departamentos= Departamento::find()->all();
            $ldepartamentos = ArrayHelper::map($departamentos,'id_departamento','nombre_dep');


            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_unidad]);
            }

            return $this->render('update', [
                'model' => $model,
                'departamento' => $departamento,
                'departamentos' => $departamentos,
                'ldepartamentos' => $ldepartamentos,
                'comando' => $comando,
                'comandos' => $comandos,
                'lcomandos' => $lcomandos,
            ]);
        } else {
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');
        }
    }

    /**
     * Deletes an existing Unidad model.
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
     * Finds the Unidad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Unidad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Unidad::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
