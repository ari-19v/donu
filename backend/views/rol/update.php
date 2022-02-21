<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Roles */

$this->title = Yii::t('app', 'Update Roles: {name}', [
    'name' => $model->idRole,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idRole, 'url' => ['view', 'idRole' => $model->idRole]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="roles-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
