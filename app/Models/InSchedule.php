<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 01:51:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class InSchedule
 * 
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property \Carbon\Carbon $start_date
 * @property \Carbon\Carbon $end_date
 * @property int $status
 * @property int $internal_number
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
class InSchedule extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'status' => 'int',
		'internal_number' => 'int'
	];

	protected $dates = [
		'start_date',
		'end_date',
		'created',
		'modified'
	];

	protected $fillable = [
		'company_id',
		'name',
		'start_date',
		'end_date',
		'status',
		'internal_number',
		'del_flag',
		'created',
		'entry_user',
		'entry_program',
		'modified',
		'update_user',
		'update_program'
	];
}
