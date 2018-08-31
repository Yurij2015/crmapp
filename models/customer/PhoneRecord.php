<?php

namespace app\models\customer;

use yii\db\ActiveRecord;

/**
 * Class PhoneRecord
 *
 * @property integer $customer_id
 * @property integer $number
 *
 * @package app\models\customer
 */
class PhoneRecord extends ActiveRecord
{
    public static function tableName()
    {
        return 'phone';
    }

    public function rules()
    {
        return [
            ['customer_id', 'number'],
            ['number', 'string'],
            [['customer_id', 'number'], 'required'],
        ];
    }
}
