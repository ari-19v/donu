<?php

namespace backend\controllers;

use \yii\rest\ActiveController;
use backend\models\Pedidos;

class ApipedidosController extends ActiveController
{
    // public function actionIndex()
    // {
    //     return $this->render('index');
    // }

    public $modelClass = 'backend\models\Pedidos';

}
