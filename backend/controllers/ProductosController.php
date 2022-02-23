<?php

namespace backend\controllers;

use backend\models\Productos;
use backend\models\search\ProductosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\ProductoSearch;
use yii\filters\AccessControl;

use yii;
use yii\web\UploadedFile;

/**
 * ProductosController implements the CRUD actions for Productos model.
 */
class ProductosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    private function getFilters(){

        $session = Yii::$app->session;

        $searchParams = Yii::$app->request->queryParams;

        if (isset($searchParams['reset'])){
            unset($searchParams['ProductosSearch']);
            $session->remove('productos.search_params');
        }

        if (!isset($searchParams['ProductosSearch'])){
            $searchParams['ProductosSearch'] = $session->get('productos.search_params');
        }else{
            $session->set('productos.search_params', $searchParams['ProductosSearch']);
        }

        return $searchParams;
    }


    /**
     * Lists all Productos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductosSearch();
        $dataProvider = $searchModel->search($this->getFilters());
        // $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Productos model.
     * @param int $idProducto Id Producto
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idProducto)
    {
        return $this->render('view', [
            'model' => $this->findModel($idProducto),
        ]);
    }

   
    /**
     * Creates a new Productos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

     
    public function actionCreate()
    {
        $model = new Productos();

        
        if ($model->load(Yii::$app->request->post())) {

            $model->imagenFile = UploadedFile::getInstance($model, 'imagenFile');
            if ($model->upload() && $model->save()) {
                return $this->redirect(['index']);
            }
        }
        // if ($this->request->isPost) {
        //     if ($model->load($this->request->post()) && $model->save()) {
        //         return $this->redirect(['view', 'idProducto' => $model->idProducto]);
        //     }
        // } else {
        //     $model->loadDefaultValues();
        // }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Productos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idProducto Id Producto
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idProducto)
    {
        $model = $this->findModel($idProducto);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idProducto' => $model->idProducto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Productos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idProducto Id Producto
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idProducto)
    {
        $this->findModel($idProducto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Productos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idProducto Id Producto
     * @return Productos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idProducto)
    {
        if (($model = Productos::findOne(['idProducto' => $idProducto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
