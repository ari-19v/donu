<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pedidos */

$this->title = Yii::t('app', 'Update Pedidos: {name}', [
    'name' => $model->idPedido,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPedido, 'url' => ['view', 'idPedido' => $model->idPedido]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pedidos-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
