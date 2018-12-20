<?php

namespace app\controllers;

use Yii;
use app\models\Imagenes;
use app\models\ImagenesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\FormUpload;
use yii\web\UploadedFile;

/**
 * ImagenesController implements the CRUD actions for Imagenes model.
 */
class ImagenesController extends Controller
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
     * Lists all Imagenes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ImagenesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Imagenes model.
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
     * Creates a new Imagenes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Imagenes();

        //$imagen = new \app\models\Imagen;
        
        if ($model->load(Yii::$app->request->post())){
            $model->fecha_im = date('y-m-d');
            $model->estado_im = 'AC';
            if ($model->save()) {
                //$imagen->archivo = UploadedFile::getInstance($imagen, 'archivo');
                $archivo = UploadedFile::getInstance($model, 'archivo');
                
                $archivo->saveAs('archivos/' . $model->id_imagen . '.' . $archivo->extension);
                //  $imagen->archivo->saveAs('policias/' . $model->id_policia . '_foto.' . $imagen->archivo->extension);
                
                return $this->redirect(['view', 'id' => $model->id_imagen]);
            } else {
                throw new \yii\web\HttpException(404, 'Error al guardar datos.');
            }
        } 

        return $this->render('create', [
            'model' => $model,
//            'imagen' => $imagen,
        ]);
    }

    /**
     * Updates an existing Imagenes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        //$imagen = new \app\models\Imagen();

        //$model->scenario = 'update';
        
        if ($model->load(Yii::$app->request->post())){
            if ($model->save()) {
                
                $archivo = UploadedFile::getInstance($model, 'archivo');
                
                $archivo->saveAs('archivos/' . $model->id_imagen . '.' . $archivo->extension);
                //if ($model->upload())
                return $this->redirect(['view', 'id' => $model->id_imagen]);
            } else {
                //throw new \yii\web\HttpException(404, 'Error al guardar datos.');
            }
        }
        return $this->render('update', [
            'model' => $model,
            //'imagen' => $imagen,
        ]);
    }

    /**
     * Deletes an existing Imagenes model.
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
     * Finds the Imagenes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Imagenes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Imagenes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
