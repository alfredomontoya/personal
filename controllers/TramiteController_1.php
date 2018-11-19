<?php

namespace app\controllers;

use Yii;
use app\models\Tramite;
use app\models\TramiteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TramiteController implements the CRUD actions for Tramite model.
 */
class TramiteController extends Controller
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
     * Lists all Tramite models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TramiteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tramite model.
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
     * Creates a new Tramite model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new Tramite();

        $modeldoc = new \app\models\Documento();
        $modelcli = new \app\models\Cliente;
        $modeldd = new \app\models\Detalledocumento();
        $modelpais = new \app\models\Pais;
        $modelregimen = new \app\models\Regimen();
        $modelusuario = new \app\models\Usuario;
        
        $documentos = $modeldoc->find()->all();
        
        $datacli = $modelcli->find()
                ->select(['nitci_cli as value', "concat(nitci_cli,' ' , nombre_cli) as label",  'id_cliente as id', 'nombre_cli as nombre_cli', 'correo_cli as correo_cli', 'direccion_cli as direccion_cli', 'telefono_cli as telefono_cli'])
                ->asArray()
                ->all();
        
        $datapais = $modelpais->find()
                ->select(['nombre_pais as value', "nombre_pais as label", 'id_pais as id'])
                ->asArray()
                ->all();
        
        $dataregimen = $modelregimen->find()
                ->select(["concat(sigla_reg, ' - ', nombre_reg) as value", "concat(sigla_reg, ' - ', nombre_reg)", 'id_regimen as id'])
                ->asArray()
                ->all();
        
        $datausuario = $modelusuario->findBySql("select * from usuario where id_usuario=1")->all();
        
        if ($model->load(Yii::$app->request->post())){
            $model->id_usuario_tra=1;
            $model->fecha_tra = null;
            if($model->save()) {
            
                return $this->redirect(['view', 'id' => $model->id_tramite]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelcli' => $modelcli,
            'modeldoc' => $modeldoc,
            'modeldd' => $modeldd,
            'modelusuario' => $modelusuario,
            'datacli' => $datacli,
            'documentos' => $documentos,
            'datapais' => $datapais,
            'dataregimen' => $dataregimen,
            'datausuario' => $datausuario,
        ]);
    }

    /**
     * Updates an existing Tramite model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $modelcli = new \app\models\Cliente;
        
        $datacli = $modelcli->find()
                ->select(['nombre_cli as value', 'nombre_cli as label', 'id_cliente as id'])
                ->asArray()
                ->all();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tramite]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelcli' => $modelcli,
            'datacli' => $datacli,
        ]);
    }

    /**
     * Deletes an existing Tramite model.
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
     * Finds the Tramite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tramite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tramite::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
