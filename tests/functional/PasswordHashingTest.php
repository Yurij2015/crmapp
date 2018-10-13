<?php

class PasswordHashingTest extends \Codeception\Test\Unit
{
    /**
     * @var \FunctionalTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {

    }

    /** @test */
    public function PasswordIsHashedWhenSavingUser()
    {
        $user = $this->imagineUserRecord();
        $plaintext_password = $user->password; //1
        $user->save();
        $saved_user = \yii\web\User::findOne($user->id);

        $security = new \yii\base\Security();
        $this->assertInstanceOf(get_class($user), $saved_user);
        $this->assertTrue(
            $security->validatePassword(
                $plaintext_password,
                $saved_user->password
            )
        );
    }

    /** @test */
    public function PasswordIsNotRehashedAfterUpdatingWithoutChangingPassword()
    {
        $user = $this->imagineUserRecord();
        $user->save();
        /** @var UserRecord $saved_user */
        $saved_user = UserRecord::find0ne($user->id);
        $expected_hash = $saved_user->password;
        $saved_user->username = mdS(time());
        $saved_user->save();
        /** @var UserRecord $updated_user */
        $updated_user = UserRecord::findOne($saved_user->id);
        $this->assertEquals($expected_hash, $saved_user->password);
        $this->assertEquals($expected_hash, $updated_user->password);
}

    private function imagineUserRecord()
    {
        $faker = Faker\Factory::create();

        $user = new \app\models\user\UserRecord();
        $user->username = $faker->name;
        $user->password = md5(time());
        return $user;
    }

}
