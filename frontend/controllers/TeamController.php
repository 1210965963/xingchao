<?php

namespace frontend\controllers;

use yii\data\ActiveDataProvider;
use common\models\ZModel;
use yii\web\NotFoundHttpException;
class TeamController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSheYing()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ZModel::find()->onCondition(['model_cat'=>1]),
        ]);
        
        return $this->render('sheying', [
            'models' => $dataProvider->getModels(),
        ]);
    }

    public function actionSheJi()
    {
        return $this->render('sheji');
    }

    /**
     * Finds the ZModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ZModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ZModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
