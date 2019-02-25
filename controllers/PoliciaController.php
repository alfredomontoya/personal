<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Policia;
use app\models\Grado;
use app\models\PoliciaSearch;
use app\models\Detallegrado;
use app\models\DetallegradoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Imagen;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use yii\web\ForbiddenHttpException;

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
     * Lists all Policia models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->can('policia-index'))
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');

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
        if(!Yii::$app->user->can('policia-view'))
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');

        $model = $this->findModel($id);
        //$detallegrado = Detallegrado::find()->where(['id_policia_dg' => $model->id_policia])->all();
        $imagenpolicia = \app\models\Imagenpolicia::find()->where(['id_policia_imp' => $model->id_policia, 'estado_imp' => 'AC'])->all();
        return $this->render('view', [
            'model' => $model,
            'imagenpolicia' => $imagenpolicia,
        ]);
    }

    /**
     * Creates a new Policia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_departamento=0)
    {
        if(!Yii::$app->user->can('policia-create'))
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');

        $msg = "iniciando... <br>";
        
        $model = new Policia();
        $imagen = new Imagen();
        $departamento = new \app\models\Departamento();
        $provincia = new \app\models\Provincia();
        
        $departamentos= \app\models\Departamento::find()->all();
        $ldepartamentos = ArrayHelper::map($departamentos,'nombre_dep','nombre_dep');
        
        $provincias= \app\models\Provincia::find()->where(['id_departamento_prov' => $id_departamento])->all();
        $lprovincias = ArrayHelper::map($provincias,'nombre_prov','nombre_prov');
        
        if ($model->load(Yii::$app->request->post())){
           Yii::warning('cargado datos policia ok <br>');
            $model->estado_pol = 'AC';
            $imagen->archivo = UploadedFile::getInstances($imagen, 'archivo');
            if ($model->validate() ) {
                Yii::warning('validate policia ok <br>');

                if ($model->save()) {
                    Yii::warning('registro policia ok <br>');
                    $carpeta = 'policias';

                    foreach ($imagen->archivo as $file) {
                        //$file->saveAs($carpeta. '/' . $file->baseName . '.' . $file->extension);
                        $imagenpolicia = new \app\models\Imagenpolicia([
                            'id_policia_imp' => $model->id_policia,
                            'fecha_imp' => date('y-m-d H:i:s'),
                            'estado_imp' => 'AC'
                        ]);
                        $imagenpolicia->save();
                        $namefile_imp = $carpeta . '/' . $model->id_policia . '_' . $imagenpolicia->id_imagenpolicia . '.'. $file->extension;
                        $imagenpolicia->namefile_imp = $namefile_imp;
                        $imagenpolicia->save();
                        \Yii::warning('creando imagen: '.$namefile_imp);
                        $file->saveAs($namefile_imp);
                        if (file_exists($namefile_imp))
                            \Yii::warning('imagen creada: '.$namefile_imp);
                        else
                            \Yii::warning('imagen NO creada: '.$namefile_imp);

                    }
                    return $this->redirect(['view', 'id' => $model->id_policia]);
                } else {
                   Yii::warning('save policia err <br>');
                }

            } else {
               Yii::warning('validate policia err <br>');
                throw new \yii\web\HttpException(404, 'The requested Item could not be found.'); 
            }
        } else {
           Yii::warning('cargado datos policia err <br>');
        }

        return $this->render('create', [
            'model' => $model,
            'imagen' => $imagen,
            'departamentos' => $departamentos,
            'ldepartamentos' => $ldepartamentos,
            'provincias' => $provincias,
            'lprovincias' => $lprovincias,
            'directorio' => 'default',
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
    
    public function actionSeleccionargrado($id=0){
        
        echo (!is_null($id))? \app\models\Grado::find()->where(['id_grado'=>$id])->one()->codigo_gra : new Grado();
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
        if(!Yii::$app->user->can('policia-update'))
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');

        $model = $this->findModel($id);
//        $directorio = opendir('web/policias');
        $imagen = new Imagen();
        //yii\helpers\File
        
        /*************/////////////////
        $msg = "iniciando... <br>";
        
        //$departamento = new \app\models\Departamento();
        //$provincia = new \app\models\Provincia();
        
        
        $departamentos= \app\models\Departamento::find()->all();
        $ldepartamentos = ArrayHelper::map($departamentos,'nombre_dep','nombre_dep');
        
        //$provincias= \app\models\Provincia::find()-> where(['id_departamento_prov' => $id_departamento])->all();
        $provincias = \app\models\Provincia::find()->joinWith(['departamentoProv dep'], true, 'INNER JOIN')->where(['dep.nombre_dep' => $model->dptonacimiento_pol])->all();
        $lprovincias = ArrayHelper::map($provincias,'nombre_prov','nombre_prov');
        ////////////////*////
        //$detallegradosearch = new DetallegradoSearch();
        
        if ($model->load(Yii::$app->request->post()))
            if ($model->save()){
                $carpeta = 'policias';
                $imagen->archivo = UploadedFile::getInstances($imagen, 'archivo');
                foreach ($imagen->archivo as $file) {
                    //$file->saveAs($carpeta. '/' . $file->baseName . '.' . $file->extension);
                    $imagenpolicia = new \app\models\Imagenpolicia([
                        'id_policia_imp' => $model->id_policia,
                        'fecha_imp' => date('y-m-d H:i:s'),
                        'estado_imp' => 'AC'
                    ]);
                    $imagenpolicia->save();
                    $namefile_imp = $carpeta . '/' . $model->id_policia . '_' . $imagenpolicia->id_imagenpolicia . '.'. $file->extension;
                    $imagenpolicia->namefile_imp = $namefile_imp;
                    $imagenpolicia->save();
                    \Yii::warning('creando imagen: '.$namefile_imp);
                    $file->saveAs($namefile_imp);
                    if (file_exists($namefile_imp))
                        \Yii::warning('imagen creada: '.$namefile_imp);
                    else
                        \Yii::warning('imagen NO creada: '.$namefile_imp);

                }
                return $this->redirect(['view', 'id' => $model->id_policia]);
                
            } else
                Yii::warning ('policia registro err!');


        return $this->render('update', [
             'model' => $model,
            'imagen' => $imagen,
            'departamentos' => $departamentos,
            'ldepartamentos' => $ldepartamentos,
            'provincias' => $provincias,
            'lprovincias' => $lprovincias,
            'directorio' => 'policias',
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
        //$this->findModel($id)->delete();

        //return $this->redirect(['index']);
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
