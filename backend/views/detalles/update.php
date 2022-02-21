<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DetallePedido */

$this->title = Yii::t('app', 'Update Detalle Pedido: {name}', [
    'name' => $model->idDetallePedido,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalle Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDetallePedido, 'url' => ['view', 'idDetallePedido' => $model->idDetallePedido]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="detalle-pedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
