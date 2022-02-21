<?php

namespace backend\controllers;

use backend\models\Productos;
use backend\models\search\ProductosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\uploadedFile;
use yii\base\Model;
use dosamigos\fileinput\FileInput;

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

    /**
     * Lists all Productos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

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

      

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {

                if (Yii::$app->request->isPost) {
                    $model->imagen = UploadedFile::getInstance($model, 'imagen');
                    if ($model->upload()) {
                        // el archivo se subió exitosamente
                        return;
                    }
                }
                return $this->redirect(['index', 'idProducto' => $model->idProducto]);
            }
        } else {
            $model->loadDefaultValues();
        }

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

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
