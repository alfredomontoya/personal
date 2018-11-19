<?php

namespace app\controllers;

use Yii;
use app\models\Detalleformulario;
use app\models\DetalleformularioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetalleformularioController implements the CRUD actions for Detalleformulario model.
 */
class DetalleformularioController extends Controller
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
     * Lists all Detalleformulario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetalleformularioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detalleformulario model.
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
     * Creates a new Detalleformulario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Detalleformulario();
        
        $modelformulariosearch = new \app\models\FormularioSearch();
        $modeltramitesearch = new \app\models\TramiteSearch();
        
        $model->fecha_df = date('d/m/Y');
        $model->estado_df = 'AC';
        
        $tramite = new \app\models\Tramite(['numero_tra' => '0']);
        $formulario = new \app\models\FormularioSearch(['nombre_form' => 'buscar...']);
        
        $dataformulario = \app\models\FormularioSearch::find()
                ->select(['nombre_form as value', "nombre_form as label", 'id_formulario as id', 'sigla_form as sigla_form'])
                ->where(['estado_form'=>'AC'])
                ->asArray()
                ->all();
        
        $datatramite = $modeltramitesearch->find()
                ->select(['numero_tra as value', "numero_tra as label", 'id_tramite as id'])
                ->where(['estado_tra'=>'AC'])
                ->asArray()
                ->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_detalleformulario]);
        }

        return $this->render('create', [
            'model' => $model,
            'modelformulariosearch' => $modelformulariosearch,
            'modeltramitesearch' => $modeltramitesearch,
            'dataformulario' => $dataformulario,
            'datatramite' => $datatramite,
            'tramite' => $tramite,
            'formulario' => $formulario,
        ]);
    }

    /**
     * Updates an existing Detalleformulario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        
        $modelformulariosearch = new \app\models\FormularioSearch();
        $modeltramitesearch = new \app\models\TramiteSearch();
        
        $tramite = $modeltramitesearch->find()->where(['id_tramite' => $model->id_tramite_df])->one();
        $formulario = $modelformulariosearch->find()->where(['id_formulario' => $model->id_formulario_df])->one();
        
        $dataformulario = \app\models\FormularioSearch::find()
                ->select(['nombre_form as value', "nombre_form as label", 'id_formulario as id', 'sigla_form as sigla_form'])
                ->where(['estado_form'=>'AC'])
                ->asArray()
                ->all();
        
        $datatramite = $modeltramitesearch->find()
                ->select(['numero_tra as value', "numero_tra as label", 'id_tramite as id'])
                ->where(['estado_tra'=>'AC'])
                ->asArray()
                ->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_detalleformulario]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelformulariosearch' => $modelformulariosearch,
            'modeltramitesearch' => $modeltramitesearch,
            'dataformulario' => $dataformulario,
            'datatramite' => $datatramite,
            'tramite' => $tramite,
            'formulario' => $formulario,
        ]);
    }

    /**
     * Deletes an existing Detalleformulario model.
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
     * Finds the Detalleformulario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Detalleformulario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Detalleformulario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
