<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EstadoPedidos */

$this->title = Yii::t('app', 'Update Estado Pedidos: {name}', [
    'name' => $model->idEstado,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estado Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEstado, 'url' => ['view', 'idEstado' => $model->idEstado]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="estado-pedidos-update">

   <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
