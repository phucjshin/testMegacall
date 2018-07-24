<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 01:51:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SmsSchedule
 * 
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property \Carbon\Carbon $date
 * @property int $status
 * @property int $external_number
 * @property int $script_id
 * @property int $tel_list_id
 * @property int $tel_quantity
 * @property int $sent_quantity
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
class SmsSchedule extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'status' => 'int',
		'external_number' => 'int',
		'script_id' => 'int',
		'tel_list_id' => 'int',
		'tel_quantity' => 'int',
		'sent_quantity' => 'int'
	];

	protected $dates = [
		'date',
		'created',
		'modified'
	];

	protected $fillable = [
		'company_id',
		'name',
		'date',
		'status',
		'external_number',
		'script_id',
		'tel_list_id',
		'tel_quantity',
		'sent_quantity',
		'del_flag',
		'created',
		'entry_user',
		'entry_program',
		'modified',
		'update_user',
		'update_program'
	];
}
