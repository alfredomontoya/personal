<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Policia;
use app\models\PoliciaSearch;
use app\models\Detallegrado;
use app\models\DetallegradoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Imagen;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

/**
 * PoliciaController implements the CRUD actions for Policia model.
 */
class PoliciaController extends Controller
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
                        'actions' => ['index', 'create', 'update', 'view', '_form', '_search'],
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    echo "<script>"."location.href ='http://localhost:8084/personal/web/index.php?r=site/login';"."/*alert('Denegado');*/ "."</script>";
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
     * Lists all Policia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PoliciaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Policia model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $detallegrado = Detallegrado::find()->where(['id_policia_dg' => $model->id_policia])->all();
        return $this->render('view', [
            'model' => $model,
            'detallegrado' => $detallegrado,
        ]);
    }

    /**
     * Creates a new Policia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_departamento=0)
    {
        $msg = "iniciando... <br>";
        
        $model = new Policia();
        $imagen = new Imagen();
        $detallegrado = new Detallegrado();
        $detallegradosearch = new DetallegradoSearch();
        $grado = new \app\models\Grado();
        $departamento = new \app\models\Departamento();
        $provincia = new \app\models\Provincia();
        
        $grados = \app\models\Grado::find()
                ->select(['descripcion_gra as value', 'id_grado as id', "descripcion_gra as label", 'codigo_gra as codigo_gra'])
                ->asArray()
                ->all();
        
        $departamentos= \app\models\Departamento::find()->all();
        $ldepartamentos = ArrayHelper::map($departamentos,'nombre_dep','nombre_dep');
        
        $provincias= \app\models\Provincia::find()->where(['id_departamento_prov' => $id_departamento])->all();
        $lprovincias = ArrayHelper::map($provincias,'nombre_prov','nombre_prov');
        
        if ($model->load(Yii::$app->request->post())){
            $msg = $msg . 'cargado datos policia ok <br>';
            if ($detallegrado->load(Yii::$app->request->post())){
                $msg = $msg . 'cargado datos detallegrado ok <br>';
                $model->estado_pol = 'AC';
                $imagen->archivo = UploadedFile::getInstance($imagen, 'archivo');
                if ($model->validate() ) {
                    $msg = $msg . 'validate policia ok <br>';
                    
                    
                        $msg = $msg . 'validate detallegrado ok <br>';
                        
                        if ($model->save()) {
                            $imagen->archivo->saveAs('policias/' . $model->id_policia . '_foto.' . $imagen->archivo->extension);
                            $msg = $msg . 'save policia ok <br>';
                            $detallegrado->id_policia_dg = $model->id_policia;
                            $detallegrado->fecha_dg = date('y-m-d H:i:s');
                            $detallegrado->estado_dg='AC';
                                $msg = $msg . $detallegrado->id_detallegrado. '<br>';
                                $msg = $msg . $detallegrado->id_policia_dg. '<br>';
                                $msg = $msg . $detallegrado->id_grado_dg. '<br>';
                                $msg = $msg . $detallegrado->glosa_dg. '<br>';
                                $msg = $msg . $detallegrado->fechaascenso_dg. '<br>';
                                $msg = $msg . $detallegrado->fecha_dg. '<br>';
                                $msg = $msg . $detallegrado->estado_dg. '<br>';
                            if ($detallegrado->validate()){
                                
                                if ($detallegrado->save())
                                    $msg = $msg . 'save detallegrado ok <br>';
                                else
                                    $msg = $msg . 'save detallegrado err <br>';

                                return $this->redirect([
                                    'view', 
                                    'id' => $model->id_policia
                                    ]);
                            } else {
                                $msg = $msg . 'validate detallegrado err <br>';
                            }

                        } else {
                            $msg = $msg . 'save policia err <br>';
                        }
                    
                } else {
                    $msg = $msg . 'validate policia err <br>';
                    throw new \yii\web\HttpException(404, 'The requested Item could not be found.'); 
                }
            } else {
                $msg = $msg . 'cargado datos detallegrado err <br>';
            }
            
        } else {
            $msg = $msg . 'cargado datos policia err <br>';
        }

        return $this->render('create', [
            'model' => $model,
            'grado' => $grado,
            'grados' => $grados,
            'detallegrado' => $detallegrado,
            'imagen' => $imagen,
            'departamentos' => $departamentos,
            'ldepartamentos' => $ldepartamentos,
            'provincias' => $provincias,
            'lprovincias' => $lprovincias,
            'msg' => $msg,
        ]);
    }
    
    public function actionProvincias($id=0){
        $datos = \app\models\Provincia::find()
                ->joinWith(['departamentoProv d'], TRUE, 'INNER JOIN')
                ->where(['d.nombre_dep' => $id])
                ->all();
        //echo "<option value='".$id_departamento."'>".$id_departamento."</option>";
        if (!empty($datos)) {
            echo "<option value=''>Seleccione un cargo</option>";
            foreach($datos as $row) {
                echo "<option value='".$row->id_provincia."'>".$row->nombre_prov."</option>";
            }
        } else {
            echo "<option>-</option>";
        }
    }
    
    public function actionSeleccionarprovincia($id=0){
        
        echo \app\models\Provincia::find()->where(['id_provincia'=>$id])->one()->nombre_prov;
    }

    /**
     * Updates an existing Policia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $id_departamento=0)
    {
        $model = $this->findModel($id);
        $imagen = new Imagen();
        //yii\helpers\File
        $detallegrado = Detallegrado::findOne(['id_policia_dg' => $model->id_policia, 'estado_dg' => 'AC']);
        
        
        /*************/////////////////
        $msg = "iniciando... <br>";
        
        //$departamento = new \app\models\Departamento();
        //$provincia = new \app\models\Provincia();
        
        $grados = \app\models\Grado::find()
                ->select(['codigo_gra as value', 'id_grado as id', "codigo_gra as label", 'descripcion_gra as descripcion_gra'])
                ->asArray()
                ->all();
        
        $departamentos= \app\models\Departamento::find()->all();
        $ldepartamentos = ArrayHelper::map($departamentos,'nombre_dep','nombre_dep');
        
        //$provincias= \app\models\Provincia::find()-> where(['id_departamento_prov' => $id_departamento])->all();
        $provincias = \app\models\Provincia::find()->joinWith(['departamentoProv dep'], true, 'INNER JOIN')->where(['dep.nombre_dep' => $model->dptonacimiento_pol])->all();
        $lprovincias = ArrayHelper::map($provincias,'nombre_prov','nombre_prov');
        ////////////////*////
        
        $detallegradosearch = new DetallegradoSearch();
        $grado = \app\models\Grado::findOne(['id_grado' => $detallegrado->id_grado_dg]);
        
        $grados = \app\models\Grado::find()
                ->select(['codigo_gra as value', 'id_grado as id', "codigo_gra as label", 'descripcion_gra as descripcion_gra'])
                ->asArray()
                ->all();
        
        if ($model->load(Yii::$app->request->post())&& $detallegrado->load(Yii::$app->request->post()) && $model->save() && $detallegrado->save()) {
            $imagen->archivo = UploadedFile::getInstance($imagen, 'archivo');
            $imagen->archivo->saveAs('policias/' . $model->id_policia . '_foto.' . $imagen->archivo->extension);
            
            return $this->redirect(['view', 'id' => $model->id_policia]);
        }

        return $this->render('update', [
             'model' => $model,
            'grado' => $grado,
            'grados' => $grados,
            'detallegrado' => $detallegrado,
            'imagen' => $imagen,
            'departamentos' => $departamentos,
            'ldepartamentos' => $ldepartamentos,
            'provincias' => $provincias,
            'lprovincias' => $lprovincias,
            'msg' => $msg,
        ]);
    }

    /**
     * Deletes an existing Policia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Policia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Policia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Policia::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
