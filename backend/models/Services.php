<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%services}}".
 *
 * @property string $id
 * @property string $service
 * @property string $category_id
 * @property string $cover
 * @property string $intro_text
 * @property string $text
 * @property string $position
 *
 * @property ServiceCategories $category
 * @property UsersHasMvwdServices[] $usersHasMvwdServices
 * @property Users[] $users
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%services}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service', 'category_id', 'cover', 'intro_text', 'text', 'position'], 'required'],
            [['category_id'], 'integer'],
            [['intro_text', 'text'], 'string'],
            [['position'], 'number'],
            [['service'], 'string', 'max' => 45],
            [['cover'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceCategories::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => Yii::t('app', 'Category ID'),
            'cover' => Yii::t('app', 'Cover'),
            'intro_text' => Yii::t('app', 'Intro Text'),
            'text' => Yii::t('app', 'Text'),
            'position' => Yii::t('app', 'Position'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ServiceCategories::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersHasMvwdServices()
    {
        return $this->hasMany(UsersHasMvwdServices::className(), ['service_id' => 'id', 'category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['id' => 'user_id'])->viaTable('{{%users_has_mvwd_services}}', ['service_id' => 'id', 'category_id' => 'category_id']);
    }
}
