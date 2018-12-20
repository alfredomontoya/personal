<?php

namespace app\controllers;

use Yii;
use app\models\Detallegrado;
use app\models\DetallegradoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $searchModel = new DetallegradoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detallegrado model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Detallegrado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Detallegrado();
        
        
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
        $grados = \app\models\Grado::find()
                ->select(['codigo_gra as value', 'id_grado as id', "codigo_gra as label", 'descripcion_gra as descripcion_gra'])
                ->asArray()
                ->all();
        $model->fecha_dg = date('y-m-d H:i:s');
        
        $model->estado_dg = 'AC';
        
        if ($model->load(Yii::$app->request->post())){
            $antmodel = Detallegrado::find()
                    ->where(['id_policia_dg' => $model->id_policia_dg, 'estado_dg' => 'AC'])
                    ->orderBy(['id_detallegrado'=>SORT_DESC])->one();
            if (!is_null($antmodel)){
                $antmodel->estado_dg = 'HI';
                if ($antmodel->save()){
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id_detallegrado]);
                    } else
                        throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
                } else
                    throw new \yii\web\HttpException(404, 'The requested Item could not be found.');

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id_detallegrado]);
                } else
                    throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
            } else 
                throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
            
        }

        return $this->render('create', [
            'model' => $model,
            'policia' => $policia,
            'policias' => $policias,
            'grado' => $grado,
            'grados' => $grados,
        ]);
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
