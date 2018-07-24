<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 01:51:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class InboundTime
 * 
 * @property int $id
 * @property int $day
 * @property string $text
 * @property \Carbon\Carbon $start_time
 * @property \Carbon\Carbon $end_time
 * @property string $list_1
 * @property string $list_2
 * @property string $list_3
 * @property int $inbound_id
 * @property \Carbon\Carbon $created_at
 * @property int $created_by
 * @property \Carbon\Carbon $updated_at
 * @property int $updated_by
 * @property string $deleted_at
 *
 * @package App\Models
 */
class InboundTime extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'day' => 'int',
		'inbound_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $dates = [
		'start_time',
		'end_time'
	];

	protected $fillable = [
		'day',
		'text',
		'start_time',
		'end_time',
		'list_1',
		'list_2',
		'list_3',
		'inbound_id',
		'created_by',
		'updated_by'
	];
}
