<?php

namespace frontend\controllers;

use Yii;
use common\models\ZMessage;

class ContactController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new ZMessage();
        
        return $this->render('index', ['model'=>$model]);
    }

    public function actionSave()
    {
        $model = new ZMessage();
        $model->load(Yii::$app->request->post());
        if ($model->validate()) {
            $model->save();
            return $this->redirect(['index', 'success' => 1]);
        } else {
            return $this->render('index', ['model' => $model]);
        }
    }
}
