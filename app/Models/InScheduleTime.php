<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 01:51:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class InScheduleTime
 * 
 * @property int $id
 * @property int $schedule_id
 * @property int $day_section
 * @property \Carbon\Carbon $start_time
 * @property \Carbon\Carbon $end_time
 * @property int $script_id
 * @property int $tel_list_id
 * @property int $ng_tel_list_id
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
class InScheduleTime extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'schedule_id' => 'int',
		'day_section' => 'int',
		'script_id' => 'int',
		'tel_list_id' => 'int',
		'ng_tel_list_id' => 'int'
	];

	protected $dates = [
		'start_time',
		'end_time',
		'created',
		'modified'
	];

	protected $fillable = [
		'schedule_id',
		'day_section',
		'start_time',
		'end_time',
		'script_id',
		'tel_list_id',
		'ng_tel_list_id',
		'del_flag',
		'created',
		'entry_user',
		'entry_program',
		'modified',
		'update_user',
		'update_program'
	];
}
