<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 01:51:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MasterParameter
 * 
 * @property int $id
 * @property string $function_name
 * @property string $parameter_name
 * @property string $parameter_value
 * @property string $description
 * @property int $created_by
 * @property \Carbon\Carbon $created_at
 * @property int $updated_by
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 *
 * @package App\Models
 */
class MasterParameter extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'function_name',
		'parameter_name',
		'parameter_value',
		'description',
		'created_by',
		'updated_by'
	];
}
