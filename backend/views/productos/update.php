<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Productos */

$this->title = Yii::t('app', 'Update Productos: {name}', [
    'name' => $model->idProducto,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProducto, 'url' => ['view', 'idProducto' => $model->idProducto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="productos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
