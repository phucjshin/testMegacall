<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 01:51:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Inbound
 * 
 * @property int $id
 * @property string $name
 * @property string $phone_number
 * @property \Carbon\Carbon $start_date
 * @property \Carbon\Carbon $created_at
 * @property int $created_by
 * @property \Carbon\Carbon $updated_at
 * @property int $updated_by
 * @property string $deleted_at
 *
 * @package App\Models
 */
class Inbound extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $dates = [
		'start_date'
	];

	protected $fillable = [
		'name',
		'phone_number',
		'start_date',
		'created_by',
		'updated_by'
	];
}
