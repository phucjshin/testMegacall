<?php

use App\Models\TelList;
use App\Models\OutSchedule;
use App\Models\MasterParameter;

class TelListIndexCest
{
    public function _before(AcceptanceTester $I)
    {
        // $I->haveRecord('tel_lists', ['no' => '3', 'module' => 'outbound', 'type' => '1', 'company_id' => '1', 'name' => 'aa', 'quantity' => '3','columns' => '["a", "b"]','del_flag' => 'N','created' => '2018-07-11 10:09:16']);
        $I->amOnPage('/tel_lists/index/outbound');
    }

    public function _after(AcceptanceTester $I)
    {
        // $telList = TelList::where('name', 'aa')->first();
        // $telList->delete();
    }

    protected function insertRecord(AcceptanceTester $I)
    {
        $I->haveRecord('tel_lists', ['no' => '3', 'module' => 'outbound', 'type' => '1', 'company_id' => '1', 'name' => 'aa', 'quantity' => '3','columns' => '["a", "b"]','del_flag' => 'N','created' => '2018-07-11 10:09:16']);    
    }

    protected function deleteRecord(AcceptanceTester $I)
    {
        $telList = TelList::where('name', 'aa')->first();
        $telList->delete();  
    }

    // test 1
    private function init(AcceptanceTester $I)
    {
        $I->amGoingTo('check existed element');
    //check title
        $I->see('発信リスト', 'h4');
    //check link, button
        $I->see('新規登録', 'a');
        $I->see('全選択', ['css' => '#select-all']);
        $I->see(' 削除', ['css' => '#del-select']);
        $I->see('ダウロード', ['css' => '#download']);
    //check datatable
        $I->see('検索:');
        $I->see('編集', 'a');
        $I->see('詳細', 'a');
        // $I->see('一括', 'a');
        $I->see('No');
        $I->see('リスト名');
        $I->see('件数');
        $I->see('無効');
        $I->see('作成日時');
        $I->see('作成者');
        $I->see('更新日時');
        $I->see('更新者');
        // $I->see('Edit-Detail-Bulk');
    }

    /**
     * @before insertRecord
     * @after deleteRecord
     */
    private function recordDatatables(AcceptanceTester $I)
    {
        $I->amGoingTo('check data in datatables');
        // $numRecord = $I->grabNumRecords('tel_lists', ['module' => 'outbound', 'type' => 1, 'company_id' => 1, 'del_flag' => 'N']);
        $I->reloadPage();
        $I->see(3, 'table#example tbody tr td:nth-of-type(1)');
        $I->see('aa', 'table#example tbody tr td:nth-of-type(2)'); //check ALL name o cot td thu 2
        $I->see(3, 'table#example tbody tr td:nth-of-type(3)');
        $I->see(0, 'table#example tbody tr td:nth-of-type(4)');
        $I->see('2018-07-11 10:09:16', 'table#example tbody tr td:nth-of-type(5)');
        $I->see(1, 'table#example tbody tr td:nth-of-type(6)');
        $I->see('', 'table#example tbody tr td:nth-of-type(7)');
        $I->see('', 'table#example tbody tr td:nth-of-type(8)');
    }

    protected function insertTelList(AcceptanceTester $I)
    {
        factory(TelList::class, 16)->create(['name' => 'justfortest']);
    }

    protected function deleteTelList(AcceptanceTester $I)
    {
        $telList = TelList::where('name', 'justfortest')->get();
        foreach ($telList as $t) {
            $t->delete();
        }
    }
    /**
     * @before insertTelList
     * @after deleteTelList
     */
    private function numberRecordDatatables(AcceptanceTester $I)
    {
        $I->amGoingTo('check number of record');
        $I->reloadPage();
        $numRecord = $I->grabNumRecords('tel_lists', ['module' => 'outbound', 'type' => 1, 'company_id' => 1, 'del_flag' => 'N']); //21
        var_dump($numRecord);
        $show = $I->grabRecord('master_parameters', ['function_name' => 'INDEX']);
        $s = (int)$show['parameter_value'];
        var_dump($s);
        if($numRecord > $s) {
            $I->see($numRecord. ' 件中');      
            $I->see($s. ' まで表示');        
            $I->seeNumberOfElements('tr', $s + 1);
            $a = $numRecord - $s;
            if($a > $s) {
                $I->see('2', 'a');    
                $I->see('3', 'a');    
            } else {
                $I->see('2', 'a');
                $I->dontSee('3', 'a');
            }
        } elseif($numRecord == $s) {
            $I->see($numRecord. ' 件中');      
            $I->see($s. ' まで表示');        
            $I->seeNumberOfElements('tr', $s + 1);
            $I->dontSee('2', 'a');
        } else {
            $I->see($numRecord. ' 件中');      
            $I->see($numRecord. ' まで表示');        
            $I->seeNumberOfElements('tr', $numRecord + 1);
            $I->dontSee('2', 'a');
        }
    }

    /**
     * @before insertRecord
     * @after deleteRecord
     */
    private function searchDatatables(AcceptanceTester $I)
    {
        $I->amGoingTo('check search in datatables');
        $I->pressKey('input[type="search"]','aa');
        $I->waitForText('aa', 2, 'table#example');
    }

    /**
      *@dataProvider fieldProvider
      *
     */
    public function orderDatatables(AcceptanceTester $I, \Codeception\Example $example)
    {
        $I->amGoingTo('check order in datatables');
        $numRecord = $I->grabNumRecords('tel_lists', ['module' => 'outbound', 'type' => 1, 'company_id' => 1, 'del_flag' => 'N']);
        var_dump($numRecord);
        $s = $I->grabRecord('master_parameters', ['function_name' => 'INDEX']);
        $show = (int)$s['parameter_value'];
        var_dump($show);

        $test = $example['field'];
        $telListNameFirst = TelList::where('module', 'outbound')
                                    ->where('type', 1)
                                    ->where('company_id', 1)
                                    ->where('del_flag', 'N')
                                    ->orderBy($test, 'asc')
                                    ->first();
        $telListNameLast = TelList::where('module', 'outbound')
                                    ->where('type', 1)
                                    ->where('company_id', 1)
                                    ->where('del_flag', 'N')
                                    ->orderBy($test, 'desc')
                                    ->first();

        if($numRecord < $show) {
            if($test != 'no') {
                $I->click('table#tblTelList th:nth-child('.$example['column'].')'); //click sort
                $I->wait(1);
                $I->see($telListNameFirst[$test], 'table#tblTelList tr:nth-child(1) > td:nth-child('.$example['column'].')');
                $I->see($telListNameLast[$test], 'table#tblTelList tr:nth-child('.$numRecord.') > td:nth-child('.$example['column'].')');
                $I->click('table#tblTelList th:nth-child('.$example['column'].')'); //click sort
                $I->wait(1);
                $I->see($telListNameLast[$test], 'table#tblTelList tr:nth-child(1) > td:nth-child('.$example['column'].')');
                $I->see($telListNameFirst[$test], 'table#tblTelList tr:nth-child('.$numRecord.') > td:nth-child('.$example['column'].')');
            } else {
                $I->see($telListNameFirst[$test], 'table#tblTelList tr:nth-child(1) > td:nth-child('.$example['column'].')');
                $I->see($telListNameLast[$test], 'table#tblTelList tr:nth-child('.$numRecord.') > td:nth-child('.$example['column'].')');
                $I->click('table#tblTelList th:nth-child('.$example['column'].')'); //click sort
                $I->wait(1);
                $I->see($telListNameLast[$test], 'table#tblTelList tr:nth-child(1) > td:nth-child('.$example['column'].')');
                $I->see($telListNameFirst[$test], 'table#tblTelList tr:nth-child('.$numRecord.') > td:nth-child('.$example['column'].')');
            }
            
        } else {
            if($test != 'no') {
                $I->click('table#tblTelList th:nth-child('.$example['column'].')'); //click sort
                $I->wait(1);
                $I->see($telListNameFirst[$test], 'table#tblTelList tr:nth-child(1) > td:nth-child('.$example['column'].')');
                $I->see($telListNameLast[$test], 'table#tblTelList tr:nth-child('.$show.') > td:nth-child('.$example['column'].')');
                $I->click('table#tblTelList th:nth-child('.$example['column'].')'); //click sort
                $I->wait(1);
                $I->see($telListNameLast[$test], 'table#tblTelList tr:nth-child(1) > td:nth-child('.$example['column'].')');
                $I->see($telListNameFirst[$test], 'table#tblTelList tr:nth-child('.$show.') > td:nth-child('.$example['column'].')');
            } else {
                $I->see($telListNameFirst[$test], 'table#tblTelList tr:nth-child(1) > td:nth-child('.$example['column'].')');
                $I->see($telListNameLast[$test], 'table#tblTelList tr:nth-child('.$show.') > td:nth-child('.$example['column'].')');
                $I->click('table#tblTelList th:nth-child('.$example['column'].')'); //click sort
                $I->wait(1);
                $I->see($telListNameLast[$test], 'table#tblTelList tr:nth-child(1) > td:nth-child('.$example['column'].')');
                $I->see($telListNameFirst[$test], 'table#tblTelList tr:nth-child('.$show.') > td:nth-child('.$example['column'].')');
            }
        }
    }
    /**
     * @return array
     */
    protected function fieldProvider()
    {
        return [
            ['field' => 'no', 'column' => 1],
            ['field' => 'name', 'column' => 2],
            ['field' => 'quantity', 'column' => 3],
            ['field' => 'muko_quantity', 'column' => 4],
            ['field' => 'created', 'column' => 5],
            ['field' => 'entry_user', 'column' => 6],
            ['field' => 'modified', 'column' => 7],
            ['field' => 'update_user', 'column' => 8],
        ];
    }


    // test 2, 3
    private function btnSelectAll(AcceptanceTester $I)
    {
        //2
        $I->click('全選択');
        $I->dontSeeElement('input[type=checkbox]:not(:checked)'); //ko nhin thay thang nao khong duoc check
        $I->see('全未選択');
        //3
        $I->click('全未選択');
        $I->dontseeElement('input[type=checkbox]:checked'); //ko nhin thay thang nao duoc check
        $I->see('全選択');
    }

    // test 4, 5, 6, 7, 8
    
    private function btnDeleteNotChecked(AcceptanceTester $I)
    {
        //4
        $I->click('削除');
        $I->see('データが選択されていない !');
    }

    private function deleteTelListIsDeleted(AcceptanceTester $I)
    {
        //5
        $I->haveRecord('tel_lists', ['no' => '1', 'module' => 'outbound', 'type' => '1', 'company_id' => '1', 'name' => 'quangxxx', 'quantity' => '3','columns' => '["a", "b"]','del_flag' => 'N','created' => '2018-07-11 10:09:16']);
        $record1 = $I->grabRecord('tel_lists', ['name' => 'quangxxx']);
        $a1 = $record1['id'];
        $I->reloadPage();
        $telList = TelList::find($a1); //find By id
        $telList->del_flag = 'Y';
        $telList->save();
        $I->checkOption("input[type='checkbox'][value='".$a1."']");
        $I->click('削除');
        $I->waitForElementVisible('#dialog-confirm');
        $I->waitForText('リストIDは存在しません');
        $telList = TelList::find($a1); //find By id
        $telList->delete();
    }

    /**
     * @dataProvider statusProvider
     *
     */
    private function deleteTelListInSchedule(AcceptanceTester $I, \Codeception\Example $example)
    {
        //6
        $I->haveRecord('tel_lists', ['no' => '1', 'module' => 'outbound', 'type' => '1', 'company_id' => '1', 'name' => 'khangxxx', 'quantity' => '3','columns' => '["a", "b"]','del_flag' => 'N','created' => '2018-07-11 10:09:16']);
        $record2 = $I->grabRecord('tel_lists', ['name' => 'khangxxx']);
        $a2 = $record2['id'];
        $I->haveRecord('out_schedules', ['company_id' => '1', 'no' => '3', 'name' => 'khangxxx', 'date' => '2018-07-30', 'status' => $example['status'],'external_number' => 2,'script_id' => 159,'tel_list_id' => $a2, 'ch_num' => 1, 'tel_quantity' => 1, 'del_flag' => 'N']);
        $I->reloadPage();
        $I->checkOption("input[type='checkbox'][value='".$a2."']");
        $I->click('削除');
        $I->waitForText('SCHEDULEで使用されるリストID');
        $telList1 = TelList::where('name', 'khangxxx')->first();
        $telList1->delete();
        $outSchedules = OutSchedule::where('name', 'khangxxx')->first();
        $outSchedules->delete();
    }
        
    private function deleteTelListInScheduleEnded(AcceptanceTester $I)
    {
        //7, 8
        $I->haveRecord('tel_lists', ['no' => '3', 'module' => 'outbound', 'type' => '1', 'company_id' => '1', 'name' => 'trongxxx', 'quantity' => '3','columns' => '["a", "b"]','del_flag' => 'N','created' => '2018-07-11 10:09:16']);
        $record3 = $I->grabRecord('tel_lists', ['name' => 'trongxxx']);
        $a3 = $record3['id'];
        $I->haveRecord('out_schedules', ['company_id' => '1', 'no' => '3', 'name' => 'trongxxx', 'date' => '2018-07-30', 'status' => 9,'external_number' => 2,'script_id' => 159,'tel_list_id' => $a3, 'ch_num' => 1, 'tel_quantity' => 1, 'del_flag' => 'N']);
        $I->reloadPage();
        $I->checkOption("input[type='checkbox'][value='".$a3."']");
        $I->click('削除');
        $I->waitForElementVisible('#dialog-confirm');
        $I->wait(1);
        $I->click('OK');
        $I->wait(1);
        $I->dontSee('trongxxx');
        $I->seeRecord('tel_lists', ['name' => 'trongxxx', 'del_flag' => 'Y']);
        $telList2 = TelList::where('name', 'trongxxx')->first();
        $telList2->delete();
        $outSchedules2 = OutSchedule::where('name', 'trongxxx')->first();
        $outSchedules2->delete();
    }

    private function deleteTelListSuccess(AcceptanceTester $I)
    {
        //7,8
        $I->haveRecord('tel_lists', ['no' => '3', 'module' => 'outbound', 'type' => '1', 'company_id' => '1', 'name' => 'dongxxx', 'quantity' => '3','columns' => '["a", "b"]','del_flag' => 'N','created' => '2018-07-11 10:09:16']);
        $record4 = $I->grabRecord('tel_lists', ['name' => 'dongxxx']);
        $a4 = $record4['id'];
        $I->reloadPage();
        $I->checkOption("input[type='checkbox'][value='".$a4."']");
        $I->click('削除');
        $I->waitForElementVisible('#dialog-confirm');
        $I->wait(1);
        $I->click('OK');
        $I->wait(1);
        $I->dontSee('dongxxx');
        $I->seeRecord('tel_lists', ['name' => 'dongxxx', 'del_flag' => 'Y']);
        $telList4 = TelList::where('name', 'dongxxx')->first();
        $telList4->delete();
    }

    /**
     * @return array
     */
    protected function statusProvider()
    {
        return [
            ['status' => 0],
            // ['status' => 1],
            // ['status' => 2],
            ['status' => 3],
            // ['status' => 4],
            // ['status' => 5],
            // ['status' => 6],
            ['status' => 7],
            // ['status' => 8]
        ];
    }


    // test 9, 10
    private function btnDownload(AcceptanceTester $I)
    {
        //9
        $I->click('ダウロード');
        $I->see('リストを選択してください');

        //10
        $I->haveRecord('tel_lists', ['no' => '3', 'module' => 'outbound', 'type' => '1', 'company_id' => '1', 'name' => 'huynhxxx', 'quantity' => '3','columns' => '["a", "電話番号", "b"]','del_flag' => 'N','created' => '2018-07-11 10:09:16']);
        $record = $I->grabRecord('tel_lists', ['name' => 'huynhxxx']);
        $a = $record['id'];
        $I->reloadPage();
        $I->checkOption("input[type='checkbox'][value='".$a."']");
        $I->click('ダウロード');
        //test dowload
        // $I->seeFileExists('');

        $telList = TelList::where('name', 'huynhxxx')->first();
        $telList->delete();
    }
}