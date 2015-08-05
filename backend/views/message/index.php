<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '留言管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zmessage-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="display: none;">
        <?= Html::a('Create Zmessage', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'real_name',
            'real_mobile',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->statusLabel;
                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'status',
                    $arrayStatus,
                    ['class' => 'form-control', 'prompt' => Yii::t('app', 'Please Filter')]
                 )
            ],
            'created',
            // 'updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
