<?php

namespace app\controllers;

use Yii;
use app\models\Cambio;
use app\models\CambioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers;
use yii\helpers\ArrayHelper;

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
        $searchModel = new CambioSearch();
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
        $model = new Cambio();
        
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
        
        $comandos= \app\models\Comando::find()->all();
        $lcomandos = ArrayHelper::map($comandos,'id_comando','nombre_com');
        
        $unidades = \app\models\Unidad::find()->where(['id_comando_uni' => $id_departamento])->all();
        $lunidades = ArrayHelper::map($unidades, 'id_unidad', 'nombre_uni');
        
        $cargos = \app\models\Cargo::find()->where(['id_unidad_car' => $id_unidad])->all();
        $lcargos = ArrayHelper::map($cargos, 'id_cargo', 'nombre_car');
        
        //$cambios = Cambio::find()->where(['id_policia_cam' => $id_policia])->all();
        //$lcambios = ArrayHelper::map($cambios, 'id_cambio', 'id_cambio');
        
       
        /*
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }*/
        
        if ($model->load(Yii::$app->request->post())){
            $model->estado_cam = 'AC';
            $model->fecha_cam = date('y-m-d H:i:s');
            
            $antmodel = Cambio::find()->where(['id_policia_cam' => $model->id_policia_cam, 'estado_cam' => 'AC'])->one();
            $sw = false;
            if (!is_null($antmodel)){
                $antmodel->estado_cam = 'HI';
                if ($antmodel->save()){
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id_cambio]);
                    }
                } 
            }
            else {
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id_cambio]);
                } 
            }
            try {
                
            
            } catch (\Exception $e) {
                $transaction->rollBack();
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                throw $e;
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
    
    public function actionComandos($id_departamento=0){
        //echo $id_departamento;
        $datos = \app\models\Comando::find()
                ->where(['id_departamento_com' => $id_departamento])
                ->all();
        echo "<option value=''>Seleccione comando</option>";
        if (!empty($datos)) {
            foreach($datos as $row) {
                echo "<option value='".$row->id_comando."'>".$row->nombre_com."</option>";
            }
        } else {
            echo "<option>-</option>";
        }
        //return $this->redirect(['create', 'id_departamento' => $id_departamento]);
    }
    
    public function actionUnidades($id_comando=0){
        //echo $id_departamento;
        $datos = \app\models\Unidad::find()
                ->where(['id_comando_uni' => $id_comando])
                ->all();
        echo "<option value=''>Seleccione comando</option>";
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
    
    public function actionSeleccionarcargo($id_cargo=0){
        //echo $id_departamento;
        echo $id_cargo;
        //return $this->redirect(['create', 'id_departamento' => $id_departamento]);
    }
    
    public function actionCambiospol($id_policia=0){
        $cambios = Cambio::find()->where(['id_policia_cam' => $id_policia])->all();
        $cambio = new Cambio();
        
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
        $model = $this->findModel($id);

        $policia = \app\models\Policia::find()->where(['id_policia' => $model->id_policia_cam])->one();
        $cargo = \app\models\Cargo::find()->where(['id_cargo' => $model->id_cargo_cam])->one();
        $unidad = \app\models\Unidad::find()->where(['id_unidad' => $cargo->id_unidad_car])->one();
        $departamento = \app\models\Departamento::find()->where(['id_departamento' => $unidad->id_departamento_uni])->one();
        
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

        //use yii\helpers\ArrayHelper;
        $ldepartamentos = ArrayHelper::map($departamentos,'id_departamento','nombre_dep');
        
        
        $unidades = \app\models\Unidad::find()->where(['id_departamento_uni' => $departamento->id_departamento])->all();
        $lunidades = ArrayHelper::map($unidades, 'id_unidad', 'nombre_uni');
        
        $cargos = \app\models\Cargo::find()->where(['id_unidad_car' => $unidad->id_unidad])->all();
        $lcargos = ArrayHelper::map($cargos, 'id_cargo', 'nombre_car');
        
        $cambios = Cambio::find()->where(['id_policia_cam' => $policia->id_policia])->all();
        //$lcambios = ArrayHelper::map($cambios, 'id_cambio', 'id_cambio');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_cambio]);
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
