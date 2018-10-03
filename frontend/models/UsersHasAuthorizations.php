<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%users_has_mvwd_authorizations}}".
 *
 * @property string $user_id
 * @property int $authorizations_id
 *
 * @property Authorizations $authorizations
 * @property Users $user
 */
class UsersHasAuthorizations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users_has_mvwd_authorizations}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'authorizations_id'], 'required'],
            [['user_id', 'authorizations_id'], 'integer'],
            [['user_id', 'authorizations_id'], 'unique', 'targetAttribute' => ['user_id', 'authorizations_id']],
            [['authorizations_id'], 'exist', 'skipOnError' => true, 'targetClass' => Authorizations::className(), 'targetAttribute' => ['authorizations_id' => 'id']],
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
            'authorizations_id' => Yii::t('app', 'Authorizations ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorizations()
    {
        return $this->hasOne(Authorizations::className(), ['id' => 'authorizations_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
