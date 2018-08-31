<?php

namespace app\models\customer;

/**
 * Class Phone
 *
 * @package app\models\customer
 */
class Phone
{
    /**
     * @var string
     */
    public $number;

    public function __construct($number)
    {
        $this->number = $number;
    }
}
