<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Cambio;
use app\models\Policia;
use app\models\Cargo;
use app\models\Unidad;
use app\models\Comando;
use app\models\Departamento;
use app\models\CambioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers;
use yii\web\HttpException;
use yii\helpers\ArrayHelper;
use yii\web\ForbiddenHttpException;


/**
 * CambioController implements the CRUD actions for Cambio model.
 */
class CambioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'createcambiocargo', 'createcambioexterno',  'update', 'view', '_form', '_search'],
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
     * Lists all Cambio models.
     * @return mixed
     */
    public function actionIndex()
    {

        if(!Yii::$app->user->can('cambio-index'))
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');

        $searchModel = new CambioSearch();
        
        //$searchModel->estado_cam = 'AC';
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cambio model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        if(!Yii::$app->user->can('cambio-view'))
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');

        $model = $this->findModel($id);
        $policia = \app\models\Policia::find()->where(['id_policia' => $model->id_policia_cam])->one();
        $cambios = Cambio::find()->where(['id_policia_cam' => $model->id_policia_cam])->all();
        //$grado = \app\models\Grado::find()->joinWith($with, $eagerLoading)
        $detallegrado = \app\models\Detallegrado::find()->where(['id_policia_dg' => $policia->id_policia, 'estado_dg' => 'AC'])->one();
        return $this->render('view', [
            'model' => $model,
            'policia' => $policia,
            'detallegrado' => $detallegrado,
            'cambios' => $cambios,
        ]);
    }

    /**
     * Creates a new Cambio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_departamento=1, $id_unidad=0, $id_policia=0)
    {
        if(!Yii::$app->user->can('cambio-create-cambiounidad'))
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');

        $model = new Cambio();
        $model->fdesignacion_cam = date('Y-m-d');
        $model->estado_cam = 'AC';
        
        $policia = new \app\models\Policia();
        $comando = new \app\models\Comando();
        $departamento = new \app\models\Departamento();
        $unidad = new \app\models\Unidad();
        
        
        //$policia = \app\models\Policia::find()->where(['id_policia' => $id_policia])->one();
        //$departamento = \app\models\Departamento::find()->where(['id_departamento' => $id_departamento])->one();
        //$unidad = \app\models\Unidad::find()->where(['id_unidad'=> $id_unidad])->one();
        $cargo = new \app\models\Cargo();
        
        $policias = \app\models\Policia::find()
                ->select(
                        [
                            'id_policia as value', 
                            'id_policia as id', 
                            "concat("
                            ."' id: ',id_policia, "
                            ."' esc: ',escalafon_pol, "
                            ."' ci: ', ci_pol, "
                            ."' nomb: ', paterno_pol, ' ', materno_pol, ' ', nombre1_pol "
                            .") as label", 
                            "concat("
                            ."paterno_pol, ' ', materno_pol, ' ', nombre1_pol "
                            .") as label2", 
                            "concat("
                            ."ci_pol, ' ', exp_pol "
                            .") as label3", 
                            ])
                ->asArray()
                ->all();
        
       
        $departamentos= \app\models\Departamento::find()->all();
        $ldepartamentos = ArrayHelper::map($departamentos,'id_departamento','nombre_dep');
        
        $comandos= \app\models\Comando::find()->where(['id_departamento_com' => '1' , 'estado_com' => 'AC'])->all();
        $lcomandos = ArrayHelper::map($comandos,'id_comando','nombre_com');
        
        $unidades = \app\models\Unidad::find()->where(['id_comando_uni' => $id_departamento])->all();
        $lunidades = ArrayHelper::map($unidades, 'id_unidad', 'nombre_uni');
        
        $cargos = \app\models\Cargo::find()->where(['id_unidad_car' => $id_unidad])->all();
        $lcargos = ArrayHelper::map($cargos, 'id_cargo', 'nombre_car');
        
        //$cambios = Cambio::find()->where(['id_policia_cam' => $id_policia])->all();
        //$lcambios = ArrayHelper::map($cambios, 'id_cambio', 'id_cambio');
        
       
        if ($model->load(Yii::$app->request->post())){
            $connection = Yii::$app->db;
            $transaction = $connection->beginTransaction();
            
            $cambioactual = Cambio::find()->where(['id_policia_cam' => $model->id_policia_cam, 'estado_cam' => 'AC'])->one();
            
            
            
            try {
                if (!is_null($cambioactual)){
                    $connection
                    ->createCommand()
                    ->update('cambio', [
                        'id_policia_cam' => $cambioactual->id_policia_cam,
                        'id_cargo_cam' => $cambioactual->id_cargo_cam,
                        'glosa_cam' => $cambioactual->glosa_cam,
                        'fdesignacion_cam' => $cambioactual->fdesignacion_cam,
                        'fecha_cam' => $cambioactual->fecha_cam,
                        'tipo_cam' => $cambioactual->tipo_cam,
                        'estado_cam' => 'HI',
                    ],
                    [
                        'id_cambio' => $cambioactual->id_cambio
                    ])->execute();
                    $model->tipo_cam = 'UN';
                    $model->estado_cam = 'AC';
                    $model->fecha_cam = date('y-m-d H:i:s');
                    $model->fdesignacion_cam = date('Y-m-d', strtotime(str_replace('/', '-', $model->fdesignacion_cam)));
                   
                    if ($model->validate()) {
                        
                        $connection->createCommand()
                            ->insert('cambio', [
                                'id_policia_cam' => $model->id_policia_cam,
                                'id_cargo_cam' => $model->id_cargo_cam,
                                'glosa_cam' => $model->glosa_cam,
                                'fdesignacion_cam' => $model->fdesignacion_cam,
                                'fecha_cam' => $model->fecha_cam,
                                'tipo_cam' => $model->tipo_cam,
                                'estado_cam' => $model->estado_cam,
                            ])
                            ->execute();
                        $id = $connection->getLastInsertID();
                        Yii::warning('id_cambio:'.$id);
                        Yii::warning($transaction->commit());
                        return $this->redirect(['view', 'id' => $id]);
                        
                    }
                    else{
                        throw new \yii\db\Exception('$model');
                        $transaction->rollBack ();
                    }
                }
                else {
                    if ($model->save()) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id_cambio]);
                    } else {
                        $transaction->rollBack();
                    }
                    Yii::warning('sin cargo aterior');
                }
                
            } catch (Exception $ex) {
                $transaction->rollBack();
                Yii::warning($ex->getMessage());
            }
        }

        return $this->render('create', [
            'model' => $model,
            'policia' => $policia,
            'policias' => $policias,
            'departamento' => $departamento,
            'departamentos' => $departamentos,
            'ldepartamentos' => $ldepartamentos,
            'unidad' => $unidad,
            'unidades' => $unidades,
            'lunidades' => $lunidades,
            'cargo' => $cargo,
            'cargos' => $cargos,
            'lcargos' => $lcargos,
            'comando' => $comando,
            'comandos' => $comandos,
            'lcomandos' => $lcomandos,
        ]);
    }
    
    /**
     * Creates a new Cambio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatecambiocargo($id_departamento=1, $id_unidad=0, $id_policia=0)
    {
        if(!Yii::$app->user->can('cambio-create-cambiocargo'))
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');

        $model = new Cambio();
        $model->fdesignacion_cam = date('Y-m-d');
        
        $policia = new Policia();
        $cargo = new Cargo();
        $unidad = new Unidad();
        $comando = new Comando();
        $departamento = new Departamento();
        
        $policias = Policia::find()
                ->select(
                        [
                            'id_policia as value', 
                            'id_policia as id', 
                            "concat("
                            ."' id: ',id_policia, "
                            ."' esc: ',escalafon_pol, "
                            ."' ci: ', ci_pol, "
                            ."' nomb: ', paterno_pol, ' ', materno_pol, ' ', nombre1_pol "
                            .") as label", 
                            "concat("
                            ."paterno_pol, ' ', materno_pol, ' ', nombre1_pol "
                            .") as label2", 
                            "concat("
                            ."ci_pol, ' ', exp_pol "
                            .") as label3", 
                            ])
                ->asArray()
                ->all();
        
       
        $cargos = \app\models\Cargo::find()->where(['id_unidad_car' => $id_unidad])->all();
        $lcargos = ArrayHelper::map($cargos, 'id_cargo', 'nombre_car');
        
        if ($model->load(Yii::$app->request->post())){
            $connection = Yii::$app->db;
            $transaction = $connection->beginTransaction();
            
            $cambioactual = Cambio::find()->where(['id_policia_cam' => $model->id_policia_cam, 'estado_cam' => 'AC'])->one();
            
            
            
            try {
                if (!is_null($cambioactual)){
                    $connection
                    ->createCommand()
                    ->update('cambio', [
                        'id_policia_cam' => $cambioactual->id_policia_cam,
                        'id_cargo_cam' => $cambioactual->id_cargo_cam,
                        'glosa_cam' => $cambioactual->glosa_cam,
                        'fdesignacion_cam' => $cambioactual->fdesignacion_cam,
                        'fecha_cam' => $cambioactual->fecha_cam,
                        'tipo_cam' => $cambioactual->tipo_cam,
                        'estado_cam' => 'HI',
                    ],
                    [
                        'id_cambio' => $cambioactual->id_cambio
                    ])->execute();
                    $model->tipo_cam = 'IN';
                    $model->estado_cam = 'AC';
                    $model->fecha_cam = date('y-m-d H:i:s');
                    $model->fdesignacion_cam = date('Y-m-d', strtotime(str_replace('/', '-', $model->fdesignacion_cam)));
                   
                    if ($model->validate()) {
                        
                        $connection->createCommand()
                            ->insert('cambio', [
                                'id_policia_cam' => $model->id_policia_cam,
                                'id_cargo_cam' => $model->id_cargo_cam,
                                'glosa_cam' => $model->glosa_cam,
                                'fdesignacion_cam' => $model->fdesignacion_cam,
                                'fecha_cam' => $model->fecha_cam,
                                'tipo_cam' => $model->tipo_cam,
                                'estado_cam' => $model->estado_cam,
                            ])
                            ->execute();
                        $id = $connection->getLastInsertID();
                        Yii::warning('id_cambio:'.$id);
                        Yii::warning($transaction->commit());
                        return $this->redirect(['view', 'id' => $id]);
                        
                    }
                    else{
                        throw new \yii\db\Exception('$model');
                        $transaction->rollBack ();
                    }
                }
                else {
                    if ($model->save()) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id_cambio]);
                    } else {
                        $transaction->rollBack();
                    }
                    Yii::warning('sin cargo aterior');
                }
                
            } catch (Exception $ex) {
                $transaction->rollBack();
                Yii::warning($ex->getMessage());
            }
            
            
        }

        return $this->render('createcambiocargo', [
            'model' => $model,
            /*'cambioactual' => $cambioactual,
            'cargoactual' => $cargoactual,
            'unidadactual' => $unidadactual,
            'comandoactual' => $comandoactual,
            'departamentoactual' => $departamentoactual,*/
            'policia' => $policia,
            'cargo' => $cargo,
            'unidad' => $unidad,
            'comando' => $comando,
            'departamento' => $departamento,
            'policias' => $policias,
            //'departamento' => $departamento,
            //'departamentos' => $departamentos,
            //'ldepartamentos' => $ldepartamentos,
            //'unidad' => $unidad,
            //'unidades' => $unidades,
            //'lunidades' => $lunidades,
            //'cargo' => $cargo,
            //'cargos' => $cargos,
            'lcargos' => $lcargos,
            //'comando' => $comando,
            //'comandos' => $comandos,
            //'lcomandos' => $lcomandos,
        ]);
    }
    
    /**
     * Creates a new Cambio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatecambioexterno($id_departamento=1, $id_unidad=0, $id_policia=0)
    {
        if(!Yii::$app->user->can('cambio-create-cambioexterno'))
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');

        $model = new Cambio();
        $model->fdesignacion_cam = date('Y-m-d');
        
        $policia = new Policia();
        $cargo = new Cargo();
        $unidad = new Unidad();
        $comando = new Comando();
        $departamento = new Departamento();
        
        $policias = Policia::find()
                ->select(
                        [
                            'id_policia as value', 
                            'id_policia as id', 
                            "concat("
                            ."' id: ',id_policia, "
                            ."' esc: ',escalafon_pol, "
                            ."' ci: ', ci_pol, "
                            ."' nomb: ', paterno_pol, ' ', materno_pol, ' ', nombre1_pol "
                            .") as label", 
                            "concat("
                            ."paterno_pol, ' ', materno_pol, ' ', nombre1_pol "
                            .") as label2", 
                            "concat("
                            ."ci_pol, ' ', exp_pol "
                            .") as label3", 
                            ])
                ->asArray()
                ->all();
        
       
        $departamentos = Departamento::find()->all();
        $ldepartamentos = ArrayHelper::map($departamentos, 'id_departamento', 'nombre_dep');
        
        $comandos = Comando::find()->where(['id_departamento_com' => 1])->all();
        $lcomandos = ArrayHelper::map($comandos, 'id_comando', 'nombre_com');
        
        $unidades = Unidad::find()->where(['id_comando_uni' => 1])->all();
        $lunidades = ArrayHelper::map($unidades, 'id_unidad', 'nombre_uni');
        
        $cargos = \app\models\Cargo::find()->where(['id_unidad_car' => $id_unidad])->all();
        $lcargos = ArrayHelper::map($cargos, 'id_cargo', 'nombre_car');
        
        if ($model->load(Yii::$app->request->post())){
            $connection = Yii::$app->db;
            $transaction = $connection->beginTransaction();
            
            $cambioactual = Cambio::find()->where(['id_policia_cam' => $model->id_policia_cam, 'estado_cam' => 'AC'])->one();
            
            
            
            try {
                
                if (!is_null($cambioactual)){
                    $connection
                    ->createCommand()
                    ->update('cambio', [
                        'id_policia_cam' => $cambioactual->id_policia_cam,
                        'id_cargo_cam' => $cambioactual->id_cargo_cam,
                        'glosa_cam' => $cambioactual->glosa_cam,
                        'fdesignacion_cam' => $cambioactual->fdesignacion_cam,
                        'fecha_cam' => $cambioactual->fecha_cam,
                        'tipo_cam' => $cambioactual->tipo_cam,
                        'estado_cam' => 'HI',
                    ],
                    [
                        'id_cambio' => $cambioactual->id_cambio
                    ])->execute();
                    $model->tipo_cam = 'EX';
                    $model->estado_cam = 'AC';
                    $model->fecha_cam = date('y-m-d H:i:s');
                    $model->fdesignacion_cam = date('Y-m-d', strtotime(str_replace('/', '-', $model->fdesignacion_cam)));
                   
                    if ($model->validate()) {
                        
                        $connection->createCommand()
                            ->insert('cambio', [
                                'id_policia_cam' => $model->id_policia_cam,
                                'id_cargo_cam' => $model->id_cargo_cam,
                                'glosa_cam' => $model->glosa_cam,
                                'fdesignacion_cam' => $model->fdesignacion_cam,
                                'fecha_cam' => $model->fecha_cam,
                                'tipo_cam' => $model->tipo_cam,
                                'estado_cam' => $model->estado_cam,
                            ])
                            ->execute();
                        $id = $connection->getLastInsertID();
                        Yii::warning('id_cambio:'.$id);
                        Yii::warning($transaction->commit());
                        return $this->redirect(['view', 'id' => $id]);
                        
                    }
                    else{
                        throw new \yii\db\Exception('$model');
                        $transaction->rollBack ();
                    }
                }
                else {
                    if ($model->save()) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id_cambio]);
                    } else {
                        $transaction->rollBack();
                    }
                    Yii::warning('sin cargo aterior');
                }
                
            } catch (Exception $ex) {
                $transaction->rollBack();
                Yii::warning($ex->getMessage());
            }
            
            
        }

        return $this->render('createcambioexterno', [
            'model' => $model,
            //'cambioactual' => $cambioactual,
            //'cargoactual' => $cargoactual,
            //'unidadactual' => $unidadactual,
            //'comandoactual' => $comandoactual,
            //'departamentoactual' => $departamentoactual,*/
            'policia' => $policia,
            'cargo' => $cargo,
            'unidad' => $unidad,
            'comando' => $comando,
            'departamento' => $departamento,
            'policias' => $policias,
            'departamento' => $departamento,
            'departamentos' => $departamentos,
            'ldepartamentos' => $ldepartamentos,
            'unidad' => $unidad,
            'unidades' => $unidades,
            'lunidades' => $lunidades,
            //'cargo' => $cargo,
            //'cargos' => $cargos,
            'lcargos' => $lcargos,
            'comando' => $comando,
            'comandos' => $comandos,
            'lcomandos' => $lcomandos,
        ]);
    }
    
    public function actionCargoactual($id_policia){
        //echo $id_departamento;
        $cambios = Cambio::find()->where(['id_policia_cam' => $id_policia, 'estado_cam' => 'AC'])->all();
        //$cambio = new Cambio();
        
        if (!empty($cambios)) {
            $nro = 1;
            foreach($cambios as $cambio) {
                echo "<tr>
                        <td>".$nro ."</td>
                        <td>".$cambio->id_cambio ."</td>
                        <td>".$cambio->fdesignacion_cam."</td>
                        <td>".$cambio->cargoCam->nombre_car."</td>
                        <td>".$cambio->cargoCam->unidadCar->nombre_uni."</td>
                        <td>".$cambio->cargoCam->unidadCar->comandoUni->nombre_com."</td>
                        <td>".$cambio->cargoCam->unidadCar->comandoUni->departamentoCom->nombre_dep."</td>
                    </tr>";
            }
        } else {
            echo "<option>-</option>";
        }
        //return $this->redirect(['create', 'id_departamento' => $id_departamento]);
    }
    public function actionComandos($id_departamento=0){
        //echo $id_departamento;
        $datos = Comando::find()
                ->where(['id_departamento_com' => $id_departamento])
                ->all();
        echo "<option value=''>-Seleccione comando-</option>";
        if (!empty($datos)) {
            foreach($datos as $row) {
                echo "<option value='".$row->id_comando."'>".$row->nombre_com."</option>";
            }
        } else {
            echo "<option>-</option>";
        }
    }
    
    public function actionUnidades($id_comando=0){
        //echo $id_departamento;
        $datos = \app\models\Unidad::find()
                ->where(['id_comando_uni' => $id_comando])
                ->all();
        echo "<option value=''>-Seleccione cambio-</option>";
        if (!empty($datos)) {
            foreach($datos as $row) {
                echo "<option value='".$row->id_unidad."'>".$row->nombre_uni."</option>";
            }
        } else {
            echo "<option>-</option>";
        }
        //return $this->redirect(['create', 'id_departamento' => $id_departamento]);
    }
    
    public function actionCargos($id_unidad=0){
        //echo $id_departamento;
        $cargos = \app\models\Cargo::find()
                ->where(['id_unidad_car' => $id_unidad])
                ->all();
        //echo "<option value='".$id_departamento."'>".$id_departamento."</option>";
        if (!empty($cargos)) {
            echo "<option value=''>Seleccione un cargo</option>";
            foreach($cargos as $cargo) {
                echo "<option value='".$cargo->id_cargo."'>".$cargo->nombre_car."</option>";
            }
        } else {
            echo "<option>-</option>";
        }
        //return $this->redirect(['create', 'id_departamento' => $id_departamento]);
    }
    
    public function actionCargosunidadpolicia($id_policia=0){
        //echo $id_departamento;
        $cambio = Cambio::find()->where(['id_policia_cam' => $id_policia, 'estado_cam' => 'AC'])->one();
        $cargo = Cargo::find()->where(['id_cargo' => $cambio->id_cargo_cam])->one();
        $cargos = \app\models\Cargo::find()
                ->where(['id_unidad_car' => $cargo->id_unidad_car])
                ->all();
        //echo "<option value='".$id_departamento."'>".$id_departamento."</option>";
        if (!empty($cargos)) {
            echo "<option value=''>Seleccione un cargo</option>";
            foreach($cargos as $cargo) {
                echo "<option value='".$cargo->id_cargo."'>".$cargo->nombre_car."</option>";
            }
        } else {
            echo "<option>-</option>";
        }
        //return $this->redirect(['create', 'id_departamento' => $id_departamento]);
    }
    
    public function actionSeleccionarcargo($id_cargo=0){
        //echo $id_departamento;
        echo $id_cargo;
        //return $this->redirect(['create', 'id_departamento' => $id_departamento]);
    }
    
    public function actionCambiospol($id_policia=0){
        $cambios = Cambio::find()->where(['id_policia_cam' => $id_policia])->all();
        //$cambio = new Cambio();
        
        if (!empty($cambios)) {
            $nro = 1;
            foreach($cambios as $cambio) {
                echo "<tr>
                        <td>".$nro ."</td>
                        <td>".$cambio->id_cambio ."</td>
                        <td>".$cambio->id_policia_cam."</td>
                        <td>".$cambio->cargoCam->id_cargo."</td>
                        <td>".$cambio->cargoCam->nombre_car."</td>
                        <td>".$cambio->cargoCam->unidadCar->nombre_uni."</td>
                        <td>".$cambio->cargoCam->unidadCar->comandoUni->nombre_com."</td>
                        <td>".$cambio->fecha_cam."</td>
                        <td>".$cambio->estado_cam."</td>

                    </tr>";
            }
        } else {
            echo "<option>-</option>";
        }
    }

    /**
     * Updates an existing Cambio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(!Yii::$app->user->can('cambio-update'))
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');

        $model = $this->findModel($id);

        
        
        $policia = \app\models\Policia::find()->where(['id_policia' => $model->id_policia_cam])->one();
        $policia->nombre1_pol = $policia->paterno_pol . ' ' . $policia->materno_pol . ' ' . $policia->nombre1_pol . ' ' . $policia->nombre2_pol;
        
        $cargo = \app\models\Cargo::find()->where(['id_cargo' => $model->id_cargo_cam])->one();
        $unidad = \app\models\Unidad::find()->where(['id_unidad' => $cargo->id_unidad_car])->one();
        $comando = \app\models\Comando::find()->where(['id_comando' => $cambio->id_comando_uni])->one();
        $departamento = \app\models\Departamento::find()->where(['id_departamento' => $comando->id_departamento_com])->one();
        
        $policias = \app\models\Policia::find()
                ->select(
                        [
                            'id_policia as value', 
                            'id_policia as id', 
                            "concat("
                            ."' id: ',id_policia, "
                            ."' esc: ',escalafon_pol, "
                            ."' ci: ', ci_pol, "
                            ."' nomb: ', paterno_pol, ' ', materno_pol, ' ', nombre1_pol "
                            .") as label", 
                            "concat("
                            ."paterno_pol, ' ', materno_pol, ' ', nombre1_pol "
                            .") as label2", 
                            "concat("
                            ."ci_pol, ' ', exp_pol "
                            .") as label3", 
                            ])
                ->asArray()
                ->all();
        
        $departamentos= \app\models\Departamento::find()->all();
        $ldepartamentos = ArrayHelper::map($departamentos,'id_departamento','nombre_dep');
        
        $comandos = \app\models\Comando::find()->where(['id_departamento_com' => $departamento->id_departamento])->all();
        $lcomandos = ArrayHelper::map($comandos, 'id_comando', 'nombre_com');
        
        $unidades = \app\models\Unidad::find()->where(['id_comando_uni' => $comando->id_comando])->all();
        $lunidades = ArrayHelper::map($unidades, 'id_unidad', 'nombre_uni');
        
        $cargos = \app\models\Cargo::find()->where(['id_unidad_car' => $cambio->id_unidad])->all();
        $lcargos = ArrayHelper::map($cargos, 'id_cargo', 'nombre_car');
        
        $cambios = Cambio::find()->where(['id_policia_cam' => $policia->id_policia])->all();
        //$lcambios = ArrayHelper::map($cambios, 'id_cambio', 'id_cambio');
        
        //$cambioactual = Cambio::find()->where(['id_policia_cam' => $model->id_policia_cam, 'estado_cam' => 'AC'])->one();
        
        if ($model->load(Yii::$app->request->post())){
            $model->fdesignacion_cam = date('Y-m-d', strtotime(str_replace('/', '-', $model->fdesignacion_cam)));
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id_cambio]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'policia' => $policia,
            'policias' => $policias,
            'departamento' => $departamento,
            'departamentos' => $departamentos,
            'ldepartamentos' => $ldepartamentos,
            'unidad' => $unidad,
            'unidades' => $unidades,
            'lunidades' => $lunidades,
            'comando' => $comando,
            'comandos' => $comandos,
            'lcomandos' => $lcomandos,
            'cargo' => $cargo,
            'cargos' => $cargos,
            'lcargos' => $lcargos,
            'cambios' => $cambios,
        ]);
    }

    /**
     * Deletes an existing Cambio model.
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
     * Finds the Cambio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cambio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cambio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
