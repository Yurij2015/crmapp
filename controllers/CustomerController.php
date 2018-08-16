<?php

namespace app\controllers;

use app\models\customer\Customer;
use app\models\customer\CustomerRecord;
use app\models\customer\Phone;
use app\models\customer\PhoneRecord;
use yii\web\Controller;

class CustomerController extends Controller
{
    public function actionIndex()
    {
        $records = $this->findRecordsByQuery();
        return $this->render('index', compact('гесоrds')) ;
    }

    public function actionAdd()
    {
        $customer = new CustomerRecord;
        $phone = new PhoneRecord;
        //return 'add';

        if($this->load($customer, $phone, $_POST)) {
            $this->store($this->makeCustomer($customer, $phone));
            return $this->redirect('customers');
        }

        return $this->render('add', compact('customer', 'phone'));
    }

    private function store(Customer $customer)
    {
        $customer_record = new CustomerRecord();
        $customer_record->name = $customer->name;
        $customer_record->birth_date = $customer->birth_date->format('Y-m-d');
        $customer_record->notes = $customer->notes;

        $customer_record->save();

        foreach ($customer->phones as $phone) {
            $phone_record = new PhoneRecord();
            $phone_record->number = $phone->number;
            $phone_record->customer_id = $customer_record->id;
            $phone_record->save();
        }
     }

     private function makeCustomer(CustomerRecord $customerRecord, PhoneRecord $phoneRecord)
     {
        $name = $customerRecord->name;
        $birth_date = new \DateTime($customerRecord->birth_date);

        $customer = new Customer($name, $birth_date);
        $customer->notes = $customerRecord->notes;
        $customer->phones[] = new Phone($phoneRecord->number);

        return $customer;
     }
}
