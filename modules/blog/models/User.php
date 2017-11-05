<?php

namespace app\modules\blog\models;

use yii\base\Security;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            ['email', 'email'],
        ];
    }

    public static function tableName()
    {
        return '{{users}}';
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
                $this->encryptAndSetPassword($this->password);
            }

            return true;
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \Exception("Not yet implemented");
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function login()
    {
        $user = static::findOne(['email' => $this->email]);

        return \Yii::$app->user->login($user);
    }

    public function encryptAndSetPassword($value)
    {
        $security = new Security();
        $this->password = $security->generatePasswordHash($value, 12);
    }

    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['user_id' => 'id']);
    }
}