<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 01:51:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OutSchedule
 * 
 * @property int $id
 * @property int $company_id
 * @property int $no
 * @property string $name
 * @property \Carbon\Carbon $date
 * @property int $status
 * @property string $external_number
 * @property int $script_id
 * @property int $tel_list_id
 * @property int $ch_num
 * @property int $ng_list_id
 * @property int $notice_type
 * @property int $dial_wait_time
 * @property int $ans_timeout
 * @property int $term_valid_count
 * @property int $term_connect_count
 * @property int $redial
 * @property int $redial_time
 * @property int $tel_quantity
 * @property int $called_quantity
 * @property string $del_flag
 * @property \Carbon\Carbon $created
 * @property string $entry_user
 * @property string $entry_program
 * @property \Carbon\Carbon $modified
 * @property string $update_user
 * @property string $update_program
 *
 * @package App\Models
 */
class OutSchedule extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'no' => 'int',
		'status' => 'int',
		'script_id' => 'int',
		'tel_list_id' => 'int',
		'ch_num' => 'int',
		'ng_list_id' => 'int',
		'notice_type' => 'int',
		'dial_wait_time' => 'int',
		'ans_timeout' => 'int',
		'term_valid_count' => 'int',
		'term_connect_count' => 'int',
		'redial' => 'int',
		'redial_time' => 'int',
		'tel_quantity' => 'int',
		'called_quantity' => 'int'
	];

	protected $dates = [
		'date',
		'created',
		'modified'
	];

	protected $fillable = [
		'company_id',
		'no',
		'name',
		'date',
		'status',
		'external_number',
		'script_id',
		'tel_list_id',
		'ch_num',
		'ng_list_id',
		'notice_type',
		'dial_wait_time',
		'ans_timeout',
		'term_valid_count',
		'term_connect_count',
		'redial',
		'redial_time',
		'tel_quantity',
		'called_quantity',
		'del_flag',
		'created',
		'entry_user',
		'entry_program',
		'modified',
		'update_user',
		'update_program'
	];
}
