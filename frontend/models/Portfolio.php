<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%portfolio}}".
 *
 * @property string $id
 * @property string $picture
 * @property string $description
 * @property string $client
 * @property string $service_category_id
 */
class Portfolio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%portfolio}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['picture', 'description', 'client', 'service_category_id'], 'required'],
            [['service_category_id'], 'integer'],
            [['picture', 'description'], 'string', 'max' => 255],
            [['client'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'picture' => Yii::t('app', 'Picture'),
            'description' => Yii::t('app', 'Description'),
            'client' => Yii::t('app', 'Client'),
            'service_category_id' => Yii::t('app', 'Service Category ID'),
        ];
    }
}
