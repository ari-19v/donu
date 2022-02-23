<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>
<section class=" containe bg-light">
    <div class="containe bg-secondary">        
        <div class="form-row " >
            <div class="col-md-10" >
                <?= Html::img('@web/images/icon/dona.png', ['width' =>'80'], ['height'=>'80']) ?>                
                    <button type="button"class=" btn btn-secondary" style="color: white">
                    <h1 class=""></h1>                     
                    <h1><strong><?= Html::encode($this->title) ?></strong></h1>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <?php
    $this->registerJsFile('js/main.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>

    <div class="productos-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <div class="form-row">
                <div class="col-6">
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-6">
                    <?= $form->field($model, 'precio')->textInput(['maxlength' => true]) ?>
                    <!-- $form->field($model, 'imagen')->fileInput() ?> -->
                    <div class="col col-sm-4">
            <?= $form->field($model, 'imagenFile')->fileInput(array('id'=>'uploadCtl')) ?>
            <img id="imagen" <?php if ($model->imagen){ ?>src="<?= $model->getFullImage() ?>"<?php } ?> style="max-width: 200px;"/>
        </div>
                </div>
            </div>
        </div>

        <!-- $form->field($model, 'imagen')->textInput(['maxlength' => true]) ?> -->

        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</section>
