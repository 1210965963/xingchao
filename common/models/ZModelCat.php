<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%model_cat}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $created
 * @property string $updated
 */
class ZModelCat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%model_cat}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created', 'updated'], 'safe'],
            [['title'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '分类标题',
            'created' => '创建时间',
            'updated' => '更新时间',
        ];
    }
    
    public static function getArrayModelCatList()
    {
        return ArrayHelper::map(ZModelCat::find()->asArray()->all(), 'id', 'title');
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
