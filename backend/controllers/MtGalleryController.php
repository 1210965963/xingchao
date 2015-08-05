<?php

namespace backend\controllers;

use Yii;
use common\models\ZModelGallery;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\ZModel;

/**
 * MtGalleryController implements the CRUD actions for ZModelGallery model.
 */
class MtGalleryController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all ZModelGallery models.
     * @return mixed
     */
    public function actionIndex($model_id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ZModelGallery::find()->onCondition(['model_id'=>$model_id]),
        ]);

        return $this->render('index', [
            'models' => $dataProvider->getModels(),
        ]);
    }
    
    public function actionUpload()
    {
        $model = new ZModelGallery();
        $file = UploadedFile::getInstance($model, 'image');
        if (Yii::$app->request->isPost) {
            $model->model_id = \Yii::$app->request->post('model_id', 0);
            if ($file && $model->validate()) {
                $filename = \Yii::$app->user->id.md5($file->baseName) . '.' . $file->extension;
                $model->image = $filename;
                $file->saveAs(\Yii::$app->params['uploadPath'] . '/' . $filename);
                $model->insert();
                
                return '{"code":"0", "message":"success", "id":"'.$model->id.'", "image":"'.\Yii::$app->params['uploadFileUrl'].'/upload/'.$filename.'"}';
            }
        }
        
        return '{"code":"1", "message":"上传失败"}';
    }

    public function actionSetImage()
    {
        $id = \Yii::$app->request->post('id', 0);
        $model = $this->findModel($id);

        $zmodel = ZModel::findOne(['id' => $model->model_id]);
        $zmodel->default_image = $id;
        $zmodel->update();

        return '{"code":"0","message":"success","id":"'.$model->model_id.'"}';
    }

    /**
     * Deletes an existing ZModelGallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        $id = \Yii::$app->request->post('id', 0);
        $model = $this->findModel($id);
        $file = \Yii::$app->params['uploadPath'].'/'.$model->image;
        is_file($file) && unlink($file);
        $model->delete();

        return '{"code":"0","message":"success","id":"'.$id.'"}';
    }

    /**
     * Finds the ZModelGallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ZModelGallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ZModelGallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
