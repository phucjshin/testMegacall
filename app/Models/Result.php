<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 01:51:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Result
 * 
 * @property int $id
 * @property int $schedule_id
 * @property int $tel_no
 * @property array $log
 * @property int $created_by
 * @property \Carbon\Carbon $created_at
 * @property int $updated_by
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 *
 * @package App\Models
 */
class Result extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'schedule_id' => 'int',
		'tel_no' => 'int',
		'log' => 'json',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'schedule_id',
		'tel_no',
		'log',
		'created_by',
		'updated_by'
	];
}
