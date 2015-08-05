<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '模特管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zmodel-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('添加模特', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'model_cat',
            'model_name',
            'model_height',
            // 'model_weight',
            // 'model_bust',
            // 'model_waist',
            // 'model_hip',
            // 'model_arm',
            // 'model_shoes',
            // 'model_thigh',
            // 'model_calf',
            // 'model_coat',
            // 'model_pants',
            // 'model_bras',
            // 'model_leg_length',
            // 'model_arm_length',
            // 'model_head',
            // 'model_shoulder',
            // 'model_tattoo',
            // 'model_style',
            // 'model_address',
            // 'is_long_hair',
            // 'starting_expenses',
            // 'shed_piece',
            // 'studio_time:datetime',
            // 'outside_nerve',
            // 'thumb_image',
            // 'image',
            // 'address',
            // 'disabled',
            // 'sort',
            // 'created',
            // 'updated',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{image} {view} {update} {delete}',
                'buttons' => [
                    'image' => function ($url, $model, $key) {
                        $options = array_merge([
                            'title' => '图片管理',
                            'aria-label' => '图片管理',
                            'data-pjax' => '0',
                        ]);
                        return Html::a('<span class="glyphicon glyphicon-upload"></span>', ['mt-gallery/index', 'model_id' => $model->id], $options);
                    }
                ]
            ],
        ],
    ]); ?>

</div>
