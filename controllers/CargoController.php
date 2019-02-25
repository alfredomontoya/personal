<?php

namespace app\controllers;

use Yii;
use app\models\Cargo;
use app\models\Unidad;
use app\models\Departamento;
use app\models\Comando;
use app\models\CargoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use kartik\spinner\Spinner;
use yii\web\ForbiddenHttpException;


/**
 * CargoController implements the CRUD actions for Cargo model.
 */
class CargoController extends Controller
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
     * Lists all Cargo models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->can('cargo-index')) throw new ForbiddenHttpException('Acceso denegado! Consulte con el administrador.');

        $searchModel = new CargoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cargo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (!Yii::$app->user->can('cargo-view')) throw new ForbiddenHttpException('Acceso denegado! Consulte con el administrador.');

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cargo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->can('cargo-create')) throw new ForbiddenHttpException('Acceso denegado! Consulte con el administrador.');

        $model = new Cargo();
        $model->estado_car = 'AC';

        $departamento = new Departamento();
        $comando = new Comando();
        $unidad = new Unidad();

        $departamentos= Departamento::find()->all();
        $ldepartamentos = ArrayHelper::map($departamentos,'id_departamento','nombre_dep');
        $comandos = Comando::find()->where(['id_comando' => 0])->all();
        $lcomandos = ArrayHelper::map($comandos,'id_comando','nombre_com');
        $unidades = Unidad::find()->where(['id_unidad' => 0])->all();
        $lunidades = ArrayHelper::map($unidades,'id_unidad','nombre_uni');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_cargo]);
        }
        return $this->render('create', [
            'model' => $model,
            'departamento' => $departamento,
            'departamentos' => $departamentos,
            'ldepartamentos' => $ldepartamentos,
            'comando' => $comando,
            'comandos' => $comandos,
            'lcomandos' => $lcomandos,
            'unidad' => $unidad,
            'unidades' => $unidades,
            'lunidades' => $lunidades,
        ]);
        
    }

    
    public function actionUnidades($id_comando=0){
        //echo $id_departamento;
        $comando = Comando::findOne(['id_comando' => $id_comando]);
        $datos = Unidad::find()
                ->where(['id_comando_uni' => $id_comando])
                ->all();
        if (!empty($datos)) {
            echo "<option value=''>-Seleccione Unidad de ". $comando->nombre_com ."-</option>";
            foreach($datos as $row) {
                echo "<option value='".$row->id_unidad."'>".$row->nombre_uni."</option>";
            }
        } else {
            echo "<option>-</option>";
        }
    }
    /**
     * Updates an existing Cargo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!Yii::$app->user->can('cargo-update')) throw new ForbiddenHttpException('Acceso denegado! Consulte con el administrador.');

        $model = $this->findModel($id);


        $unidad = Unidad::find()->where(['id_unidad' => $model->id_unidad_car])->one();
        $comando = Comando::find()->where(['id_comando' => $unidad->id_comando_uni])->one();
        $departamento = Departamento::find()->where(['id_departamento' => $comando->id_departamento_com])->one();

        $unidades = Unidad::find()->where(['id_comando_uni' => $comando->id_comando])->all();
        $lunidades = ArrayHelper::map($unidades,'id_unidad','nombre_uni');

        $comandos = Comando::find()->all();
        $lcomandos = ArrayHelper::map($comandos,'id_comando','nombre_com');

        $departamentos= Departamento::find()->all();
        $ldepartamentos = ArrayHelper::map($departamentos,'id_departamento','nombre_dep');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_cargo]);
        }

        return $this->render('update', [
            'model' => $model,
            'departamento' => $departamento,
            'departamentos' => $departamentos,
            'ldepartamentos' => $ldepartamentos,
            'comando' => $comando,
            'comandos' => $comandos,
            'lcomandos' => $lcomandos,
            'unidad' => $unidad,
            'unidades' => $unidades,
            'lunidades' => $lunidades,
        ]);
        
    }

    /**
     * Deletes an existing Cargo model.
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
     * Finds the Cargo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cargo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cargo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
