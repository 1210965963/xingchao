<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%model}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $model_cat
 * @property string $model_name
 * @property string $model_height
 * @property string $model_weight
 * @property string $model_bust
 * @property string $model_waist
 * @property string $model_hip
 * @property string $model_arm
 * @property string $model_shoes
 * @property string $model_thigh
 * @property string $model_calf
 * @property string $model_coat
 * @property string $model_pants
 * @property string $model_bras
 * @property string $model_leg_length
 * @property string $model_arm_length
 * @property string $model_head
 * @property string $model_shoulder
 * @property integer $model_tattoo
 * @property string $model_style
 * @property string $model_address
 * @property integer $is_long_hair
 * @property string $starting_expenses
 * @property integer $shed_piece
 * @property integer $studio_time
 * @property integer $outside_nerve
 * @property string $address
 * @property integer $disabled
 * @property integer $sort
 * @property integer $default_image
 * @property string $created
 * @property string $updated
 */
class ZModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%model}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'model_cat', 'model_tattoo', 'is_long_hair', 'shed_piece', 'studio_time', 'outside_nerve', 'disabled', 'sort', 'default_image'], 'integer'],
            [['starting_expenses'], 'number'],
            [['created', 'updated'], 'safe'],
            [['model_name'], 'string', 'max' => 64],
            [['model_height', 'model_weight', 'model_bust', 'model_waist', 'model_hip', 'model_arm', 'model_shoes', 'model_thigh', 'model_calf', 'model_coat', 'model_pants', 'model_bras', 'model_leg_length', 'model_arm_length', 'model_head', 'model_shoulder'], 'string', 'max' => 32],
            [['model_style', 'model_address', 'address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'user_id' => '用户ID',
            'model_cat' => 'Model Cat',
            'model_name' => '模特姓名',
            'model_height' => '模特身高',
            'model_weight' => '模特体重',
            'model_bust' => '胸围',
            'model_waist' => '腰围',
            'model_hip' => '臀围',
            'model_arm' => '臂围',
            'model_shoes' => '鞋码',
            'model_thigh' => '大腿围',
            'model_calf' => '小腿围',
            'model_coat' => '上衣码',
            'model_pants' => '裤码',
            'model_bras' => '内衣码',
            'model_leg_length' => '腿长',
            'model_arm_length' => '臂长',
            'model_head' => '头围',
            'model_shoulder' => '肩宽',
            'model_tattoo' => '是否纹身 0 否 1 是',
            'model_style' => '模特style',
            'model_address' => '模特地址',
            'is_long_hair' => '是否长发. 0 否 1 是',
            'starting_expenses' => '起拍费用',
            'shed_piece' => '棚内记件',
            'studio_time' => '棚拍记时',
            'outside_nerve' => '外拍包天',
            'address' => '联系地址',
            'disabled' => '是否删除0 正常 1 删除',
            'sort' => '排序',
            'default_image' => '封面图片',
            'created' => '创建时间',
            'updated' => '更新时间',
        ];
    }

    public function beforeSave($insert)
    {
        $datetime = date('Y-m-d H:i:s');
        if (parent::beforeSave($insert))  {
            if ($insert) {
                $this->user_id = \Yii::$app->user->id;
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
