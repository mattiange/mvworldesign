<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $picture
 * @property string $description
 *
 * @property UsersHasMvwdAuthorizations[] $usersHasMvwdAuthorizations
 * @property Authorizations[] $authorizations
 * @property UsersHasMvwdServices[] $usersHasMvwdServices
 * @property Services[] $services
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password', 'picture', 'description'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 45],
            [['password', 'picture'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'picture' => Yii::t('app', 'Picture'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersHasMvwdAuthorizations()
    {
        return $this->hasMany(UsersHasMvwdAuthorizations::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorizations()
    {
        return $this->hasMany(Authorizations::className(), ['id' => 'authorizations_id'])->viaTable('{{%users_has_mvwd_authorizations}}', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersHasMvwdServices()
    {
        return $this->hasMany(UsersHasMvwdServices::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Services::className(), ['id' => 'service_id', 'category_id' => 'category_id'])->viaTable('{{%users_has_mvwd_services}}', ['user_id' => 'id']);
    }
}
