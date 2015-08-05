<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\ZModelCat;

/* @var $this yii\web\View */
/* @var $model common\models\ZModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zmodel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'model_cat')->dropDownList(ZModelCat::getArrayModelCatList()) ?>

    <?= $form->field($model, 'model_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_bust')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_waist')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_hip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_arm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_shoes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_thigh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_calf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_coat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_pants')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_bras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_leg_length')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_arm_length')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_head')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_shoulder')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_tattoo')->radioList(['1' => '是', '0' => '否']) ?>

    <?= $form->field($model, 'model_style')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_long_hair')->radioList(['1' => '是', '0' => '否']) ?>

    <?= $form->field($model, 'starting_expenses')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shed_piece')->textInput() ?>

    <?= $form->field($model, 'studio_time')->textInput() ?>

    <?= $form->field($model, 'outside_nerve')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '编辑', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
