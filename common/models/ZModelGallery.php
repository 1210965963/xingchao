<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%model_gallery}}".
 *
 * @property integer $id
 * @property integer $model_id
 * @property string $thumb_image
 * @property string $image
 * @property string $created
 * @property string $updated
 */
class ZModelGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%model_gallery}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['thumb_image', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'model_id' => '与z_model关联',
            'thumb_image' => '缩略图路径',
            'image' => '原图路径',
            'created' => '创建时间',
            'updated' => '更新时间',
        ];
    }
    
    public function beforeSave($insert)
    {
        $datetime = date('Y-m-d H:i:s');
        if (parent::beforeSave($insert))  {
            if ($insert) {
                $this->created = $datetime;
                $this->updated = $datetime;
            } else {
                $this->updated = $datetime;
            }
            return true;
        } else {
            return false;
        }
    }
}
