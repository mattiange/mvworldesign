<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%portfolio}}".
 *
 * @property string $id
 * @property string $picture
 * @property string $description
 * @property string $client
 * @property string $evidence
 * @property string $service_category_id
 * @property string $type
 *
 * @property ServiceCategories $serviceCategory
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
            [['picture', 'description', 'client', 'evidence', 'service_category_id'], 'required'],
            [['evidence'], 'string'],
            [['service_category_id'], 'integer'],
            [['picture', 'description'], 'string', 'max' => 255],
            [['client'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 50],
            [['service_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceCategories::className(), 'targetAttribute' => ['service_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'picture' => Yii::t('app', 'Immagine'),
            'description' => Yii::t('app', 'Descrizione'),
            'client' => Yii::t('app', 'Cliente'),
            'evidence' => Yii::t('app', 'In evidenza?'),
            'service_category_id' => Yii::t('app', 'Categoria'),
            'type' => Yii::t('app', 'Mime type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceCategory()
    {
        return $this->hasOne(ServiceCategories::className(), ['id' => 'service_category_id']);
    }
}
