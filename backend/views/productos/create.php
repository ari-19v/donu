<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;
use app\assets\StatusAsset;
/* @var $this yii\web\View */
/* @var $model backend\models\Productos */

$this->title = Yii::t('app', 'Create Productos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-create">

 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
