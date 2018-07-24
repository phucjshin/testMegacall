<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 01:51:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SmsScheduleTime
 * 
 * @property int $id
 * @property int $schedule_id
 * @property \Carbon\Carbon $start_time
 * @property \Carbon\Carbon $end_time
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
class SmsScheduleTime extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'schedule_id' => 'int'
	];

	protected $dates = [
		'start_time',
		'end_time',
		'created',
		'modified'
	];

	protected $fillable = [
		'schedule_id',
		'start_time',
		'end_time',
		'del_flag',
		'created',
		'entry_user',
		'entry_program',
		'modified',
		'update_user',
		'update_program'
	];
}
