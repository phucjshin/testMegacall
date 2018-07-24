<?php

use App\Models\User;

class IndexCest
{
    public function _before(AcceptanceTester $I)
    {

    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        // use factories example
        $user = factory(User::class)->make(); // make user object
        $user = factory(User::class)->create(); // make user object and insert to database

        // use Eloquent example
        $user = User::orderBy('id', 'desc')->first();

        var_dump($user->toArray());

        $I->amOnPage('/');
        $I->see('ログイン');
    }
}
