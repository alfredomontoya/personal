<?php

namespace app\controllers;

use Yii;
use yii\base\Model;
use app\models\Tramite;
use app\models\TramiteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Detalledocumento;
use app\models\Detalleformulario;
use app\models\DetalleformularioSearch;
use app\models\Formulario;
use app\models\FormularioSearch;
use app\models\Regimen;
use app\models\Cliente;
use app\models\Pais;
use app\models\Documento;
use app\models\ClienteSearch;
use app\models\Usuario;


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
    public function actionView($id, $msgdd='hola', $msgdf='hola' )
    {
        $model = $this->findModel($id);
        $detalleDocumento = new Detalledocumento();
        $modelDetails = $detalleDocumento->find()->where(['id_tramite_dd'=>$model->id_tramite])->all();
        $detalleformularios = \app\models\Detalleformulario::find()->where(['id_tramite_df' => $model->id_tramite])->all();
        return $this->render('view', [
            'model' => $model,
            'modelDetails' => $modelDetails,
            'detalleformularios' => $detalleformularios,
            'msgdd' => $msgdd,
            'msgdf' => $msgdf,
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
        
        $modelDetails = [];
        $modelDetalleformulario = [];
        $modelFormularioSearch= [];
        
        
        
        $modelusuario = new \app\models\Usuario;
        $modelclientesearch = new \app\models\ClienteSearch();
        $modelpais = new \app\models\Pais;
        $modelregimen = new \app\models\Regimen();
        $modeldocumento = new \app\models\Documento();
        $modelformulario = new Formulario();
        
        
        $cliente = $modelclientesearch->findOne(['nitci_cli'=>'0']);
        
        $datausuario = $modelusuario->findBySql("select * from usuario where id_usuario=1")->all();
    //->select(['nitci_cli as value', 'id_cliente as id', "concat(nitci_cli,' ' , nombre_cli) as label", 'nombre_cli as nombre_cli', 'correo_cli as correo_cli', 'direccion_cli as direccion_cli', 'telefono_cli as telefono_cli'])
        $datacliente = $modelclientesearch->find()
                ->select(['nitci_cli as value', 'id_cliente as id', "concat('C.I: ', nitci_cli,', Nombre: ' , nombre_cli) as label", 'nombre_cli as nombre_cli', 'correo_cli as correo_cli', 'direccion_cli as direccion_cli', 'telefono_cli as telefono_cli'])
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
        
        
        
        $datadocumento = $modeldocumento->find()
                ->select(["nombre_doc as value", "nombre_doc", 'id_documento as id'])
                ->asArray()
                ->all();
        
        $dataformulario = $modelformulario->find()
                ->select(["nombre_form as value", "nombre_form", 'id_formulario as id'])
                ->asArray()
                ->all();
        
        $formDetails = Yii::$app->request->post('Detalledocumento', []);
        
        $formDetalleformulario = Yii::$app->request->post('Detalleformulario', []);
        
        $formFormularioSearch = Yii::$app->request->post('FormularioSearch', []);
        
        if (count($formDetails)==0){
            $datadocumento = $modeldocumento
                    ->find()
                    ->where([
                        'nombre_doc'=>'FACTURA COMERCIAL',
                        ])
                    ->orWhere([
                        'nombre_doc'=>'PARTE DE RECEPCION'
                        ])
                    ->orWhere([
                        'nombre_doc'=>'FACTURA DE TRANSPORTE DE MERCANCIAS'
                        ])
                    ->orWhere([ 
                        'nombre_doc'=>'DOCUMENTO DE TRANSPORTE HOUSE BL'
                        ])
                    ->all();
            foreach($datadocumento as $doc){
                $modelDetails[] = new Detalledocumento([
                    'documento_dd' => $doc->nombre_doc, 
                    'cantidad_dd' => 0, 
                    'fechadocumento_dd' => date('d/m/y'),
                    'disabled' => true,
                    ]);
            }
        }
        
        foreach ($formDetails as $i => $formDetail) {
            $modelDetail = new Detalledocumento(['scenario' => Detalledocumento::SCENARIO_BATCH_UPDATE]);
            $modelDetail->setAttributes($formDetail);
            if ($i<=3) $modelDetail->disabled = true; else $modelDetail->disabled = false;
            $modelDetails[] = $modelDetail;
        }
        
        foreach ($formDetalleformulario as $i => $formDetail) {
            $modelDetalle = new Detalleformulario(['scenario' => Detalleformulario::SCENARIO_BATCH_UPDATE]);
            $modelDetalle->setAttributes($formDetail);
            $modelDetalleformulario[] = $modelDetalle;
        }
        
        foreach ($formFormularioSearch as $i => $formDetail) {
            $modelDetalle = new FormularioSearch();
            $modelDetalle->setAttributes($formDetail);
            $modelFormularioSearch[] = $modelDetalle;
        }

        //handling if the addRow button has been pressed
        if (Yii::$app->request->post('addRow') == 'true') {
            $model->load(Yii::$app->request->post());
            $cliente = $modelclientesearch->findOne(['id_cliente'=>$model->id_cliente_tra]);
            $modelDetails[] = new Detalledocumento(['scenario' => Detalledocumento::SCENARIO_BATCH_UPDATE, 'disabled'=>false]);
            $modelFormularioSearch[] = new FormularioSearch();
            return $this->render('create', [
                'model' => $model,
            'modelclientesearch' => $modelclientesearch,
            'modelpais' => $modelpais,
            'modelregimen' => $modelregimen,
            'modelDetails' => $modelDetails,
            'modelDetalleformulario' => $modelDetalleformulario,
            'modelFormularioSearch' => $modelFormularioSearch,
            'modeldocumento' => $modeldocumento,
            'modelformulario' => $modelformulario,
            'datausuario' => $datausuario,
            'datacliente' => $datacliente,
            'datapais' => $datapais,
            'dataregimen' => $dataregimen,
            'datadocumento' => $datadocumento,
            'dataformulario' => $dataformulario,
            'cliente' => $cliente,
                
            ]);
        }
        
        //handling if the addRow button has been pressed
        if (Yii::$app->request->post('addRowformulario') == 'true') {
            $model->load(Yii::$app->request->post());
            $cliente = $modelclientesearch->findOne(['id_cliente'=>$model->id_cliente_tra]);
            $modelDetalleformulario[] = new Detalleformulario(['scenario' => Detalledocumento::SCENARIO_BATCH_UPDATE, 'disabled'=>false]);
            $modelFormularioSearch[] = new FormularioSearch();
            return $this->render('create', [
                'model' => $model,
                'modelclientesearch' => $modelclientesearch,
                'modelpais' => $modelpais,
                'modelregimen' => $modelregimen,
                'modelDetails' => $modelDetails,
                'modelDetalleformulario' => $modelDetalleformulario,
                'modelFormularioSearch' => $modelFormularioSearch,
                'modeldocumento' => $modeldocumento,
                'modelformulario' => $modelformulario,
                'datausuario' => $datausuario,
                'datacliente' => $datacliente,
                'datapais' => $datapais,
                'dataregimen' => $dataregimen,
                'datadocumento' => $datadocumento,
                'dataformulario' => $dataformulario,
                'cliente' => $cliente,
            ]);
        }
        

        //guardar registros
        if ($model->load(Yii::$app->request->post())){
            $model->id_usuario_tra = 1;
            $model->estado_tra = 'AC';
            $model->fecha_tra = date('y-m-d H:i:s');
            if ($model->save()) {
                foreach($modelDetails as $i=>$modelDetail) {
                    if ($i<=3) $modelDetail->disabled = true; else $modelDetail->disabled = false;
                    $modelDetail->id_tramite_dd = $model->id_tramite;
                    $modelDetail->estado_dd = 'AC';
                    $modelDetail->save();
                }
                
                foreach($modelDetalleformulario as $i=>$modelDetail) {
                    $modelDetail->id_tramite_df = $model->id_tramite;
                    $modelDetail->estado_df = 'AC';
                    $modelDetail->save();
                }
                
                return $this->redirect([
                    'view',
                    'id' => $model->id_tramite,
                    'model' => $model,
                    'modelDetails' => $modelDetails,
                        
                        ]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelclientesearch' => $modelclientesearch,
            'modelpais' => $modelpais,
            'modelregimen' => $modelregimen,
            'modelDetails' => $modelDetails,
            'modelDetalleformulario' => $modelDetalleformulario,
            'modelFormularioSearch' => $modelFormularioSearch,
            'modeldocumento' => $modeldocumento,
            'modelformulario' => $modelformulario,
            'datausuario' => $datausuario,
            'datacliente' => $datacliente,
            'datapais' => $datapais,
            'dataregimen' => $dataregimen,
            'datadocumento' => $datadocumento,
            'dataformulario' => $dataformulario,
            'cliente' => $cliente,
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
        
        $msgdd = '';
        $msgdf = '';
        
        
        $modelFormulario = new Formulario();
        
        $model = $this->findModel($id);
        $modelDetails = $model->detalledocumento;
        $modelDetalleformulario = $model->detalleformulario;
        //$modelFormularioSearch = $modelFormulario->find()->join('detalleformulario', 'formulario.id_formulario=detalleformulario.id_formulario_df')->asArray()->all();
        $modelFormularioSearch = FormularioSearch::findBySql(""
                ."SELECT 	f.* "
                ."FROM 		formulario f "
                ."inner join 	detalleformulario  df on (f.id_formulario=df.id_formulario_df) "
                ."where df.id_tramite_df=$id;"
        )->all();
                
        
       $msgdf = $msgdf . 'FORMULARIO '. count($modelFormularioSearch) . '<br>';
                
        
        $modelusuario = new Usuario();
        $modelclientesearch = new ClienteSearch();
        $modelpais = new Pais();
        $modelregimen = new Regimen();
        $modeldocumento = new Documento();
        $modelformulario = new Formulario();
        
        
        $cliente = $modelclientesearch->findOne(['id_cliente'=>$model->id_cliente_tra]);
        
        $datausuario = $modelusuario->findBySql("select * from usuario where id_usuario=1")->all();
    //->select(['nitci_cli as value', 'id_cliente as id', "concat(nitci_cli,' ' , nombre_cli) as label", 'nombre_cli as nombre_cli', 'correo_cli as correo_cli', 'direccion_cli as direccion_cli', 'telefono_cli as telefono_cli'])
        $datacliente = $modelclientesearch->find()
                ->select(['nitci_cli as value', 'id_cliente as id', "concat(nitci_cli,' ' , nombre_cli) as label", 'nombre_cli as nombre_cli', 'correo_cli as correo_cli', 'direccion_cli as direccion_cli', 'telefono_cli as telefono_cli'])
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
        
        
        
        $datadocumento = $modeldocumento->find()
                ->select(["nombre_doc as value", "nombre_doc", 'id_documento as id'])
                ->asArray()
                ->all();
        
        $dataformulario = $modelformulario->find()
                ->select(["nombre_form as value", "nombre_form", 'id_formulario as id'])
                ->asArray()
                ->all();
        
        $formDetails            = Yii::$app->request->post('Detalledocumento', []);
        
        $formDetalleformulario  = Yii::$app->request->post('Detalleformulario', []);
        
        
        

        //al iniciar un nuevo registro de documento
        $msgdd = $msgdd . "CARGANDO DETALLEDOCUMENTOS nro de registros: " . count($formDetails) . "<BR>";
        foreach ($formDetails as $i => $formDetail) {
            //loading the models if they are not new
            if (isset($formDetail['id_detalledocumento']) && isset($formDetail['updateType']) && $formDetail['updateType'] != Detalledocumento::UPDATE_TYPE_CREATE) {
                //making sure that it is actually a child of the main model
                $modelDetail = Detalledocumento::findOne([
                    'id_detalledocumento' => $formDetail['id_detalledocumento'], 
                    'id_tramite_dd' => $model->id_tramite
                    ]);
                $modelDetail->setScenario(Detalledocumento::SCENARIO_BATCH_UPDATE);
                $modelDetail->setAttributes($formDetail);
                $modelDetails[$i] = $modelDetail;
                //validate here if the modelDetail loaded is valid, and if it can be updated or deleted
                $msgdd = $msgdd . "para actualizar o eliminar ";
                $msgdd = $msgdd 
                                . $modelDetail->updateType . " " 
                                . $modelDetail->id_detalledocumento . " " 
                                . $modelDetail->id_tramite_dd . " " 
                                . $modelDetail->documento_dd . " " 
                                . $modelDetail->fechadocumento_dd . " " 
                                . $modelDetail->estado_dd . "<br>";
            } else {
                $modelDetail = new Detalledocumento(['scenario' => Detalledocumento::SCENARIO_BATCH_UPDATE]);
                $modelDetail->setAttributes($formDetail);
                $modelDetail->id_tramite_dd = $model->id_tramite;
                $modelDetail->estado_dd = "AC";
                $modelDetails[] = $modelDetail;
                $msgdf = $msgdf . "nuevo  detalledocumento";
                $msgdd = $msgdd 
                                . $modelDetail->updateType . " " 
                                . $modelDetail->id_detalledocumento . " " 
                                . $modelDetail->id_tramite_dd . " " 
                                . $modelDetail->documento_dd . " " 
                                . $modelDetail->fechadocumento_dd . " " 
                                . $modelDetail->estado_dd . "<br>";
            }

        }
        
        //CARGAR FORMULARIOS
        //al iniciar un nuevo registro de FORMULARIO
        $msgdf = $msgdf . "CARGANDO DETALLEFORMULARIO nro de registros: " . sizeof($formDetalleformulario) . "<BR>";
        $sw = false;
        foreach ($formDetalleformulario as $i => $modelDetail) {
            //loading the models if they are not new
            $sw = true;
            $msgdf = $msgdf . "cargando detalleformulario ";
            if (isset($formDetail['id_detalleformulario']) && isset($formDetail['updateType']) && $formDetail['updateType'] != Detalleformulario::UPDATE_TYPE_CREATE) {
                //making sure that it is actually a child of the main model
                $modelDetail = Detalleformulario::findOne([
                    'id_detalleformulario' => $formDetail['id_detalleformulario'], 
                    'id_tramite_df' => $model->id_tramite
                    ]);
                $modelDetail->setScenario(Detalleformulario::SCENARIO_BATCH_UPDATE);
                $modelDetail->setAttributes($formDetail);
                $modelDetalleformulario[$i] = $modelDetail;
                $msgdf = $msgdf . "ACTUALIZAR - > "
                                . $formDetail->updateType . " " 
                                . $formDetail->id_detalleformulario . " " 
                                . $formDetail->id_tramite_df . " " 
                                . $formDetail->id_formulario_df . " " 
                                . $formDetail->fecha_df . " " 
                                . $formDetail->estado_df . "<br>";
                //validate here if the modelDetail loaded is valid, and if it can be updated or deleted
            } else {
                $modelDetail = new Detalleformulario(['scenario' => Detalleformulario::SCENARIO_BATCH_UPDATE]);
                $modelDetail->setAttributes($formDetail);
                $modelDetail->id_tramite_df = $model->id_tramite;
                $modelDetail->estado_df = "AC";
                $modelDetalleformulario[] = $modelDetail;
                $msgdf = $msgdf . "GUARDAR - > "
                                . $modelDetail->updateType . " " 
                                . $modelDetail->id_detalleformulario . " " 
                                . $modelDetail->id_tramite_df . " " 
                                . $modelDetail->id_formulario_df . " " 
                                . $modelDetail->fecha_df . " " 
                                . $modelDetail->estado_df . "<br>";
            }

        }

        if ($sw) 
            $msgdf = $msgdf . "se cargo detalleformulario";
        else
            $msgdf = $msgdf . "NO se cargo detalleformulario";


        //handli ng if the addRow button has been pressed
        //al presionar el boton adicionar documento
        if (Yii::$app->request->post('addRow') == 'true') {
            $msgdd = $msgdd . " se agrego nuevo detalledocumento <br>";
            $modelDetails[] = new Detalledocumento(['scenario' => Detalledocumento::SCENARIO_BATCH_UPDATE]);
            foreach($modelDetails as $detail) {
                $msgdd = $msgdd 
                                . $detail->updateType . " " 
                                . $detail->id_detalledocumento . " " 
                                . $detail->id_tramite_dd . " " 
                                . $detail->documento_dd . " " 
                                . $detail->fechadocumento_dd . " " 
                                . $detail->estado_dd . "<br>";
            }
            return $this->render('update', [
                'model' => $model,
                'modelclientesearch' => $modelclientesearch,
                'modelpais' => $modelpais,
                'modelregimen' => $modelregimen,
                'modelDetails' => $modelDetails,
                'modelDetalleformulario' => $modelDetalleformulario,
                'modelFormularioSearch' => $modelFormularioSearch,    
                'modeldocumento' => $modeldocumento,
                'datausuario' => $datausuario,
                'datacliente' => $datacliente,
                'datapais' => $datapais,
                'dataregimen' => $dataregimen,
                'datadocumento' => $datadocumento,
                'dataformulario' => $dataformulario,
                'cliente' => $cliente,
                'msgdd' => $msgdd,
                'msgdf' => $msgdf,
            ]);
        }
        
        //handling if the addRow button has been pressed
        //al presionar el boton adicionar FORMULARIO
        if (Yii::$app->request->post('addRowformulario') == 'true') {
            $msgdf = $msgdf . " se agrego nuero detalleformulario -->";
            $modelDetalleformulario[] = new Detalleformulario(['scenario' => Detalleformulario::SCENARIO_BATCH_UPDATE, 'id_tramite_df' => $model->id_tramite]);
            foreach($modelDetalleformulario as $detalleform) {
                $msgdf = $msgdf 
                                . $detalleform->updateType . " " 
                                . $detalleform->id_detalleformulario . " " 
                                . $detalleform->id_tramite_df . " " 
                                . $detalleform->id_formulario_df . " " 
                                . $detalleform->fecha_df . " " 
                                . $detalleform->estado_df . "<br>";
            }
            $modelFormularioSearch[] = Formulario::findOne(['id_formulario'=>$detalleform->id_formulario_df]);
            $msgdf = $msgdf . 'FORMULARIO '. count($modelFormularioSearch) . '<br>';
            return $this->render('update', [
                'model' => $model,
                'modelclientesearch' => $modelclientesearch,
                'modelpais' => $modelpais,
                'modelregimen' => $modelregimen,
                'modelDetails' => $modelDetails,
                'modelDetalleformulario' => $modelDetalleformulario,
                'modelFormularioSearch' => $modelFormularioSearch,    
                'modeldocumento' => $modeldocumento,
                'datausuario' => $datausuario,
                'datacliente' => $datacliente,
                'datapais' => $datapais,
                'dataregimen' => $dataregimen,
                'datadocumento' => $datadocumento,
                'dataformulario' => $dataformulario,
                'cliente' => $cliente,
                'msgdd' => $msgdd,
                'msgdf' => $msgdf,
            ]);
        }
        
        
        

        
        
        //Guardar registros
        $msgdd = $msgdd . " GUARDADO DE DETALLEDOCUMENTO <br>";
        $msgdf = $msgdf . " GUARDANDO DETALLEFORMULARIO <br>";
        if ($model->load(Yii::$app->request->post())) {
            //$msg = $msg . " Iniciando guardado de registros | -->";
            if (Model::validateMultiple($modelDetails) && Model::validateMultiple($modelDetalleformulario) && $model->validate()) {
                $model->save();
                //GUARDAR DETALLE DE DOCUMENTOS
                foreach($modelDetails as $modelDetail) {
                    //details that has been flagged for deletion will be deleted
                    if ($modelDetail->updateType == Detalledocumento::UPDATE_TYPE_DELETE) {
                        $modelDetail->delete();
                        $msgdd = $msgdd 
                                . $modelDetail->updateType . " " 
                                . $modelDetail->id_detalledocumento . " " 
                                . $modelDetail->id_tramite_dd . " " 
                                . $modelDetail->documento_dd . " " 
                                . $modelDetail->fechadocumento_dd . " " 
                                . $modelDetail->estado_dd . " -> ELIMINADO <br>";
                    } else {
                        //new or updated records go here
                        //$modelDetail->id_tramite_dd = $model->id_tramite;
                        $modelDetail->save();
                        $msgdd = $msgdd 
                                . $modelDetail->updateType . " " 
                                . $modelDetail->id_detalledocumento . " " 
                                . $modelDetail->id_tramite_dd . " " 
                                . $modelDetail->documento_dd . " " 
                                . $modelDetail->fechadocumento_dd . " " 
                                . $modelDetail->estado_dd . " -> MODIFICADO <br>";
                    }
                }
                $msgdd = $msgdd . "<br>";
                
                //GUARDAR DETALLE DE FORMULARIOS
                foreach($modelDetalleformulario as $detalleform) {
                    $msgdf = $msgdf . "iniciando operacion en detalleformulario: " . $detalleform->id_detalleformulario . "-->";
                    //details that has been flagged for deletion will be deleted
                    if ($detalleform->updateType == Detalleformulario::UPDATE_TYPE_DELETE) {
                        $detalleform->delete();
                        $msgdf = $msgdf 
                                . $detalleform->updateType . " " 
                                . $detalleform->id_detalleformulario . " " 
                                . $detalleform->id_tramite_df . " " 
                                . $detalleform->id_formulario_df . " " 
                                . $detalleform->fecha_df . " " 
                                . $detalleform->estado_df . " -> ELIMINADO <BR>";
                    } else {
                        //new or updated records go here
                        $detalleform->id_tramite_df = $model->id_tramite;
                        $detalleform->estado_df = 'AC';
                        
                        $detalleform->save();
                        $msgdf = $msgdf 
                                . $detalleform->updateType . " " 
                                . $detalleform->id_detalleformulario . " " 
                                . $detalleform->id_tramite_df . " " 
                                . $detalleform->id_formulario_df . " " 
                                . $detalleform->fecha_df . " " 
                                . $detalleform->estado_df . " -> GUARDADO <BR>";
                    }
                }
                $msgdf = $msgdf . '<br>';
                return $this->redirect([
                    'view', 'id' => $model->id_tramite,
                    'modelDetails' => $modelDetails,
                    'modelDetalleformulario' => $modelDetalleformulario,
                    'msgdd' =>$msgdd,
                    'msgdf' =>$msgdf,
                    ]);
            } else {
                $msgdd = $msgdd . "Validacion de tramite o documento incorrecta!!-->";
                $msgdf = $msgdf . "Validacion de tramite o formulario incorrecta!!-->";
            }
        } else {
            //$msg = $msg . " No se inicio el guardado -->";
        }


        return $this->render('update', [
            'model' => $model,
            'modelclientesearch' => $modelclientesearch,
            'modelpais' => $modelpais,
            'modelregimen' => $modelregimen,
            'modelDetails' => $modelDetails,
            'modelDetalleformulario' => $modelDetalleformulario,
            'modelFormularioSearch' => $modelFormularioSearch,
            'modeldocumento' => $modeldocumento,
            'datausuario' => $datausuario,
            'datacliente' => $datacliente,
            'datapais' => $datapais,
            'dataregimen' => $dataregimen,
            'datadocumento' => $datadocumento,
            'dataformulario' => $dataformulario,
            'cliente' => $cliente,
            'msgdd' => $msgdd,
            'msgdf' => $msgdf,
        ]);
        
        /////////////////////*//////
        /*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tramite]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
         * */
         
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
