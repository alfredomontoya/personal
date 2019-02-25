<?php

namespace app\controllers;

use Yii;
use app\models\Detallegrado;
use app\models\DetallegradoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\ForbiddenHttpException;

/**
 * DetallegradoController implements the CRUD actions for Detallegrado model.
 */
class DetallegradoController extends Controller
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
     * Lists all Detallegrado models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('detallegrado-index')){
            $searchModel = new DetallegradoSearch();
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
     * Displays a single Detallegrado model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('detallegrado-view')){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');
        }
        
    }

    /**
     * Creates a new Detallegrado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('detallegrado-create')){
            $model = new Detallegrado();
            $model->fechaascenso_dg = date('Y-m-d');
            
            
            $policia = new \app\models\Policia();
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
            
            $grado = new \app\models\Grado();
            $grados= \app\models\Grado::find()->orderBy(['descripcion_gra' => SORT_ASC])->all();
            $lgrados = ArrayHelper::map($grados,'id_grado','descripcion_gra');
            
            $model->fecha_dg = date('Y-m-d H:i:s');
            $model->estado_dg = 'AC';
            
            if ($model->load(Yii::$app->request->post())){
                $connection = Yii::$app->db;
                $transaction = $connection->beginTransaction();
                
                $gradoactual = Detallegrado::find()->where(['id_policia_dg' => $model->id_policia_dg, 'estado_dg' => 'AC'])->one();
                
                try {
                    if (!is_null($gradoactual)){
                        $connection->createCommand()
                                    ->update('detallegrado', [
                                            'estado_dg' => 'HI',
                                        ],
                                        [
                                            'id_detallegrado' => $gradoactual->id_detallegrado
                                        ])->execute();
                        
                    }
                    Yii::warning('fecha: ' . $model->fechaascenso_dg);
                    $model->fechaascenso_dg = date('Y-m-d', strtotime(str_replace('/', '-', $model->fechaascenso_dg)));
                    Yii::warning('fecha: ' . $model->fechaascenso_dg);
                    if ($model->validate()) {
                        Yii::warning('validate grado ok');
                        $connection->createCommand()
                            ->insert('detallegrado', [
                                'id_policia_dg' => $model->id_policia_dg,
                                'id_grado_dg' => $model->id_grado_dg,
                                'glosa_dg' => $model->glosa_dg,
                                'fechaascenso_dg' => $model->fechaascenso_dg,
                                'fecha_dg' => $model->fecha_dg,
                                'estado_dg' => $model->estado_dg,
                            ])
                            ->execute();
                        $id = $connection->getLastInsertID();
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $id]);

                    }
                    else{
                        Yii::warning('validate grado err');
                        $transaction->rollBack ();
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
                'grado' => $grado,
                'lgrados' => $lgrados,
            ]);
        } else {
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');
        }
        
    }
    
    public function actionGradoactual($id_policia=0){
        $datos = Detallegrado::find()->where(['id_policia_dg' => $id_policia, 'estado_dg'=>'AC'])->one();
        if (!empty($datos)) {
            echo "<tr>
                    <td>1</td>
                    <td>".$datos->id_detallegrado ."</td>
                    <td>".$datos->gradoDg->codigo_gra."</td>
                    <td>".$datos->gradoDg->descripcion_gra."</td>
                    <td>".$datos->fechaascenso_dg."</td>

                </tr>";
        } else {
            echo "<option>-</option>";
        }
    }
    
    public function actionGrados($id_policia=0){
        $detallegrado = Detallegrado::find()->where(['id_policia_dg' => $id_policia])->all();
        //$cambio = new Cambio();
        
        if (!empty($detallegrado)) {
            $nro = 1;
            foreach($detallegrado as $dg) {
                echo "<tr>
                        <td>".$nro ."</td>
                        <td>".$dg->id_detallegrado ."</td>
                        <td>".$dg->id_policia_dg."</td>
                        <td>".$dg->gradoDg->id_grado."</td>
                        <td>".$dg->gradoDg->codigo_gra."</td>
                        <td>".$dg->gradoDg->descripcion_gra."</td>
                        <td>".$dg->fechaascenso_dg."</td>
                        <td>".$dg->fecha_dg."</td>
                        <td>".$dg->estado_dg."</td>

                    </tr>";
                $nro++;
            }
        } else {
            echo "<option>-</option>";
        }
    }
    /**
     * Updates an existing Detallegrado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('detallegrado-update')){
            $model = $this->findModel($id);
        
            $policia = \app\models\Policia::find()->where(['id_policia' => $model->id_policia_dg])->one();
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
            
            $grado = \app\models\Grado::find()->where(['id_grado' => $model->id_grado_dg])->one();
            $grados = \app\models\Grado::find()
                    ->select(['codigo_gra as value', 'id_grado as id', "codigo_gra as label", 'descripcion_gra as descripcion_gra'])
                    ->asArray()
                    ->all();
            
            Yii::warning($model->fechaascenso_dg);
            $model->fechaascenso_dg = date('Y-m-d', strtotime(str_replace('/', '-', $model->fechaascenso_dg)));
            Yii::warning($model->fechaascenso_dg);
            $detallegrado = Detallegrado::find()->where(['id_policia_dg' => $model->id_policia_dg])->all();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_detallegrado]);
            }

            return $this->render('update', [
                'model' => $model,
                'policia' => $policia,
                'policias' => $policias,
                'grado' => $grado,
                'grados' => $grados,
                'detallegrado' => $detallegrado,
            ]);
        } else {
            throw new ForbiddenHttpException('Accedo denegado! Consulte con el administrador.');
        }
        
    }
    
    public function actionSeleccionargrado($id=0){
        echo $id;
    }
    
    public function actionSeleccionarcodigogra($id=0){
        $grado = \app\models\Grado::findOne(['id_grado' => $id]);
        echo $grado->codigo_gra;
    }

    /**
     * Deletes an existing Detallegrado model.
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
     * Finds the Detallegrado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Detallegrado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Detallegrado::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
