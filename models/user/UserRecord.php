<?php

namespace app\models\user;

use Yii;
use yii\base\Security;
use yii\web\IdentityInterface;
use yii\web\User;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username User
 * @property string $password Password
 */
class UserRecord extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'auth_key'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    public function beforeSave($insert)
    {
        $return = parent::beforeSave($insert);

        $this->password = Yii::$app->security->generatePasswordHash($this->password);

        if ($this->isAttributeChanged('password')) {
           $this->password = Security::generatePasswordHash($this->password);
        }

        if ($this->isNewRecord) {
           $this->auth_key = Yii::$app->security->generateRandomKey($length = 255);
        }
        return $return;
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findById($id)
    {
        return static::findOne($id);
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return authKey === $this->getAuthKey();
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('You сап only login Ьу username/password pair for now.');
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
}}
