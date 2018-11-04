<?php

namespace backend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $picture
 * @property string $description
 * @property string $status
 * @property string $password_hash
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $username
 *
 * @property UsersHasMvwdAuthorizations[] $usersHasMvwdAuthorizations
 * @property Authorizations[] $authorizations
 * @property UsersHasMvwdServices[] $usersHasMvwdServices
 * @property Services[] $services
 */
class Users extends ActiveRecord implements IdentityInterface
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
            [['username','name', 'email', 'password', 'picture', 'description', 'status', 'password_hash', 'auth_key'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['username', 'email'], 'string', 'max' => 45],
            [['password', 'picture', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 2],
            [['auth_key'], 'string', 'max' => 32],
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
            'status' => Yii::t('app', 'Status'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'username' => Yii::t('app', 'Username'),
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

    /**
     * 
     * @return type
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * Validates auth_key
     * 
     * @param type $authKey
     * @return type
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }
    
    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }
    
     /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Security::generatePasswordHash($password);
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }
    
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }
    
     /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    /**
     * 
     * 
     * @param type $id
     */
    public static function findIdentity($id) {
        return static::findOne($id);
    }
    
    /**
     * 
     * 
     * @param type $token
     * @param type $type
     * @return type
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }
    
    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
    
    /**
     * Finds user by password reset token
     *
     * @param  string      $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token
        ]);
    }
    
    
}
