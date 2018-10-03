<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%authorizations}}".
 *
 * @property int $id
 * @property string $permesso
 *
 * @property UsersHasMvwdAuthorizations[] $usersHasMvwdAuthorizations
 * @property Users[] $users
 */
class Authorizations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%authorizations}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['permesso'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'permesso' => Yii::t('app', 'Permesso'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersHasMvwdAuthorizations()
    {
        return $this->hasMany(UsersHasMvwdAuthorizations::className(), ['authorizations_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['id' => 'user_id'])->viaTable('{{%users_has_mvwd_authorizations}}', ['authorizations_id' => 'id']);
    }
}
