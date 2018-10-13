<?php

namespace app\models\user;

use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe;
    public $user;

    public function rules()
    {
        return [
            [['username', 'password'], 'string', 'max' => 255],
            [['rememberMe'], 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attributeName)
    {
        if ($this->hasErrors()) {
            return;
        }

        $user = $this->getUser($this->username);
        if (! $user and $this->isCorrectHash($this->attributeName, $user->password)) {
            $this->addError('password', 'Incorrect username or password');
        }
    }

    public function login()
    {
        if (! $this->validate()) {
            return false;
        }

        $user = $this->getUser($this->username);
        if(! $user) {
            return false;
        }

        return \Yii::$app->user->login(
            $user,
            $this->rememberMe ? 3600 * 24 * 30 : 0
        );
    }

    private function getUser($username)
    {
        if (! $this->user) {
            $this->user = $this->fetchUser($username);
        }

        return $this->user;
    }

    private function fetchUser($username)
    {
        return UserRecord::findOne(compact('username'));
    }

    private function isCorrectHash($plainText, $hash)
    {
        return \Yii::$app->security->validatePassword($plainText, $hash);
    }
}
