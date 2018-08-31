<?php

namespace app\models\customer;

use yii\db\ActiveRecord;

/**
 * Class CustomerRecord
 *
 * @property integer $id
 * @property string $name
 * @property string $birth_date
 * @property string notes
 *
 * @package app\models\customer
 */
class CustomerRecord extends ActiveRecord
{
    public static function tableName()
    {
        return 'customer';
    }

    public function rules()
    {
        return [
            ['id', 'number'],
            [['name', 'birth_date'], 'required'],
            ['name', 'string', 'max' => 256],
            ['birth_date', 'date', 'format' => 'Y-m-d'],
            ['notes', 'safe'],
        ];
    }
}
