<?php
namespace Step\Acceptance;

class CRMUserSteps extends \AcceptanceTester
{
    public function amInQueryCustomersUi()
    {
        $I = $this;
        $I->amOnPage('/customers/query');
    }

    public function fillInPhoneFieldWithDataFrom($customer_data)
    {
        $I = $this;
        $I->fillField('phone_number', $customer_data['PhoneRecord[number]']);
    }

    public function clickSearchButton()
    {
        $I = $this;
        $I->click('Search');
    }

    public function seeIAmInListCustomersUi()
    {
        $I = $this;
        $I->seeCurrentUrlMatches('/customers/');
    }

    public function seeCustomerInList($customer_data)
    {
        $I = $this;
        $I->see($customer_data['CustomerRecord[name]'], '#search_results');
    }

    public function dontSeeCustomerInList($customer_data)
    {
        $I = $this;
        $I->dontSee($customer_data['CustomerRecord[name]'], '#search_results');
    }
}
