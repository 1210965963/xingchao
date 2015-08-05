<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ZModel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '模特管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zmodel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'model_cat',
            'model_name',
            'model_height',
            'model_weight',
            'model_bust',
            'model_waist',
            'model_hip',
            'model_arm',
            'model_shoes',
            'model_thigh',
            'model_calf',
            'model_coat',
            'model_pants',
            'model_bras',
            'model_leg_length',
            'model_arm_length',
            'model_head',
            'model_shoulder',
            'model_tattoo',
            'model_style',
            'model_address',
            'is_long_hair',
            'starting_expenses',
            'shed_piece',
            'studio_time:datetime',
            'outside_nerve',
            'address',
            'disabled',
            'sort',
            'created',
            'updated',
        ],
    ]) ?>

</div>
