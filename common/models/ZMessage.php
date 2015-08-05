<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%message}}".
 *
 * @property integer $id
 * @property string $real_name
 * @property string $real_mobile
 * @property string $real_remark
 * @property integer $status
 * @property string $created
 * @property string $updated
 */
class ZMessage extends \yii\db\ActiveRecord
{
    private $_statusLabel;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['real_name', 'real_mobile', 'real_remark'], 'required'],
            [['real_mobile', 'status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['real_name'], 'string', 'max' => 64],
            [['real_remark'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'real_name' => '姓名',
            'real_mobile' => '移动电话',
            'real_remark' => '留言信息',
            'status' => '状态',
            'created' => '创建时间',
            'updated' => '更新时间',
        ];
    }

    public function getStatusLabel()
    {
        if ($this->_statusLabel === null) {
            $statuses = self::getArrayStatus();
            $this->_statusLabel = $statuses[$this->status];
        }
        return $this->_statusLabel;
    }

    /**
     * @inheritdoc
     */
    public static function getArrayStatus()
    {
        return [
            0 => '未读',
            1 => '已读',
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
