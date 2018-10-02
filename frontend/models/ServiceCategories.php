<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_categories}}".
 *
 * @property string $id
 * @property string $service
 *
 * @property Services[] $services
 */
class ServiceCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%service_categories}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service'], 'required'],
            [['service'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'service' => Yii::t('app', 'Service'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Services::className(), ['category_id' => 'id']);
    }
}
