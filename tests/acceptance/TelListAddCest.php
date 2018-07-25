<?php

use App\Models\TelList;

class TelListAddCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/tel_lists/add/outbound');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    private function init(AcceptanceTester $I)
    {
        $I->amGoingTo('check existed element');
        $I->see('新規/編集', 'h4');
        $I->see('登録', ['css' => 'button#btn-saveAdd']);
    }

    private function checkEmptyName(AcceptanceTester $I)
    {
        $I->attachFile('input#upload', 'a.csv');
        $I->click('登録');
        $I->see('空ではありません');
    }

    private function checkEmptyFile(AcceptanceTester $I)
    {
        $I->pressKey('input#name','newtellist');
        $I->click('登録');
        $I->see('ファイルをアップロードできません。 再選択してください！');
    }

    private function checkExistedList(AcceptanceTester $I)
    {
        $I->haveRecord('tel_lists', ['no' => '3', 'module' => 'outbound', 'type' => '1', 'company_id' => '1', 'name' => 'badboy', 'quantity' => '3','columns' => '["a", "b"]','del_flag' => 'N','created' => '2018-07-11 10:09:16']);   
        $I->pressKey('input#name','badboy');
        $I->attachFile('input#upload', 'e.csv');
        $I->click('登録');
        // $I->see('ERR_CREATE_LIST_003');

        $telList1 = TelList::where('name', 'badboy')->first();
        $telList1->delete();

    }

    private function checkNotCsv(AcceptanceTester $I)
    { 
        $I->pressKey('input#name','newtellist');
        $I->attachFile('input#upload', 'a4.jpg');
        $I->click('登録');
        $I->see('csvファイルを選択してください');
    }

    private function checkCsvTooSmall(AcceptanceTester $I)
    { 
        $I->pressKey('input#name','newtellist');
        $I->attachFile('input#upload', 'small5.csv');
        $I->click('登録');
        $I->waitForText('行以上のCSVファイルをインポートできません。');
    }

    public function checkCsvTooBig(AcceptanceTester $I)
    { 
        $I->pressKey('input#name','newtellist');
        $I->attachFile('input#upload', 'big5.csv');
        $I->click('登録');
        $I->waitForText('行以上のCSVファイルをインポートできません。');
    }
    private function checkCsvHeaderDuplicate(AcceptanceTester $I)
    { 
        $I->pressKey('input#name','newtellist');
        $I->attachFile('input#upload', 'header6.csv');
        $I->click('登録');
        $I->see('列は重なり合わない');
    }
    private function checkCsvHeaderPhoneNumber(AcceptanceTester $I)
    { 
        $I->pressKey('input#name','newtellist');
        $I->attachFile('input#upload', 'header7.csv');
        $I->click('登録');
        $I->see('ヘッダーに列の電話がありません');
    }
    private function checkCsvHeaderColumn(AcceptanceTester $I)
    { 
        $I->pressKey('input#name','newtellist');
        $I->attachFile('input#upload', 'header8.csv');
        $I->click('登録');
        $I->see('列を超えています');
    }
    private function checkCsvTelFormat(AcceptanceTester $I)
    { 
        $I->pressKey('input#name','newtellist');
        $I->attachFile('input#upload', 'tel9.csv');
        $I->click('登録');
        $I->see('行目は正しい電話フォーマットを入力してください');
    }
    private function checkCsvTelDuplicate(AcceptanceTester $I)
    { 
        $I->pressKey('input#name','newtellist');
        $I->attachFile('input#upload', 'tel10.csv');
        $I->click('登録');
        $I->see('重複する');
    }



}