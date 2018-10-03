<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%users_has_mvwd_services}}".
 *
 * @property string $user_id
 * @property string $service_id
 * @property string $category_id
 *
 * @property Services $service
 * @property Users $user
 */
class UsersHasServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users_has_mvwd_services}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'service_id', 'category_id'], 'required'],
            [['user_id', 'service_id', 'category_id'], 'integer'],
            [['user_id', 'service_id', 'category_id'], 'unique', 'targetAttribute' => ['user_id', 'service_id', 'category_id']],
            [['service_id', 'category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['service_id' => 'id', 'category_id' => 'category_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'service_id' => Yii::t('app', 'Service ID'),
            'category_id' => Yii::t('app', 'Category ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id', 'category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
